<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Transaksi;
use App\Mata_kuliah;
use Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('mahasiswa', 'transaksi')
            ->where('nim', Auth::user()->mahasiswa->nim)
            ->groupBy('barcode')
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('absensi.index', compact('absensi'));
    }

    public function tambah(Request $request)
    {
        return view('absensi.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'required|exists:transaksi,barcode'
        ]);
        
        $absen = Absensi::create([
            'barcode' => $request->barcode,
            'nim' => Auth::user()->mahasiswa->nim,
            'kehadiran' => 1,
            'tanggal' => Carbon::now()
        ]);

        return redirect(route('absensi.index'));
    }

    public function show($barcode)
    {
        $transaksi = Transaksi::where('barcode', $barcode)->first();
        $matkul = Mata_kuliah::where('nidn', $transaksi->nidn)->where('kode_mk', $transaksi->kode_mk)->first();
        $absensi = Absensi::with('mahasiswa')->where('nim', Auth::user()->mahasiswa->nim)->get();
        return view('absensi.view', compact('transaksi', 'matkul', 'absensi'));
    }
}
