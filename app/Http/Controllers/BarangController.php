<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Barang::query();

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('kode', 'like', "%$search%")
                  ->orWhere('lokasi', 'like', "%$search%")
                  ;
            });
        }

        // Filter Lokasi
        if ($request->filled('lokasi')) {
            $query->where('lokasi', $request->lokasi);
        }
        // Filter Kategori (jika ada field kategori, tambahkan di migration dan model)
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }
        // Filter Stok Kosong
        if ($request->filled('stok_kosong') && $request->stok_kosong == '1') {
            $query->where('stok', 0);
        }

        // Sortir
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'desc');
        $query->orderBy($sort, $order);

        $barangs = $query->paginate(10);
        $lokasiList = Barang::select('lokasi')->distinct()->pluck('lokasi');
        // Jika ada kategori, ambil juga kategoriList
        $kategoriList = Barang::select('kategori')->distinct()->pluck('kategori');

        return view('barang.index', compact('barangs', 'lokasiList', 'kategoriList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:barangs',
            'stok' => 'required|integer',
            'lokasi' => 'nullable',
            'keterangan' => 'nullable',
            'kategori' => 'nullable',
        ]);
        Barang::create($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:barangs,kode,' . $barang->id,
            'stok' => 'required|integer',
            'lokasi' => 'nullable',
            'keterangan' => 'nullable',
            'kategori' => 'nullable',
        ]);
        $barang->update($validated);
        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
