<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoiceDetail;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            $plg = Pelanggan::where('nama', 'like', '%' . $request->search . '%')->get();
            return view('dashboard.customer.index', compact('plg'));
        } else {

            $plg = Pelanggan::latest()->paginate(20);
            return view('dashboard.customer.index', compact('plg'));
        }
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
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nohp' => 'required|unique:pelanggans|string|digits_between:10,15',
            'alamat' => 'required|max:255'
        ], [
            'nohp.unique' => 'No Handphone Sudah Terdaftar',
            'nohp.digits_between' => 'Hanya Boleh Angka dan No HP min 10 max 15 angka',
            'nohp.string' => 'Tidak Boleh Menggunakan Karakter Khusus',
            'nohp.required' => 'No HP Tidak Boleh Kosong',
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'nama.string' => 'Tidak Boleh Menggunakan Karakter Khusus',
            'nama.max' => 'Maksimal 255 Karakter',
            'alamat.max' => 'Maksimal 255 Karakter',
            'alamat.required' => 'Alamat Tidak Boleh Kosong'

        ]);

        $new = new Pelanggan();
        $new->nama = $request->nama;
        $new->alamat = $request->alamat;
        $new->nohp = $request->nohp;
        $new->save();
        session()->flash('scs');

        return back();
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

        $cs = Pelanggan::find($id);
        $plg = Invoice::where('user_id', $id);
        $pd = InvoiceDetail::whereIn('invoice_id', $plg->pluck('id')->toArray());

        $pd->delete();
        $plg->delete();
        $cs->delete();
        session()->flash('scs');
        return back();
    }
}
