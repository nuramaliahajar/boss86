<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Jurusan;
use App\Semester;
use App\Mahasiswa_semester;
use Carbon\Carbon;
use DB;

class MahasiswaController extends Controller
{
    public function index()
    {
    	$mahasiswa = Mahasiswa::with('jurusan')->orderBy('created_at', 'DESC')->paginate(10);
    	return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function add()
    {
    	$jurusan = Jurusan::orderBy('jurusan', 'ASC')->get();
        $semester = Semester::orderBy('semester', 'ASC')->get();
    	return view('mahasiswa.add', compact('jurusan', 'semester'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required|string|max:12|unique:mahasiswa',
            'nama' => 'required|string|max:35',
            'alamat' => 'required|string|max:35',
            'tgl_lahir' => 'required',
            'no_tlpn' => 'required|max:12',
            'k_jurusan' => 'required|exists:jurusan,k_jurusan',
            'semester_id' => 'required|exists:semester,id',
            'email' => 'required|email|unique:mahasiswa'
        ]);

        $tgl_lahir = Carbon::parse($request->tgl_lahir)->format('Y-m-d');

        DB::beginTransaction();
        try {
            $mahasiswa = Mahasiswa::create([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgl_lahir' => $tgl_lahir,
                'no_tlpn' => $request->no_tlpn,
                'k_jurusan' => $request->k_jurusan,
                'email' => $request->email
            ]);

            $mhs_sm = Mahasiswa_semester::create([
                'semester_id' => $request->semester_id,
                'nim' => $mahasiswa->nim,
                'status' => true
            ]);
            $success = true;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        DB::commit();
        if ($success) {
            return redirect(route('mahasiswa.index'))->with(['success' => 'Data :' . $mahasiswa->nim . ' Berhasil Disimpan']);
        }
    }
}
