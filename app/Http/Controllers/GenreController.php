<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index()
    {
        $genre = Genre::paginate(5);
        return view('dashboard.admin.genre.index', compact('genre'));
    }

    public function create()
    {
        return view('dashboard.admin.genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255|min:3',
        ]);

        Genre::create($request->all());

        return redirect('/dashboard/genre')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(Genre $genre)
    {
        return view('dashboard.admin.genre.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('dashboard.admin.genre.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'judul' => 'required|max:255|min:3',
        ]);

        Genre::where('id', $genre->id)
            ->update([
                'judul' => $request->judul,
            ]);
        return redirect('/dashboard/genre')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy(Genre $genre)
    {
        Genre::destroy($genre->id);
        return redirect()->route('dashboard.admin.genre.index')->with('success', 'Genre berhasil dihapus.');
    }
}
