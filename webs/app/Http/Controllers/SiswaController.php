<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use App\Models\Kegiatan;
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
        $siswa = Siswa::orderBy ('name')->paginate(7);
        $siswa = Siswa::with(["jurusan"])->orderBy('name')->paginate(7);
        $siswa = Siswa::with(["kelas"])->orderBy('name')->paginate(7);
        $siswa = Siswa::with(["kegiatan"])->orderBy('name')->paginate(7);
        return view('siswa.index', [ "siswa" => $siswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::All();
        $kelas = Kelas::All();
        $kegiatan = Kegiatan::All();
        return view('admin.createsiswa', [
            "jurusan" => $jurusan,
            "kelas" => $kelas,
            "kegiatan" => $kegiatan
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

        // Cek apakah siswa sudah terdaftar dalam kegiatan lain
        $existingSiswa = Siswa::where('email', $request->email)->first();
        if ($existingSiswa && $existingSiswa->kegiatan_id) {
            return redirect()->back()->withErrors(['kegiatan' => 'Siswa sudah terdaftar dalam kegiatan lain.']);
        }

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
        $siswa->kegiatan_id = $request->kegiatan; // Menyimpan kegiatan yang diikuti siswa

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
        $kegiatan = Kegiatan::all();
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan','kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string',
        ]);
    
        $siswa->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $siswa->password,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);
    
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbaharui');
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
