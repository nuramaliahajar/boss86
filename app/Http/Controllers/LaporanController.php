<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;
use App\Transaksi;
use App\Mata_kuliah;
use App\Jurusan;
use App\Dosen;
use App\Kelas;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $semester = Semester::orderBy('semester', 'ASC')->get();
        $jurusan = Jurusan::orderBy('jurusan', 'ASC')->get();
        $dosen = Dosen::orderBy('nama', 'ASC')->get();
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        $matkul = Mata_kuliah::orderBy('nama', 'ASC')->get();
        return view('laporan.index', compact('semester', 'matkul', 'dosen', 'kelas', 'jurusan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'semester_id' => 'required|exists:semester,id',
            'k_jurusan' => 'required|exists:jurusan,k_jurusan',
            'kode_kls' => 'required|exists:kelas,kode_kls',
            'nidn' => 'required|exists:dosen,nidn',
            'kode_mk' => 'required|exists:mata_kuliah,kode_mk'
        ]);
        
        $jurusan = Jurusan::where('k_jurusan', $request->k_jurusan)->first();
        $semester = Semester::find($request->semester_id);
        $dosen = Dosen::where('nidn', $request->nidn)->first();
        $kelas = Kelas::where('kode_kls', $request->kode_kls)->first();
        $matkul = Mata_kuliah::where('kode_mk', $request->kode_mk)->first();

        $transaksi = Transaksi::with('absensi')
            ->where('semester_id', $request->semester_id)
            ->where('k_jurusan', $jurusan->k_jurusan)
            ->where('nidn', $request->nidn)
            ->where('kode_kls', $request->kode_kls)
            ->where('kode_mk', $request->kode_mk)
            ->first();
        $pdf = PDF::loadView('laporan.pdf', compact('transaksi', 'matkul', 'dosen', 'kelas', 'jurusan', 'semester'))->setPaper('a4', 'potrait');
        return $pdf->stream();
    }
}
