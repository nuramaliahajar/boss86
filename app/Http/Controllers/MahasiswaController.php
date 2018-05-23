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
    	
    	return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function getData(Request $request)
    {
        $q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
            $mahasiswa = Mahasiswa::where('nim', 'LIKE', '%' . $q . '%')
                ->with('jurusan')->orderBy($sort, $orders)->paginate(10);
    	} else {
            $mahasiswa = Mahasiswa::with('jurusan')->orderBy($sort, $orders)->paginate(10);
    	}

    	return response()->json($mahasiswa);
    }

    public function detail($nim)
    {
        $mahasiswa = Mahasiswa::with('jurusan', 'mahasiswa_semester')->findOrFail($nim);
        return response()->json($mahasiswa);
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
            $mahasiswa = Mahasiswa::firstOrCreate([
                'nim' => $request->nim
            ], [
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

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $jurusan = Jurusan::orderBy('jurusan', 'ASC')->get();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusan'));
    }

    public function update(Request $request, $nim)
    {
        $this->validate($request, [
            'nim' => 'required|string|max:12|exists:mahasiswa,nim',
            'nama' => 'required|string|max:35',
            'alamat' => 'required|string|max:35',
            'tgl_lahir' => 'required',
            'no_tlpn' => 'required|max:12',
            'k_jurusan' => 'required|exists:jurusan,k_jurusan',
            'email' => 'required|email'
        ]);

        $tgl_lahir = Carbon::parse($request->tgl_lahir)->format('Y-m-d');
        try {
            $mahasiswa = Mahasiswa::findOrFail($nim);
            $mahasiswa->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgl_lahir' => $tgl_lahir,
                'no_tlpn' => $request->no_tlpn,
                'k_jurusan' => $request->k_jurusan,
                'email' => $request->email
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        return redirect(route('mahasiswa.index'))->with(['success' => 'Data Telah Diubah']);
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();
        return response()->json($mahasiswa);
    }
}
