<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Novel;
use App\Models\RiwayatBaca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
                'q' => 'novel',
                'country' => 'ID',
                'orderBy' => 'newest',
                'maxResults' => '20',
                'Key' => 'AIzaSyBBRrjVueTMd_DW_89saxDLPxjuQNuzUyc',
            ]);
    
            // Ambil hasil dari respons JSON
            $novels = $response->json()['items'] ?? [];
            // dd($novels);
    
            return view('welcome', compact('novels'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function kategori()
    {
        $kategoris = Kategori::all(); // Mengambil semua data kategori
        return view('dashboard.user.kategori.index');
    }

    public function home()
    {
        $novels = Novel::all();

        $novels->each(function ($novel) {
            if ($novel->gambar_novel) {
                $novel->gambar_novel = asset('storage/uploads/' . $novel->gambar_novel);
            } else {
                $novel->gambar_novel = null;
            }

            if ($novel->deskripsi_novel) {
                $novel->deskripsi_novel = strip_tags($novel->deskripsi_novel, '<br><em>');
            } else {
                $novel->deskripsi_novel = null;
            }
        });


        return view('dashboard.user.index', compact('novels'));
    }

    public function readNovel($id)
    {
        $novel = Novel::findOrFail($id);

        $novel->increment('total_view_novel');
        // dd($novel);

        if ($novel->gambar_novel) {
            $novel->gambar_novel = asset('storage/uploads/' . $novel->gambar_novel);
        } else {
            $novel->gambar_novel = null;
        }

        if (!$novel) {
            // Novel not found, handle accordingly (e.g., show an error page)
            return redirect()->route('errorPage');
        }

        // Mendapatkan ID pengguna yang sedang login
        $userId = Auth::id();
        // Mencari riwayat baca pengguna untuk novel tertentu
        // $riwayatBaca = RiwayatBaca::where('id_user', $userId)->where('id_novel', $novel->id_novel)->first();
        // Menghitung progres membaca
        // $progresMembaca = $riwayatBaca ? round(($riwayatBaca->halaman_terakhir / $novel->total_halaman) * 100, 2) : 10;
        // $totalPages = $novel->total_halaman;
        // $progresMembaca = $riwayatBaca ? round(($riwayatBaca->halaman_terakhir / $totalPages) * 100, 2) : 0;

        // dd($progresMembaca);

        // // Assuming $novel->deskripsi_novel contains the paragraphs
        // $paragraphs = explode("</p>", $novel->deskripsi_novel);

        // // Filter out empty paragraphs
        // $paragraphs = array_filter($paragraphs);

        // // Count the number of paragraphs
        // $totalParagraphs = count($paragraphs);

        // // Check if the user has a reading history for this novel
        // $riwayatBaca = RiwayatBaca::where('id_user', $userId)->where('id_novel', $novel->id_novel)->first();
        // $totalPages = $novel->total_halaman;
        // $progresMembaca = $riwayatBaca ? round(($riwayatBaca->halaman_terakhir / $totalPages) * 100, 2) : 0;

        // Mencari riwayat baca pengguna untuk novel tertentu
        $riwayatBaca = RiwayatBaca::where('id_user', $userId)->where('id_novel', $novel->id)->first();

    // Menghitung progres membaca
        $totalPages = $novel->jumlah_halaman_novel;
        // Check if $totalPages is not zero before performing the division
        $progresMembaca = $totalPages != 0 ? ($riwayatBaca ? round(($riwayatBaca->halaman_terakhir / $totalPages) * 100, 2) : 0) : 0;
        if (!$riwayatBaca) {
            // If there is no reading history, create one with the total number of paragraphs
            RiwayatBaca::create([
                'id_user' => $userId,
                'id_novel' => $novel->id,
                'halaman_terakhir' => $totalPages,
            ]);
        } else {
            // If there is a reading history, update the reading progress
            $riwayatBaca->update([
                'halaman_terakhir' => $totalPages,
            ]);
        }

        return view('dashboard.user.reading', compact('novel', 'progresMembaca'));
    }

    // write

    public function writeNovel()
    {
        $kategori = Kategori::pluck('nama_kategori', 'id');
        return view('dashboard.user.write.index', compact('kategori'));
    }

    public function writeNovelStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_novel' => 'required|max:255',
            'gambar_novel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'required|exists:kategoris,id',
            'deskripsi_novel' => 'required',
            'jumlah_halaman_novel' => 'required|integer|min:1',
        ]);
        try {
            $userId = Auth::id();
            // Validate the request
    
            $fileName = null;
    
            if ($request->hasFile('gambar_novel')) {
                $file = $request->file('gambar_novel');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, 'public'); // Simpan file di storage/app/public/uploads
            }
    

            $novel = Novel::create([
                'nama_novel' => $request->nama_novel,
                'gambar_novel' => $fileName,
                'id_user' => $userId,
                'id_kategori' => $request->id_kategori,
                'deskripsi_novel' => $request->deskripsi_novel,
                'jumlah_halaman_novel' => $request->jumlah_halaman_novel,
            ]);
    
            // dd($novel);
    
            // Redirect or perform other actions
            return redirect()->route('listWriteNovel')->with('success', 'Post created successfully');
            //code...
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function listWriteNovel()
    {
        $userId = Auth::id();
        $novels = Novel::where('id_user', $userId)->get();
        return view('dashboard.user.write.list', compact('novels'));
    }

    public function listWriteEdit(Request $request, $id)
    {   
        $novel = Novel::findOrFail($id); // Mengambil data novel berdasarkan id
        $kategori = Kategori::pluck('nama_kategori', 'id');
        return view('dashboard.user.write.edit', compact('novel', 'kategori'));
    }

    public function updateWriteEdit(Request $request, $id)
    {
        dd($request->all());
        $request->validate([
            'nama_novel' => 'required|max:255',
            'gambar_novel' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_kategori' => 'required|exists:kategoris,id',
            'deskripsi_novel' => 'required',
            'jumlah_halaman_novel' => 'required|integer|min:1',
        ]);
        try {
            $novel = Novel::findOrFail($id);
            $userId = Auth::id();
    
            $fileName = null;
    
            if ($request->hasFile('gambar_novel')) {
                $file = $request->file('gambar_novel');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, 'public'); // Simpan file di storage/app/public/uploads
            }

            $dataToUpdate = [
                'nama_novel' => $request->nama_novel,
                'gambar_novel' => $fileName,
                'id_user' => $userId,
                'id_kategori' => $request->id_kategori,
                'deskripsi_novel' => $request->deskripsi_novel,
                'jumlah_halaman_novel' => $request->jumlah_halaman_novel,
            ];

            $novel->update($dataToUpdate);
    
            // Redirect or perform other actions
            return redirect()->route('novelIndex')->with('success', 'Post created successfully');
            //code...
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // mybook
    public function mybookIndex()
    {
        $userId = Auth::id();

        $novels = Novel::where('id_user', $userId)->get();

        $novels->each(function ($novel) {
            if ($novel->gambar_novel) {
                $novel->gambar_novel = asset('storage/uploads/' . $novel->gambar_novel);
            } else {
                $novel->gambar_novel = null;
            }

            if ($novel->deskripsi_novel) {
                $novel->deskripsi_novel = strip_tags($novel->deskripsi_novel, '<br><em>');
            } else {
                $novel->deskripsi_novel = null;
            }
        });
        return view('dashboard.user.mybook.index', compact('novels'));
    }

    // kategori views
    public function kategoriIndexSlug($categorySlug)
    {
        // Ambil kategori berdasarkan slug
        $category = Kategori::where('slug_kategori', $categorySlug)->firstOrFail();

        // Ambil daftar novel berdasarkan kategori
        $novels = Novel::where('id_kategori', $category->id)->get();
        $novels->each(function ($novel) {
            if ($novel->gambar_novel) {
                $novel->gambar_novel = asset('storage/uploads/' . $novel->gambar_novel);
            } else {
                $novel->gambar_novel = null;
            }
        });
        // Tampilkan view dengan data novel dan kategori
        return view('dashboard.user.kategori.index', compact('novels', 'category'));
    }

    public function listKategori()
    {
        $kategoris = Kategori::all(); // Mengambil semua data kategori
        $kategoris->each(function ($kategoris) {
            if ($kategoris->gambar_kategori) {
                $kategoris->gambar_kategori = asset('storage/uploads/' . $kategoris->gambar_kategori);
            } else {
                $kategoris->gambar_kategori = null;
            }
        });
        return view('dashboard.user.kategori.list', compact('kategoris'));
    }

    public function likeNovel($novelId)
    {
        $novel = Novel::findOrFail($novelId);
        
        // Contoh: Tambahkan jumlah "like" pada novel
        $novel->total_like_novel += 1;
        $novel->save();

        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->back();
    }

    public function showReadingHistory() {
        $userId = Auth::id();
        $riwayatBaca = RiwayatBaca::select('id', 'id_user', 'id_novel', 'halaman_terakhir', 'created_at')
            ->with(['novel' => function ($query) {
                $query->select('id', 'nama_novel', 'gambar_novel', 'deskripsi_novel', 'total_view_novel', 'total_like_novel', 'jumlah_halaman_novel');
            }])
            ->where('id_user', $userId)
            ->latest('created_at') // Order by the latest created_at
            ->distinct('id_novel') // Select distinct novels
            ->get();

            // $riwayatBaca->each(function ($riwayat) {
            //     // Access the related novel and update the attributes
            //     $novel = $riwayat->novel;
            
            //     if ($novel->gambar_novel) {
            //         $novel->gambar_novel = asset('storage/uploads/' . $novel->gambar_novel);
            //     } else {
            //         $novel->gambar_novel = null;
            //     }
            // });
        // dd($riwayatBaca);
        return view('dashboard.user.riwayat.index', compact('riwayatBaca'));
    }

    // live search
    public function liveSearch(Request $request)
    {
        $search = $request->get('search');
        $novels = Novel::where('nama_novel', 'LIKE', '%' . $search . '%')->get();
        $novels->each(function ($novel) {
            if ($novel->gambar_novel) {
                $novel->gambar_novel = asset('storage/uploads/' . $novel->gambar_novel);
            } else {
                $novel->gambar_novel = null;
            }
        });
        return view('dashboard.user.index', compact('novels'));
    }

    // novel google API Books
    public function novelApiGoogle() 
    {
        try {
            $response = Http::get('https://www.googleapis.com/books/v1/volumes', [
                'q' => 'novel',
                'country' => 'ID',
                'maxResults' => '10',
                'Key' => 'AIzaSyBBRrjVueTMd_DW_89saxDLPxjuQNuzUyc',
            ]);
    
            // Ambil hasil dari respons JSON
            $novels = $response->json()['items'] ?? [];
            // dd($novels);
    
            return view('dashboard.user.favorite.index', compact('novels'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
