<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataPribadiController extends Controller
{
    //store data pribadi
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'goldar' => '',
            'alamat' => 'required',
            'angkatan' => 'required',
            'nama_sekolah' => 'required',
            'pekerjaan' => '',
            'nama_kantor' => '',
        ]);

        $data = new DataPribadi;
        $data->nama = $request->nama;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->goldar = $request->goldar;
        $data->alamat = $request->alamat;
        $data->angkatan = $request->angkatan;
        $data->nama_sekolah = $request->nama_sekolah;
        $data->pekerjaan = $request->pekerjaan;
        $data->nama_kantor = $request->nama_kantor;
        $data->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
