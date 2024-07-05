<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::orderBy ('name')->paginate(5);
        
        return view('kegiatan.index', [ "kegiatan" => $kegiatan]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.createkegiatan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kegiatan = new Kegiatan;
        $kegiatan->name = $request->name;
        $kegiatan->deskripsi = $request->deskripsi;
        
        $kegiatan->save();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $kegiatan->name= $request->nama;
        $kegiatan->save();

        return redirect()->route('kegiatan$kegiatan.index')->with(['success' => 'Data Berhasil Diupdate']);;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->delete();

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan Berhasil Dihapus.');
    }
}
