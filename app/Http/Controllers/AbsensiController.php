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
        $absensi = Absensi::with('mahasiswa')
            ->where('nim', Auth::user()->mahasiswa->nim)
            ->where('barcode', $barcode)
            ->get();
        return view('absensi.view', compact('transaksi', 'matkul', 'absensi'));
    }

    //request absen
    public function absenRequest()
    {
        $transaksi = Transaksi::with('jurusan', 'matakuliah', 'dosen')->where('k_jurusan', Auth::user()->mahasiswa->k_jurusan)->get();
        return view('absensi.request_absen', compact('transaksi'));
    }

    public function storeRequest(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'required|exists:transaksi,barcode',
            'alasan' => 'required'
        ]);

        $absen = Absensi::create([
            'barcode' => $request->barcode,
            'nim' => Auth::user()->mahasiswa->nim,
            'kehadiran' => $request->alasan,
            'status' => false,
            'tanggal' => Carbon::now()
        ]);
        return redirect(route('absensi.index'));
    }

    public function verifikasiRequest()
    {
        $absen = Absensi::where('status', 0)
            ->with('transaksi')
            ->whereHas('transaksi', function ($q) {
                $q->where('nidn', Auth::user()->dosen->nidn);
            })
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('absensi.verifikasi', compact('absen'));
    }

    public function storeVerifikasi($id)
    {
        $absen = Absensi::find($id);
        $absen->update(['status' => 1]);
        return redirect()->back();
    }
}
