<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;


class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembina = Pembina::OrderBy('name')->paginate(5);
        return view('pembina.index', [ "pembina" => $pembina]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pembina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembina = new Pembina;
        $pembina->name = $request->name;
        $pembina->email = $request->email;
        $pembina->password = $request->password;
        $pembina->no_hp = $request->no_hp;
        $pembina->alamat = $request->alamat;    
        $pembina->save();

        return redirect()->route('pembina.index');
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
        return view("pembina.edit", [
            "pembina" => $pembina
        ]);
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
