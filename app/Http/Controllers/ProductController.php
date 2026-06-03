<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan tabel barang beserta tombol tambah
        $products = \App\Models\product::all();
        return view('products.index', compact('products'));
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
        //menyimpan data
        $request->validate(
            [
                'nama_barang' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
            ]
        );

        \App\Models\product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //update product
        $request->validate(
            [
                'nama_barang' => 'required',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric',
                'deskripsi' => 'required',
            ]
        );
        //cari produk berdasarkan id
        $product = \App\Models\product::find($id);
        //update
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Barang berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data berdasarkan id
        $product = \App\Models\product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus');
    }
}
