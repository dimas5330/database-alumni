<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPribadi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'goldar' => 'in:A,B,AB,O',
            'alamat' => 'required|string',
            'angkatan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'pekerjaan' => 'max:255',
            'nama_kantor' => 'max:255',
            'alamat_kantor' => 'max:255',
        ]);

        // Create a new data pribadi with the validated data
        $dataPribadi = DataPribadi::create([
            'user_id' => Auth::user()->id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'goldar' => $request->goldar,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'nama_sekolah' => $request->nama_sekolah,
            'pekerjaan' => $request->pekerjaan,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
        ]);

        // Redirect to the dashboard page with a success message
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
            'jenis_kelamin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'goldar' => 'in:A,B,AB,O',
            'alamat' => 'required|string',
            'angkatan' => 'required|string',
            'nama_sekolah' => 'required|string',
            'pekerjaan' => 'max:255',
            'nama_kantor' => 'max:255',
            'alamat_kantor' => 'max:255',
        ]);

        // Update the data pribadi of the authenticated user with the validated data
        DataPribadi::where('user_id', Auth::user()->id)->update([
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'goldar' => $request->goldar,
            'alamat' => $request->alamat,
            'angkatan' => $request->angkatan,
            'nama_sekolah' => $request->nama_sekolah,
            'pekerjaan' => $request->pekerjaan,
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('user.dashboard')->with('success', 'Data Pribadi Berhasil Diupdate');
    }

}
