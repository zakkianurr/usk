<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // display a listing of the resource
    public function index()
{
    $kategoris = Kategori::all();
    return view('kategori.index', compact('kategoris'));
}

    //Show the form for creating a new resource.
    public function create()
    {
        return view('kategori.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
{
    $request->validate([
        'nama_kategori' => 'required'
    ]);

    $kategori = Kategori::findOrFail($id); // Ambil data berdasarkan ID
    $kategori->update($request->all());

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate');
}

public function destroy(string $id)
{
    $kategori = Kategori::findOrFail($id); // Ambil data berdasarkan ID
    $kategori->delete();

    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
}

}
