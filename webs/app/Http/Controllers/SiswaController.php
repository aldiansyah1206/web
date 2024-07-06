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
            'kegiatan_id' => 'required|exists:kegiatan,id',
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
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->no_hp = $request->no_hp;
        $siswa->alamat = $request->alamat;
        $siswa->kegiatan_id = $request->kegiatan_id; // Menyimpan kegiatan yang diikuti siswa

        // Menangani upload file untuk gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $siswa->image = $filename;
        }

        // Menyimpan instance siswa
        $siswa->save();
        
        $siswa->assignRole('siswa', 'siswa');
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
    public function edit($id)
    {   
        $siswa = Siswa::findOrFail($id);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $kegiatan = Kegiatan::all();
        return view('admin.editsiswa', compact('siswa', 'kelas', 'jurusan','kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:siswa,email,' . $id,
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan_id' => 'required|exists:jurusan,id',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        $siswa = Siswa::find($id);
        $siswa->name = $request->name;
        $siswa->email = $request->email;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jurusan_id = $request->jurusan_id;
        $siswa->kegiatan_id = $request->kegiatan_id;
        $siswa->no_hp = $request->no_hp;
        $siswa->alamat = $request->alamat;
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Update Data Siswa Berhasil');
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
