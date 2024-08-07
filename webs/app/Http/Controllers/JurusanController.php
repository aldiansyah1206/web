<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::orderBy ('name')->paginate(5);

        return view('jurusan.index', [ "jurusan" => $jurusan ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createjurusan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jurusan = new Jurusan;
        $jurusan->name = $request->name;
        
        $jurusan->save();
    
        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view("admin.editjurusan", [
            "jurusan" => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $jurusan->name = $request->name;
        $jurusan->save();
    
        return redirect()->route('jurusan.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
    
        return redirect()->route("jurusan.index")->with("success", "Jurusan berhasil dihapus.");
    }
    
}
