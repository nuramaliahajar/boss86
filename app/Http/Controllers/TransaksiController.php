<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Jurusan;
use App\Dosen;
use App\Kelas;
use App\Semester;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('created_at', 'ASC');
        return view('transaksi.index', compact('transaksi'));
    }

    public function add()
    {
        $jurusan = Jurusan::orderBy('jurusan', 'ASC')->get();
        $dosen = Dosen::orderBy('nama', 'ASC')->get();
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        $semester = Semester::orderBy('semester', 'ASC')->get();
        return view('transaksi.add', compact('jurusan', 'dosen', 'kelas', 'semester'));
    }
}
