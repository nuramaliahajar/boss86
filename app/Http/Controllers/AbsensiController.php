<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('mahasiswa')->orderBy('created_at', 'DESC')->paginate(10);
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
}
