<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(["jurusan"])->orderBy('nama')->paginate(10);

        return view('kelas.index', [ "kelas" => $kelas]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::All();

        return view('kelas.create', [
            "jurusan" => $jurusan
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama = $request->nama;
        $kelas->jurusan_id = $request->jurusan_id;
        $kelas->save();

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $jurusan = Jurusan::All();

        return view("kelas.edit", [
            "kelas" => $kelas,
            "jurusan" => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->nama = $request->nama;
        $kelas->save();

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
