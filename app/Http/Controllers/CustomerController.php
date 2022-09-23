<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoiceDetail;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
    public function index()
    {
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

        $tanggal = Carbon::now()->format('d-m-Y');
        $now = Carbon::now();
        $thnBulan = $now->day . $now->month . $now->year;
        $cek = invoice::count();
        if ($cek == 0) {
            $urut = 10001;
            $nomer = 'CS' . $thnBulan . $urut;
        } else {
            $ambil = invoice::all()->last();
            $urut = (int)substr($ambil->invoice, -5) + 1;
            $nomer = 'CS' . $thnBulan . $urut;
        }


        $cs = new invoice();
        $cs->invoice = $nomer;
        $cs->user_id = $id;
        $cs->total_harga = 0;
        $cs->tanggal = $tanggal;
        $cs->save();

        return redirect('nota/' . $cs->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Pelanggan::find($id);
        $inv = invoice::where('user_id', $id)->latest()->paginate(20);

        return view('dashboard.customer.invoice', compact('inv', 'user'));
    }

    public function print($id)
    {
        $invc = invoice::find($id);
        $detail = invoiceDetail::where('invoice_id', $id)->get();

        return view('dashboard.nota.invoice', compact('invc', 'detail'));
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
        $dl = invoice::find($id);
        $dld = invoiceDetail::where('invoice_id', $id);

        $dld->delete();
        $dl->delete();
        session()->flash('scs');

        return back();
    }
}
