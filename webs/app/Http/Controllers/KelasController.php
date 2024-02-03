<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::orderBy ('nama')->paginate(5);

        return view('kelas.index', [ "kelas" => $kelas]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('kelas.create');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama = $request->nama;
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
        return view("kelas.edit", [
            "kelas" => $kelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $kelas->nama = $request->nama;
        $kelas->save();
        
        return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas= Kelas::findOrFail($id); 
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas Berhasil Dihapus.');
    }
}
