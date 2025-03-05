<?php

namespace App\Http\Controllers\Admin;

use App\Models\DataKeluarga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DataKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //index
    public function index(Request $request)
    {
        //filter berdasarkan nama_lengkap
        $search = $request->get('search');
        $dataKeluarga = DataKeluarga::where('nama_lengkap', 'LIKE', '%' . $search . '%')->paginate(10);
        return view('pages.admin.data-keluarga.index', compact('dataKeluarga', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.data-keluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'nullable',
            'nama_lengkap' => 'required',
            'status' => 'required|in:Menikah,Belum Menikah',
            'nama_pasangan' => 'nullable',
            'pekerjaan_pasangan' => 'nullable',
            'tempatlahir_pasangan' => 'nullable',
            'tanggallahir_pasangan' => ['nullable', 'regex:/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/'],
            'goldar_pasangan' => 'nullable',
            'nama_anak' => 'nullable',
            ],
            [
                'required' => 'Kolom ini wajib di isi',
            ]);

            $tanggallahir_pasangan = $request->tanggallahir_pasangan ? Carbon::createFromFormat('d/m/Y', $request->tanggallahir_pasangan)->format('Y-m-d') : null;

        // Create a new data keluarga with the validated data
        $dataKeluarga = DataKeluarga::create([
        'user_id' => Auth::id(),
        'nama_lengkap' => $request->nama_lengkap,
        'status' => $request->status,
        'nama_pasangan' => $request->nama_pasangan,
        'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
        'tempatlahir_pasangan' => $request->tempatlahir_pasangan,
        'tanggallahir_pasangan' => $tanggallahir_pasangan,
        'goldar_pasangan' => $request->goldar_pasangan,
        'nama_anak' => $request->nama_anak,
        ]);

        // Redirect to the dashboard page with a success message
        return redirect()->route('dataKeluarga.index')->with('success', 'Data Keluarga berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function edit(DataKeluarga $dataKeluarga)
    {
        return view('pages.admin.data-keluarga.edit', compact('dataKeluarga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataKeluarga $dataKeluarga)
    {
        // Validate the request
        $request->validate([
            'user_id' => 'nullable',
            'nama_lengkap' => 'required',
            'status' => 'required|in:Menikah,Belum Menikah',
            'nama_pasangan' => 'nullable',
            'pekerjaan_pasangan' => 'nullable',
            'tempatlahir_pasangan' => 'nullable',
            'tanggallahir_pasangan' => 'nullable',
            'goldar_pasangan' => 'nullable',
            'nama_anak' => 'nullable',
        ],
        [
            'required' => 'Kolom ini wajib di isi',
        ]);

        // Update the data keluarga with the validated data
        $dataKeluarga->update([
            'user_id' => Auth::id(),
            'nama_lengkap' => $request->nama_lengkap,
            'status' => $request->status,
            'nama_pasangan' => $request->nama_pasangan,
            'pekerjaan_pasangan' => $request->pekerjaan_pasangan,
            'tempatlahir_pasangan' => $request->tempatlahir_pasangan,
            'tanggallahir_pasangan' => $request->tanggallahir_pasangan,
            'goldar_pasangan' => $request->goldar_pasangan,
            'nama_anak' => $request->nama_anak,
        ]);

        return redirect()->route('dataKeluarga.index')->with('success', 'Data Keluarga berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataKeluarga $dataKeluarga)
    {
        $dataKeluarga->delete();
        return redirect()->route('dataKeluarga.index')->with('success', 'Data Keluarga berhasil dihapus');
    }
}
