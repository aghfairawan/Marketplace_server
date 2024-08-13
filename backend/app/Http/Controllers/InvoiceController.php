<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return Invoice::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'amount' => 'required|numeric',
        ]);

        return Invoice::create($request->all());
    }

    public function show($id)
    {
        return Invoice::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return $invoice;
    }

    public function destroy($id)
    {
        Invoice::destroy($id);
        return response()->json(['message' => 'Invoice deleted']);
    }
}
