<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $siswa = Siswa::orderBy ('name')->paginate(5);
        $siswa = siswa::with(["jurusan"])->orderBy('name')->paginate(6);
        $siswa = siswa::with(["kelas"])->orderBy('name')->paginate(6);
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
            $request->validate([
                'name'=>'required',
                'email'=>'required|email',
                'alamat'=>'required',
            ]);
            Siswa::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password,
                'no_hp'=>$request->no_hp,
                'kelas_id'=>$request->kelas_id,
                'jurusan_id'=>$request->jurusan_id,
                'alamat'=>$request->alamat,
            ]);
            $jurusan = Jurusan::all();
            $kelas = Kelas::all();
    
            return redirect()->route('siswa.index')->with('success', 'Data Siswa Berhasil Ditambah');
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
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->name = $request->name;
        $siswa->email = $request->email;
        $siswa->password = $request->password;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->alamat = $request->alamat ?? '';
        $siswa->save();
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
    
        return redirect()->route("siswa.index")->with("success", "siswa berhasil dihapus.");
    }
}
