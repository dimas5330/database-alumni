<?php

namespace App\Http\Controllers\Admin;

use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //index
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian dari request

        // Query dengan filter berdasarkan atribut 'name' di tabel 'users'
        $search = $request->input('search'); // Ambil parameter pencarian

        $dataKeluarga = DataKeluarga::with('user') // Pastikan memuat relasi 'user'
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%'); // Filter berdasarkan name
                });
            })
            ->paginate(10); // Tambahkan pagination dengan 10 item per halaman
        return view('pages.admin.data-keluarga.index', compact('dataKeluarga', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DataKeluarga $dataKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataKeluarga $dataKeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataKeluarga $dataKeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKeluarga $dataKeluarga)
    {
        //
    }
}
