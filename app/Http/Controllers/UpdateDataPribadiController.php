<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPribadi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UpdateDataPribadiController extends Controller
{

    //create
    public function create()
    {
        return view('pages.user.data-pribadi.create');
    }

    //store data pribadi
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'goldar' => 'nullable|in:A,B,AB,O',
            'alamat' => 'required|string',
            'angkatan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'fakultas' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'profesi' => 'nullable|string',
            'nama_kantor' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
        ]);

        // Create a new data pribadi with the validated data
        $dataPribadi = DataPribadi::create([
            'user_id' => Auth::user()->id,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'goldar' => $request->goldar,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'nama_sekolah' => $request->nama_sekolah,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'pekerjaan' => $request->pekerjaan,
            'profesi' => $request->profesi,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
        ]);

        // Redirect to the dashboard page with a success message
        Alert::success('Hore!', 'Post Created Successfully');
        return redirect()->route('user.dashboard');
    }

    //edit
    public function edit()
    {
        // Get the data pribadi of the authenticated user
        $dataPribadi = DataPribadi::where('user_id', Auth::user()->id)->first();

        // Return the view with the data pribadi
        return view('pages.user.data-pribadi.edit', compact('dataPribadi'));
    }

    //update
    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'goldar' => 'nullable|in:A,B,AB,O',
            'alamat' => 'required|string',
            'angkatan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'fakultas' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'profesi' => 'nullable|string',
            'nama_kantor' => 'nullable|string',
            'alamat_kantor' => 'nullable|string',
        ]);

        // Update the data pribadi of the authenticated user with the validated data
        DataPribadi::where('user_id', Auth::user()->id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'goldar' => $request->goldar,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'nama_sekolah' => $request->nama_sekolah,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan,
            'pekerjaan' => $request->pekerjaan,
            'profesi' => $request->profesi,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
        ]);

        // Redirect to the dashboard page with a success message
        Alert::success('Hore!', 'Post Created Successfully');
        return redirect()->route('user.dashboard')->withSucessMessage('success', 'Data Pribadi Berhasil Diupdate');
    }

}
