<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel; // Tambahkan use statement untuk model Novel

class NovelController extends Controller
{
    /**
     * Menampilkan daftar novel.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novels = Novel::latest()->paginate(5);
        return view('novel.index', compact('novels'));
    }
}
