<?php

namespace App\Http\Controllers;

use App\Models\invoice;

use Illuminate\Http\Request;
use App\Models\invoiceDetail;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        if ($request->has('search')) {
            $cari = invoice::where('invoice',  $request->search)->get();
        }
        // if ($request->has('search')) {
        //     $cari = invoice::where('invoice', 'like', '%' . $request->search . '%')->get();
        // } else {
        //     return view('welcome');
        // }
        return view('search', compact('cari'));
    }
}
