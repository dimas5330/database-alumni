<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPelayanan;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UpdateDataPelayananController extends Controller
{
    //create
    public function create()
    {
        return view('pages.user.data-pelayanan.create');
    }

    //store data pelayanan
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_lengkap' => 'required',
            'pelayanan_perkantas' => 'required',
            'jabatan_pelayanan' => 'required',
            'nama_gereja' => 'required',
            'pelayanan_sekarang' => 'required',
        ]);

        // Create a new data pelayanan with the validated data
        $dataPelayanan = DataPelayanan::create([
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'pelayanan_perkantas' => $request->pelayanan_perkantas,
            'jabatan_pelayanan' => $request->jabatan_pelayanan,
            'nama_gereja' => $request->nama_gereja,
            'pelayanan_sekarang' => $request->pelayanan_sekarang,
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('user.dashboard');
    }

    //edit
    public function edit()
    {
        // Get the data pelayanan of the authenticated user
        $dataPelayanan = DataPelayanan::where('user_id', Auth::user()->id)->first();

        // Return the view with the data pelayanan
        return view('pages.user.data-pelayanan.edit', compact('dataPelayanan'));
    }

    //update data pelayanan
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'pelayanan_perkantas' => 'required',
            'jabatan_pelayanan' => 'required',
            'nama_gereja' => 'required',
            'pelayanan_sekarang' => 'required',
        ]);

        // Update the data pelayanan with the validated data
        $dataPelayanan = DataPelayanan::where('user_id', Auth::user()->id)->first();
        $dataPelayanan->update([
            'user_id' => Auth::user()->id,
            'pelayanan_perkantas' => $request->pelayanan_perkantas,
            'jabatan_pelayanan' => $request->jabatan_pelayanan,
            'nama_gereja' => $request->nama_gereja,
            'pelayanan_sekarang' => $request->pelayanan_sekarang,
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('user.dashboard');
    }
}
