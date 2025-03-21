<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPelayanan;
use Illuminate\Support\Facades\Auth;

class DataPelayananController extends Controller
{
    //index
    public function index(Request $request)
    {
        // Query dengan filter berdasarkan atribut 'name' di tabel 'users'
        $search = $request->get('search');
        $dataPelayanan = DataPelayanan::where('nama_lengkap', 'LIKE', '%' . $search . '%')->paginate(10);// Tambahkan pagination dengan 10 item per halaman
        return view('pages.admin.data-pelayanan.index', compact('dataPelayanan', 'search'));
    }

    //create
    public function create()
    {
        return view('pages.admin.data-pelayanan.create');
    }

    //store based on database/migrations/2024_11_26_034043_create_data_pelayanan_table.php
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'nullable',
            'nama_lengkap' => 'required',
            'pelayanan_perkantas' => 'required',
            'jabatan_pelayanan' => 'required',
            'nama_gereja' => 'required',
            'pelayanan_sekarang' => 'required',
        ],
        [
            'required' => 'Kolom ini wajib di isi',
        ]);

        // Create a new data pelayanan with the validated data
        $dataPelayanan = DataPelayanan::create([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'pelayanan_perkantas' => $request->pelayanan_perkantas,
            'jabatan_pelayanan' => $request->jabatan_pelayanan,
            'nama_gereja' => $request->nama_gereja,
            'pelayanan_sekarang' => $request->pelayanan_sekarang,
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('dataPelayanan.index')->with('success', 'Data Pelayanan berhasil ditambahkan');
    }

    //edit
    public function edit(DataPelayanan $dataPelayanan)
    {
        return view('pages.admin.data-pelayanan.edit', compact('dataPelayanan'));
    }

    //update based on database/migrations/2024_11_26_034043_create_data_pelayanan_table.php
    public function update(Request $request, DataPelayanan $dataPelayanan)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'nullable',
            'nama_lengkap' => 'required',
            'pelayanan_perkantas' => 'required',
            'jabatan_pelayanan' => 'required',
            'nama_gereja' => 'required',
            'pelayanan_sekarang' => 'required',
        ],
        [
            'required' => 'Kolom ini wajib di isi',
        ]);

        // Update the data pelayanan with the validated data
        $dataPelayanan->update([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'pelayanan_perkantas' => $request->pelayanan_perkantas,
            'jabatan_pelayanan' => $request->jabatan_pelayanan,
            'nama_gereja' => $request->nama_gereja,
            'pelayanan_sekarang' => $request->pelayanan_sekarang,
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('dataPelayanan.index')->with('success', 'Data Pelayanan berhasil ditambahkan');
    }

    //destroy
    public function destroy(DataPelayanan $dataPelayanan)
    {
        $dataPelayanan->delete();
        return redirect()->route('dataPelayanan.index')->with('success', 'Data Pelayanan berhasil dihapus');
    }

}
