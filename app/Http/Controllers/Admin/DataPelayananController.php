<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataPelayananController extends Controller
{
    //index
    public function index(Request $request)
    {
        // Query dengan filter berdasarkan atribut 'name' di tabel 'users'
        $search = $request->input('search'); // Ambil parameter pencarian

        $dataPelayanan = DataPelayanan::with('user') // Pastikan memuat relasi 'user'
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%'); // Filter berdasarkan name
                });
            })
            ->paginate(10); // Tambahkan pagination dengan 10 item per halaman
        return view('pages.admin.data-pelayanan.index', compact('dataPelayanan', 'search'));
    }
}
