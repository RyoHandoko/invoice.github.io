<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\invoiceDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $invoice = invoice::where('invoice', 'like', '%' . $request->search . '%')->get();
            return view('dashboard.home', compact('invoice'));
        } else {
            $invoice = invoice::latest()->paginate(20);
            return view('dashboard.home', compact('invoice'));
        }
    }


    public function generate($id)
    {
        // $data = invoice::where('invoice', $id)->first();
        // $detail = invoiceDetail::where('invoice_id', $data);
        // $invc = invoice::first();
        // $pdf = Pdf::loadView('dashboard.nota.pdf', compact('data', 'invc', 'detail'))->output();
        // return $pdf->download('invoice.pdf');        


        $detail = invoiceDetail::where('invoice_id', $id)->get();


        $view = view('dashboard.nota.invoice', $detail);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
