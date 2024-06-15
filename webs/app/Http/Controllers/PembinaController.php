<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Pembina;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembina = Pembina::with('role')->paginate(10);
        return view('pembina.index', compact('pembina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleIds = [2]; 
        $roles = Role::findMany($roleIds);
        return view('admin.createpembina' ,compact('roles'));
    }   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembina = new Pembina;
        $pembina->name = $request->name;
        $pembina->email = $request->email;
        $pembina->password = Hash::make($request->password);
        $pembina->jenis_kelamin = $request->jenis_kelamin;
        $pembina->no_hp = $request->no_hp;
        $pembina->alamat = $request->alamat;  
        $pembina->role_id = $request->input('role_id');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
            $pembina->image = $filename;
        }
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
