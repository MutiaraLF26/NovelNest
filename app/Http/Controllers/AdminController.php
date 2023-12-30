<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // dashboard
    public function index()
    {
        return view('dashboard.admin.index');
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
}
