<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Presensi;
use App\Http\Requests\StorePresensiRequest;
use App\Http\Requests\UpdatePresensiRequest;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    { 
        $users = User::all();
        $users = User::where('user_id', Auth::user()->id)->first();
        $presensi = Presensi::where('user_id', Auth::user()->id)->get();
        $presensi->save();
        return redirect()->route('presensi.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePresensiRequest $request)
    {
        Presensi::create([
            'user_id'        => Auth::user()->id,
            'tanggal_presensi'  => $request->tanggal_presensi,
            'jam_masuk'        => $request->jam_masuk,
            'keterangan'        => $request->keterangan,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePresensiRequest $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
}
