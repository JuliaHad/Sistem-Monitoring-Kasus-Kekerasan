<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Administrator
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $totalUser = User::where('role', 'user')->count();
        $totalOperator = User::where('role', 'operator')->count();
        $totalAdmin = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalOperator',
            'totalAdmin'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Manajemen Pengguna
    |--------------------------------------------------------------------------
    */

    public function pengguna()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view(
            'admin.pengguna.index',
            compact('users')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Form Tambah Pengguna
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.pengguna.create');
    }


    /*
    |--------------------------------------------------------------------------
    | Simpan Pengguna Baru
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email'
            ],

            'password' => [
                'required',
                'string',
                'min:8'
            ],

            'role' => [
                'required',
                'in:user,operator,admin'
            ],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return redirect()
            ->route('admin.pengguna')
            ->with(
                'success',
                'Pengguna berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Form Edit Pengguna
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view(
            'admin.pengguna.edit',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Pengguna
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id
            ],

            'password' => [
                'nullable',
                'string',
                'min:8'
            ],

            'role' => [
                'required',
                'in:user,operator,admin'
            ],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        /*
        |--------------------------------------------------------------------------
        | Password hanya diubah jika diisi
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()
            ->route('admin.pengguna')
            ->with(
                'success',
                'Data pengguna berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Hapus Pengguna
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Admin tidak boleh menghapus akun yang sedang digunakan
        |--------------------------------------------------------------------------
        */

        if (auth()->id() == $user->id) {
            return redirect()
                ->route('admin.pengguna')
                ->with(
                    'error',
                    'Akun yang sedang digunakan tidak dapat dihapus.'
                );
        }

        $user->delete();

        return redirect()
            ->route('admin.pengguna')
            ->with(
                'success',
                'Pengguna berhasil dihapus.'
            );
    }
}