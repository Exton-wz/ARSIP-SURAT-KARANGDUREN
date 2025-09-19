<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurat;

class KategoriSuratController extends Controller
{
    /**
     * Tampilkan semua kategori surat (dengan pencarian & paginate)
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kategori = KategoriSurat::when($search, function ($query, $search) {
                $query->where('nama_kategori', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10) // tampil 10 per halaman
            ->appends(['search' => $search]);

        return view('kategori.index', compact('kategori', 'search'));
    }

    /**
     * Form tambah kategori surat
     */
    public function create()
    {
        return view('kategori.form');
    }

    /**
     * Simpan kategori surat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi'     => 'nullable|string|max:255',
        ]);

        KategoriSurat::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Form edit kategori surat
     */
    public function edit(KategoriSurat $kategori)
    {
        return view('kategori.form', compact('kategori'));
    }

    /**
     * Update kategori surat
     */
    public function update(Request $request, KategoriSurat $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
            'deskripsi'     => 'nullable|string|max:255',
        ]);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi'     => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Hapus kategori surat
     */
    public function destroy(KategoriSurat $kategori)
    {
        $kategori->delete();

        return redirect()->route('kategori.index')
                         ->with('success', 'Kategori berhasil dihapus');
    }
}
