<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use App\Models\Siswa;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexpembina()
    {
        $pembina = Pembina::all();

        return view('admin.createpembina', compact('pembina')); 
    }
    public function indexsiswa()
    {
        $pembina = Siswa::all();

        return view('admin.createsiswa', compact('siswa')); 
    }
    public function pembinastore(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:pembina',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $pembina = new Pembina();
    $pembina->name = $request->input('name');
    $pembina->email = $request->input('email');
    $pembina->password = Hash::make($request->input('password'));

    $role = Role::where('name', 'pembina')->first();
    $pembina->role()->associate($role);

    $pembina->save();

    return redirect()->route('admin.createpembina')->with('success', 'Data pembina berhasil ditambahkan!');
    }

    public function siswastore(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:siswa',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $siswa = new Siswa();
    $siswa->name = $request->input('name');
    $siswa->email = $request->input('email');
    $siswa->password = Hash::make($request->input('password'));

    $role = Role::where('name', 'siswa')->first();
    $siswa->role()->associate($role);

    $siswa->save();

    return redirect()->route('admin.cratesiswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }
}