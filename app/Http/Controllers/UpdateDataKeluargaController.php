<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKeluarga;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateDataKeluargaController extends Controller
{
    //create
    public function create()
    {
        return view('pages.user.data-keluarga.create');
    }

    //store data keluarga
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_lengkap' => 'required',
            'status' => 'required|in:Menikah,Belum Menikah',
            'nama_pasangan' => '',
            'pekerjaan_pasangan' => '',
            'tempatlahir_pasangan' => '',
            'tanggallahir_pasangan' => '',
            'goldar_pasangan' => '',
            'nama_anak' => '',
        ]);

        // Create a new data keluarga with the validated data
        $dataKeluarga = DataKeluarga::create([
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'status' => $request->status,
            'nama_pasangan' => $request->nama_pasangan,
            'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
            'tempatlahir_pasangan' => $request->tempatlahir_pasangan,
            'tanggallahir_pasangan' => $request->tanggallahir_pasangan,
            'goldar_pasangan' => $request->goldar_pasangan,
            'nama_anak' => $request->nama_anak,
        ]);

        // Redirect to the dashboard page with a success message
        Alert::success('Berhasil!', 'Data Keluarga Berhasil Disimpan');
        return redirect()->route('user.dashboard')->withSucessMessage('success', 'Data Keluarga Berhasil Disimpan');
    }

    //edit
    public function edit()
    {
        // Get the data keluarga of the authenticated user
        $dataKeluarga = DataKeluarga::where('user_id', Auth::user()->id)->first();

        // Return the view with the data keluarga
        return view('pages.user.data-keluarga.edit', compact('dataKeluarga'));
    }

    //update data keluarga
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'status' => 'required',
            'nama_pasangan' => '',
            'pekerjaan_pasangan' => '',
            'tempatlahir_pasangan' => '',
            'tanggallahir_pasangan' => '',
            'goldar_pasangan' => '',
            'nama_anak' => '',
        ]);

        // Update the data keluarga of the authenticated user with the validated data
        DataKeluarga::where('user_id', Auth::user()->id)->update([
            'user_id' => Auth::user()->id,
            'status' => $request->status,
            'nama_pasangan' => $request->nama_pasangan,
            'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
            'tempatlahir_pasangan' => $request->tempatlahir_pasangan,
            'tanggallahir_pasangan' => $request->tanggallahir_pasangan,
            'goldar_pasangan' => $request->goldar_pasangan,
            'nama_anak' => $request->nama_anak,
        ]);

        // Redirect to the dashboard page with a success message
        Alert::success('Berhasil!', 'Data Keluarga Berhasil Diupdate');
        return redirect()->route('user.dashboard')->withSucessMessage('success', 'Data Keluarga Berhasil Diupdate');

    }
}
