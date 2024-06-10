<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('products.product', compact('products'));
    }

    public function create()
    {
        return view('products.create-product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'nama_penerbit' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Products::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $products = Products::findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function edit($id)
    {
        $products = Products::findOrFail($id);
        return view('products.edit-product', compact('products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_produk' => 'required|string|max:255',
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'nama_penerbit' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $products = Products::findOrFail($id);
        $products->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $products = Products::findOrFail($id);
        $products->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function cetak(){
        $products = Products::all();
        $pdf = PDF::loadView('products.cetak', compact('products'));
        return $pdf->download('data-products.pdf');
    }
}