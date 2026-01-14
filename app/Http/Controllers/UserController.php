<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Ambil user yang login
        $user = Auth::user();

        // Ambil semua roles
        $roles = Roles::all();

        // Ambil input pencarian dan paginasi
        $name = $request->input('name');
        $paginate = $request->input('itemsPerPage', 5);

        // Query awal
        $query = User::query();

        // Jika ada pencarian nama
        if (!empty($name)) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }

        // Eksekusi query dengan paginasi
        $users = $query->paginate($paginate);

        // Kirim ke view
        return view('admin.user.index', compact('roles', 'user', 'users','name'));
    }


    public function store(Request $request)
    {
        // Validasi data dengan pesan kustom
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'contact' => 'required|numeric|min:12',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:roles,id',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        // Simpan data ke database
        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => $validated['role_id'],
            'contact' => $validated['contact'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
        ]);

        // Redirect atau beri respon sukses
        Alert::success('Success', 'Data User berhasil ditambahkan');
        return back();
    }

        public function edit($id)
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $roles = $user->role; // Mengambil role pengguna
        $users = User::find($id); // Mengambil data lokasi surfing berdasarkan ID
        // Ambil semua roles
        $roles = Roles::all();
        // Validasi apakah data ditemukan
        if (!$users) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        return view('admin.user.edit', compact('users', 'user', 'roles'));
    }

        public function update(Request $request, $id)
    {
        // Temukan data berdasarkan ID
        $users = User::findOrFail($id);

        // Validasi data yang masuk (password optional)
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:users,email,' . $id,
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'username'      => 'required|string|max:255|unique:users,username,' . $id,
            'contact'       => 'nullable|string|max:20',
            'role_id'       => 'required|exists:roles,id',
            'password'      => 'nullable|string|min:8|confirmed',
        ]);

        // Jika password diberikan, enkripsi dan sertakan dalam update
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        // Perbarui data di database
        $users->update($validatedData);

        // Redirect kembali dengan pesan sukses
        alert()->toast('Data berhasil diperbarui', 'success')->width('fit-content');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.show', compact('users'));
    }
    
    

    public function destroy($id)
    { 
    
        $users = User::where('id',$id)->first();
        $users->delete();

        alert()->toast('Data berhasil di Hapus', 'success')->width('fit-content');
        return redirect()->route('user.index');
    }
}
