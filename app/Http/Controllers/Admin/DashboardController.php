<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\DataPribadi;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total users
        $totalUsers = User::count();

        // Ambil data tahun angkatan dan jumlah alumni dari tabel data_pribadi
        $alumniData = DB::table('data_pribadis')
            ->select(DB::raw('angkatan, COUNT(*) as total'))
            ->groupBy('angkatan')
            ->orderBy('angkatan')
            ->get();

        // Kirimkan data ke view
        return view('pages.admin.dashboard', compact('totalUsers', 'alumniData'));
    }
}
