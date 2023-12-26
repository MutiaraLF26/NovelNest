<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::paginate(5);
        return view('dashboard.admin.buku.index', compact('buku'));
    }

    public function create()
    {
        return view('dashboard.amin.buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|min:3',       
        ]);

        Buku::create($request->all());

        return redirect('/dashboard/buku')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(Buku $buku)
    {
        return view('dashboard.admi.buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('dashboard.admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required|max:255|min:3',
        ]);

        Buku::where('id', $buku->id)
            ->update([
                'judul' => $request->judul,
            ]);
        return redirect('/dashboard/buku')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Buku $buku)
    {
        Buku::destroy($buku->id);
        return redirect()->route('dashboard.admin.buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
