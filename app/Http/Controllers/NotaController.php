<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoiceDetail;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $invc = invoice::find($id);
        $prd = product::all();
        $invD = invoiceDetail::where('invoice_id', $id)->get();

        return view('dashboard.nota.index', compact('prd', 'invD', 'invc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $request->validate([
            'jumlah' => 'integer',
        ], [
            'jumlah.integer' => 'Harus Berisi Angka'
        ]);

        $product = product::where('id', $request->produk)->first();
        $cek_addproduct = invoiceDetail::where('product_id', $request->produk)->where('invoice_id', $id)->first();
        if (empty($cek_addproduct)) {
            $addproduct = new invoiceDetail();
            $addproduct->invoice_id = $id;
            $addproduct->product_id = $request->produk;
            $addproduct->qty = $request->jumlah;
            $addproduct->total = $product->price * $request->jumlah;
            $addproduct->save();
        } else {
            $addproduct = invoiceDetail::where('product_id', $request->produk)->where('invoice_id', $id)->first();
            $addproduct->qty = $request->jumlah;
            $addproduct->total = $product->price * $addproduct->qty;
            $addproduct->update();
        }
        $pesananbaru = invoiceDetail::where('invoice_id', $id)->sum('total');
        $total = invoice::where('id', $id)->first();
        $total->total_harga = $pesananbaru;
        $total->update();


        // $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        // $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
        // $pesanan->update();

        return redirect('nota/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesananproduk = invoiceDetail::find($id);
        $pesanan = invoice::where('id', $pesananproduk->invoice_id)->first();
        $pesanan->total_harga = $pesanan->total_harga - $pesananproduk->total;
        $pesanan->update();


        $pesananproduk->delete();
        return back();
    }
}
