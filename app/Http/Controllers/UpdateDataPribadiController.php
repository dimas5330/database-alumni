<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateDataPribadiController extends Controller
{

    //create
    public function create()
    {
        return view('pages.user.data-pribadi.create');
    }

    //store
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'jenis_kelamin' => ['required', 'in:Pria,Wanita'],
            'tempat_lahir' => ['required', 'max:255', 'min:3'],
            'tanggal_lahir' => ['required', 'date'],
            'goldar' => ['in:A,B,AB,O'],
            'alamat' => ['required', 'max:255', 'min:3'],
            'angkatan' => ['required', 'numeric', 'digits:4'],
            'nama_sekolah' => ['required', 'max:255', 'min:3'],
            'pekerjaan' => ['max:255', 'min:3'],
            'nama_kantor' => ['max:255', 'min:3'],
            'alamat_kantor' => ['max:255', 'min:3'],
        ]);

        $data_pribadi = new DataPribadi();
        $data_pribadi->user_id = $request->user_id;
        $data_pribadi->jenis_kelamin = $request->jenis_kelamin;
        $data_pribadi->tempat_lahir = $request->tempat_lahir;
        $data_pribadi->tanggal_lahir = $request->tanggal_lahir;
        $data_pribadi->goldar = $request->goldar;
        $data_pribadi->alamat = $request->alamat;
        $data_pribadi->angkatan = $request->angkatan;
        $data_pribadi->nama_sekolah = $request->nama_sekolah;
        $data_pribadi->pekerjaan = $request->pekerjaan;
        $data_pribadi->nama_kantor = $request->nama_kantor;
        $data_pribadi->alamat_kantor = $request->alamat_kantor;
        $data_pribadi->save();

        return redirect()->route('user.dashboard');
    }
}
