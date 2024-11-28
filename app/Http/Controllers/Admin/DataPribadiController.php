<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPribadi;

class DataPribadiController extends Controller
{
    //index
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian dari request

        // Query dengan filter berdasarkan atribut 'name' di tabel 'users'
        $search = $request->input('search'); // Ambil parameter pencarian

        $dataPribadi = DataPribadi::with('user') // Pastikan memuat relasi 'user'
            ->when($search, function ($query, $search) {
                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%'); // Filter berdasarkan name
                });
            })
            ->paginate(10); // Tambahkan pagination dengan 10 item per halaman
        return view('pages.admin.data-pribadi.index', compact('dataPribadi', 'search'));
    }
}
