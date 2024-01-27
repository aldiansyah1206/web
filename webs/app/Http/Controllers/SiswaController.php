<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use App\Models\kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = siswa::with(["jurusan"])->orderBy('nama')->paginate(6);
        $siswa = siswa::with(["kelas"])->orderBy('nama')->paginate(6);
        return view('siswa.index', [ "siswa" => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::All();
        $kelas = Kelas::All();
        return view('siswa.create', [
            "jurusan" => $jurusan,
            "kelas" => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->email = $request->email;
        $siswa->password = $request->password;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->alamat = $request->alamat ?? '';
        $siswa->save();

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        {
            return view('siswa.profil');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
    
        return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus.');
    }
}
