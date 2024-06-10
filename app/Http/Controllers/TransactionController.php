<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use App\Models\Clients;
use App\Models\Products;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {

        $transactions = Transactions::with(['client', 'product'])->get();
        return view('transactions.transaction', compact('transactions'));
    }

    public function create()
    {
        $clients = Clients::all();
        $products = Products::all();
        return view('transactions.create-transaction', compact('clients', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:clients,id_client',
            'id_product' => 'required|exists:products,id_product',
            'tgl_transaksi' => 'required|date',
            'jumlah' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        Transactions::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show($id)
    {
        $transaction = Transactions::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
        $transaction = Transactions::findOrFail($id);
        $clients = Clients::all();
        $products = Products::all();
        return view('transactions.edit-transaction', compact('transaction', 'clients', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_client' => 'required|exists:clients,id_client',
            'id_product' => 'required|exists:products,id_product',
            'tgl_transaksi' => 'required|date',
            'jumlah' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        $transaction = Transactions::findOrFail($id);
        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function cetak()
    {
        $transactions = Transactions::all();
        $pdf = PDF::loadView('transactions.cetak', compact('transactions'));
        return $pdf->download('data-transactions.pdf');
    }
}