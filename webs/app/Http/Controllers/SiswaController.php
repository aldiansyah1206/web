<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('admin.createsiswa', [
            "jurusan" => $jurusan,
            "kelas" => $kelas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi create data siswa
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pembina,email',
            'password' => 'required|string|min:8|confirmed',
            'jenis_kelamin' => 'required|string|max:10',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:255',
            'kegiatan' => 'required|exists:kegiatan,id', // Validasi kegiatan
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Membuat instance baru siswa
        $siswa = new Siswa();
        $siswa->name = $request->name;
        $siswa->email = $request->email;
        $siswa->password = Hash::make($request->password); // Hash password
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->no_hp = $request->no_hp;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->alamat = $request->alamat;
        $siswa->kegiatan_id = $request->kegiatan_id; // Menyimpan kegiatan yang diikuti siswa
    
        // Menangani upload file untuk gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $siswa->image = $imagePath;
        }
    
        // Menyimpan instance siswa
        $siswa->save();
    
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
        $siswa->no_hp = $request->no_hp;
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
