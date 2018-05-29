<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Jurusan;
use App\Dosen;
use App\Kelas;
use App\Semester;
use App\Mata_kuliah;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('created_at', 'ASC');
        if (Auth::user()->role == 0) {
            $transaksi = $transaksi->paginate(10);
        } else {
            $transaksi = $transaksi->where('nidn', Auth::user()->dosen->nidn)->paginate(10);
        }
        
        return view('transaksi.index', compact('transaksi'));
    }

    public function getMatkul($nidn)
    {
        $matkul = Mata_kuliah::where('nidn', $nidn)->orderBy('nama', 'ASC')->get();
        return response()->json($matkul);
    }

    public function add()
    {
        $jurusan = Jurusan::orderBy('jurusan', 'ASC')->get();
        $dosen = Dosen::orderBy('nama', 'ASC')->get();
        $kelas = Kelas::orderBy('kelas', 'ASC')->get();
        $semester = Semester::orderBy('semester', 'ASC')->get();
        return view('transaksi.add', compact('jurusan', 'dosen', 'kelas', 'semester'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'k_jurusan' => 'required|exists:jurusan,k_jurusan',
            'nidn' => 'required|exists:dosen,nidn',
            'kode_mk' => 'required|exists:mata_kuliah,kode_mk',
            'kode_kls' => 'required|exists:kelas,kode_kls',
            'semester_id' => 'required|exists:semester,id'
        ]);


        try {
            $transaksi = Transaksi::create([
                'barcode' => $this->generateBarcode(),
                'k_jurusan' => $request->k_jurusan,
                'nidn' => $request->nidn,
                'kode_mk' => $request->kode_mk,
                'kode_kls' => $request->kode_kls,
                'semester_id' => $request->semester_id
            ]);
            return redirect(route('transaksi.index'))->with(['success' => 'Perkuliahan: #' . $transaksi->barcode . ' Telah Dibuat']);
        } catch (\Exception $e) {
            return redirect()->back(['error' => $e->getMessage()]);
        }
    }

    private function generateBarcode()
    {
        $transaksi = Transaksi::orderBy('created_at', 'DESC');
        if ($transaksi->get()->count() > 0) {
            $getBarcode = $transaksi->first()->barcode;
            $exBarcode = explode('-', $getBarcode);
            $count = $exBarcode[1] + 1;
            $barcode = 'boss-' . $count;
            return $barcode;
        } 
        return 'boss-1';
    }

    public function showBarcode($barcode)
    {
        $transaksi = Transaksi::with('dosen', 'kelas', 'semester')
            ->where('barcode', $barcode)->first();
        $matkul = Mata_kuliah::where('nidn', $transaksi->nidn)->where('kode_mk', $transaksi->kode_mk)->first();
        return view('transaksi.view', compact('transaksi', 'matkul'));
    }
}
