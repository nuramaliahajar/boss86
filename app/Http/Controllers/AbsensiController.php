<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('mahasiswa')->orderBy('created_at', 'DESC')->paginate(10);
        return view('absensi.index', compact('absensi'));
    }

    public function tambah(Request $request)
    {
        
    }
}
