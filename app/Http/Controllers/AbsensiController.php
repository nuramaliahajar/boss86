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
        $absensi = Absensi::select('absensi.barcode', 'absensi.nim', 'transaksi.nidn', 'dosen.nama', 'jurusan.jurusan', 'mata_kuliah.nama as nama_matakuliah', 'kelas.kelas')
            ->join('transaksi', function($join) {
                $join->on('transaksi.barcode', '=', 'absensi.barcode');
            })
            ->join('dosen', function($join){
                $join->on('transaksi.nidn', '=', 'dosen.nidn');
            })
            ->join('jurusan', function($join) {
                $join->on('transaksi.k_jurusan', '=', 'jurusan.k_jurusan');
            })
            ->join('mata_kuliah', function($join) {
                $join->on('transaksi.kode_mk', '=', 'mata_kuliah.kode_mk');
            })
            ->join('kelas', function($join) {
                $join->on('transaksi.kode_kls', '=', 'kelas.kode_kls');
            })
            ->with('mahasiswa', 'transaksi')
            ->where('absensi.nim', Auth::user()->mahasiswa->nim)
            ->groupBy('absensi.barcode')
            ->orderBy('absensi.created_at', 'DESC')->paginate(10);
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
        $transaksi = Transaksi::select('transaksi.barcode', 'transaksi.nidn', 'transaksi.kode_mk', 'mata_kuliah.nama', 'transaksi.k_jurusan')
            ->join('mata_kuliah', function($join) {
                $join->on('transaksi.nidn', '=', 'mata_kuliah.nidn');
                $join->on('transaksi.kode_mk', '=', 'mata_kuliah.kode_mk');
            })
            ->with('jurusan', 'dosen')
            ->where('transaksi.k_jurusan', Auth::user()->mahasiswa->k_jurusan)->get();
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
        return redirect(route('absensi.index'))->with(['success' => 'Permintaan Telah Dikirim']);
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

    public function storeVerifikasi(Request $request, $id)
    {
        $this->validate($request, [
            'alasan' => 'required'
        ]);

        $absen = Absensi::find($id);
        if ($request->alasan == 1) {
            $status = 'Diterima';
            $absen->update(['status' => 1]);
        } else {
            $status = 'Ditolak';
            $absen->update([
                'kehadiran' => 0,
                'status' => 1
            ]);
        }
        
        return redirect()->back()->with(['success' => 'Permintaan mahasiswa ' . $status]);
    }

    //MANUAL ABSEN
    public function manualAbsen()
    {
        $transaksi = Transaksi::select('transaksi.barcode', 'transaksi.nidn', 'transaksi.kode_mk', 'mata_kuliah.nama', 'transaksi.k_jurusan')
            ->join('mata_kuliah', function($join) {
                $join->on('transaksi.nidn', '=', 'mata_kuliah.nidn');
                $join->on('transaksi.kode_mk', '=', 'mata_kuliah.kode_mk');
            })
            ->with('jurusan', 'dosen')
            ->where('transaksi.nidn', Auth::user()->dosen->nidn)->get();
        return view('absensi.manual', compact('transaksi'));
    }

    public function storeManual(Request $request)
    {
        $this->validate($request, [
            'barcode' => 'required|exists:transaksi,barcode',
            'nim' => 'required|exists:mahasiswa,nim'
        ]);

        $absensi = Absensi::create([
            'barcode' => $request->barcode,
            'nim' => $request->nim,
            'kehadiran' => 1,
            'status' => 1
        ]);
        return redirect()->back()->with(['success' => 'NIM: ' . $absen->nim . ' Telah Diabsen']);
    }
}
