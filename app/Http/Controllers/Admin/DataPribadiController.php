<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataPribadi;

class DataPribadiController extends Controller
{
    //index
    public function index()
    {
        $dataPribadi = DataPribadi::all();
        return view('pages.admin.data-pribadi.index', compact('dataPribadi'));
    }
}
