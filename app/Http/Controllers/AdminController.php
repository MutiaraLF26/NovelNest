<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Novel;
use Illuminate\Http\Request;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminController extends Controller
{
    // dashboard
    public function index()
    {
        $novels = Novel::all();

        $data = [
            'labels' => $novels->pluck('nama_novel'),
            'data' => $novels->pluck('total_view_novel'),
        ];
        return view('dashboard.admin.index', compact('data'));
    }
    // users
    public function userIndex()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('dashboard.admin.users.index', compact('users'));
    }

    public function userEdit(Request $request, $id)
    {   
        $user = User::findOrFail($id); // Mengambil data pengguna berdasarkan id
        return view('dashboard.admin.users.edit', ['user' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        
        $user = User::findOrFail($id);
        

        $request->validate([
            'name' => 'max:255|min:3',
            'email' => 'email:dns|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            // 'password_confirmation' => 'required|min:8',
        ]);

        $dataToUpdate = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        // Hanya update password jika diisi
        if ($request->filled('password')) {
            $dataToUpdate['password'] = Hash::make($request->password);
        }
    
        $user->update($dataToUpdate);

        return redirect()->route('userIndex')->with('success', 'User updated successfully');
    }

    public function userCreate()
    {
        return view('dashboard.admin.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            // 'role' => 'required|in:user,admin'
            // 'password_confirmation' => 'required|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);

        // $user->assignRole($request->role);

        return redirect()->route('userIndex')->with('success', 'User created successfully');
    }

    public function deleteUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            // Mendapatkan novel yang dimiliki oleh user
            $novels = Novel::where('id_user', $id)->get();

            // Menghapus setiap novel beserta kategorinya
            foreach ($novels as $novel) {
                $novel->category->deleteWithNovels();
            }
            $user->delete();
            return redirect()->route('userIndex')->with('success', 'User created successfully');
        } catch (ModelNotFoundException $e) {
            // Menggunakan ModelNotFoundException, yang lebih spesifik, jika baris tidak ditemukan
            return response()->json(['error' => 'Kategori not found'], 404);
        } catch (\Exception $e) {
            // Menangkap pengecualian umum
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // kategori
    public function kategoriIndex()
    {
        $kategoris = Kategori::all(); // Mengambil semua data kategori
        return view('dashboard.admin.kategori.index', compact('kategoris'));
    }
    
    public function kategoriCreate()
    {
        return view('dashboard.admin.kategori.create');
    }

    public function storeKategori(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_kategori' => 'required|max:255|min:3',
            'gambar_kategori' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $fileName = null;
    
            if ($request->hasFile('gambar_kategori')) {
                $file = $request->file('gambar_kategori');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName, 'public'); // Simpan file di storage/app/public/uploads
            }
            $slug_kategori = SlugService::createSlug(Kategori::class, 'slug_kategori', $request->nama_kategori);
            
            $kategori = Kategori::create([
                'nama_kategori' => $request->nama_kategori,
                'gambar_kategori' => $fileName,
                'slug_kategori' => $slug_kategori,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


        return redirect()->route('kategoriIndex')->with('success', 'Kategori created successfully');
    }

    public function kategoriEdit(Request $request, $id)
    {   
        $kategori = Kategori::findOrFail($id); // Mengambil data kategori berdasarkan id
        return view('dashboard.admin.kategori.edit', ['kategori' => $kategori]);
    }

    public function updateKategori(Request $request, $id)
    {
        
        $kategori = Kategori::findOrFail($id);
        

        $request->validate([
            'nama_kategori' => 'required|max:255|min:3',
            'gambar_kategori' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slug_kategori = SlugService::createSlug(Kategori::class, 'slug_kategori', $request->nama_kategori);

        $dataToUpdate = [
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => $slug_kategori,
        ];

        if ($request->hasFile('gambar_kategori')) {
            $file = $request->file('gambar_kategori');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public'); // Simpan file di storage/app/public/uploads

            $dataToUpdate['gambar_kategori'] = $fileName;
        }
    
        $kategori->update($dataToUpdate);

        return redirect()->route('kategoriIndex')->with('success', 'Kategori updated successfully');
    }

    public function deleteKategori(Request $request, $id)
    {
        try {
            $kategori = Kategori::findOrFail($id);
            $kategori->deleteWithNovels();
            return redirect()->route('kategoriIndex')->with('success', 'Kategori deleted successfully');
        } catch (ModelNotFoundException $e) {
            // Menggunakan ModelNotFoundException, yang lebih spesifik, jika baris tidak ditemukan
            return response()->json(['error' => 'Kategori not found'], 404);
        } catch (\Exception $e) {
            // Menangkap pengecualian umum
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Novel
    public function novelIndex()
    {
        $novels = Novel::all(); // Mengambil semua data novel
        return view('dashboard.admin.novel.index', compact('novels'));
    }

    public function novelIndexPdf()
    {
        $novels = Novel::all(); // Mengambil semua data novel
        $pdf = Pdf::loadview('dashboard.admin.pdf.novel', compact('novels'));
        // $pdf = app()->make('dompdf.wrapper');
        // $pdf->loadView('dashboard.admin.pdf.novel', compact('novels'));
        return $pdf->download('reporting-novel.pdf');
    }

    public function novelEdit(Request $request, $id)
    {   
        $novel = Novel::findOrFail($id); // Mengambil data novel berdasarkan id
        $kategori = Kategori::pluck('nama_kategori', 'id');
        return view('dashboard.admin.novel.edit', compact('novel', 'kategori'));
    }

    public function novelCreate()
    {
        $kategori = Kategori::pluck('nama_kategori', 'id');
        return view('dashboard.admin.novel.create', compact('kategori'));
    }

    public function novelStore(Request $request)
    {
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
            return redirect()->route('novelIndex')->with('success', 'Post created successfully');
            //code...
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateNovel(Request $request, $id)
    {
        
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
            // Hanya update password jika diisi
            if ($request->filled('password')) {
                $dataToUpdate['password'] = Hash::make($request->password);
            }
    
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

    public function deleteNovel(Request $request, $id)
    {
        $novel = Novel::findOrFail($id);
        $novel->delete();
        return redirect()->route('novelIndex')->with('success', 'Post deleted successfully');
    }

    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('/');
    }
}
