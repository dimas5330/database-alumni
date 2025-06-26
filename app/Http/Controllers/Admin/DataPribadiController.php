<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPribadi;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DataPribadiController extends Controller
{
    //index
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian dari request
        $sort = $request->input('sort', 'nama_lengkap'); // Default sorting by 'nama_lengkap'
        $order = $request->input('order', 'asc'); // Default order is ascending

        // Query with search
        $query = DataPribadi::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        });

        // Handle special sorting for 'angkatan' column to sort numerically
        if ($sort === 'angkatan') {
            $query->orderByRaw("CAST(angkatan AS UNSIGNED) $order");
        } else {
            $query->orderBy($sort, $order);
        }

        $dataPribadi = $query->paginate(10); // Pagination with 10 items per page

        return view('pages.admin.data-pribadi.index', compact('dataPribadi', 'search', 'sort', 'order'));
    }

    //create
    public function create()
    {
        return view('pages.admin.data-pribadi.create');
    }

    //store based on database/migrations/2024_11_26_034043_create_data_pribadi_table.php
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki - Laki,Perempuan',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => ['required', 'regex:/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/'],
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
        ],
        [
            'required' => 'Kolom ini wajib di isi',
        ]);

        $tanggal_lahir = Carbon::createFromFormat('d/m/Y', $request->tanggal_lahir)->format('Y-m-d');

        DataPribadi::create([
            'user_id' => Auth::id(), // Set default value untuk user_id
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
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
        return redirect()->route('dataPribadi.index')->with('success', 'Data Pribadi berhasil ditambahkan');
    }

    //edit
    public function edit($id)
    {
        $dataPribadi = DataPribadi::findOrFail($id);
        return view('pages.admin.data-pribadi.edit', compact('dataPribadi'));
    }

    //update based on database/migrations/2024_11_26_034043_create_data_pribadi_table.php
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'nullable',
            'nama_lengkap' => 'required|string',
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
        ],
        [
            'required' => 'Kolom ini wajib di isi',
        ]);

        $dataPribadi = DataPribadi::findOrFail($id);
        $dataPribadi->update($request->all());
        return redirect()->route('dataPribadi.index')->with('success', 'Data Pribadi berhasil diubah');
    }

    //destroy
    public function destroy($id)
    {
        $dataPribadi = DataPribadi::findOrFail($id);
        $dataPribadi->delete();
        return redirect()->route('dataPribadi.index')->with('success', 'Data Pribadi berhasil dihapus');
    }


}
