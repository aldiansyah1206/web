<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pembina;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function countpembinadata()
    {
        $pembina = Pembina::orderBy('name')->paginate(7);
        $pembina = Pembina::with(["kegiatan"])->orderBy('name')->paginate(7);
        return view('pembina.index', compact('pembina','kegiatan'));
    }
        public function index()
    {   
        $pembina = Pembina::with('kegiatan')->orderBy('name')->paginate(7);
        $kegiatan = Kegiatan::All();
        return view('pembina.index', compact('pembina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleIds = [2]; 
        $roles = Role::findMany($roleIds);
        $pembina = Pembina::with('kegiatan')->orderBy('name');
        $kegiatan = Kegiatan::All();
        return view('admin.createpembina' ,compact('roles','kegiatan'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:pembina,email',
                'password' => 'required|string|min:8|confirmed',
                'jenis_kelamin' => 'required|string|max:10',
                'kegiatan_id' => 'required|exists:kegiatan,id',
                'no_hp' => 'nullable|string|max:15',
                'alamat' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Membuat instansi Pembina baru
            $pembina = new Pembina;
            $pembina->name = $request->name;
            $pembina->email = $request->email;
            $pembina->password = Hash::make($request->password);
            $pembina->jenis_kelamin = $request->jenis_kelamin;
            $pembina->kegiatan_id = $request->kegiatan_id;
            $pembina->no_hp = $request->no_hp;
            $pembina->alamat = $request->alamat;

            // Penanganan unggahan gambar
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $filename);
                $pembina->image = $filename;
            }

            // Menyimpan Pembina ke database
            $pembina->save();

            // Menetapkan peran kepada Pembina
            $pembina->assignRole('pembina', 'pembina');

            // Mengarahkan kembali ke route pembina.index dengan pesan sukses
            return redirect()->route('pembina.index')->with('success', 'Pembina berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
    public function show(Pembina $pembina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembina $pembina)
    {
        $kegiatan = Kegiatan::all();
        return view("pembina.edit",compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pembina = Pembina::find($id);
        $pembina->name = $request->name;
        $pembina->email = $request->email;
        $pembina->password = $request->password;
        $pembina->no_hp = $request->no_hp;
        $pembina->alamat = $request->alamat;
        $pembina->save();
        return redirect()->route('pembina.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pembina = Pembina::find($id);
        $pembina->delete();
        return redirect()->route('pembina.index')->with('success', 'Pembina Berhasil Dihapus.');
    }
}
