<?php

namespace App\Http\Controllers;

use App\Models\ProductInvoice;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductInvoice $productInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductInvoice $productInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductInvoice $productInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductInvoice $productInvoice)
    {
        //
    }
     /**
     * Display a View of the PDF.
     */
    public function loadViewInvoice()
    {
        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->stream();
    }
    public function downloadInvoice()
    {
        $pdf = Pdf::loadView('pdf.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
