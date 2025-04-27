<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kaegori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_item' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        Item::create($request->all());

        return redirect()->route('item.index')->with('Sukses', 'Item berhasil ditambahkan');
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
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_item' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|integer'
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('item.index')->with('Sukses', 'Item berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Item::findOrFail($id); // Ambil data berdasarkan ID
        $item->delete();

        return redirect()->route('item.index')->with('Sukses', 'Item berhasil dihapus');
    }
}
