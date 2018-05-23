<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class DosenController extends Controller
{
    public function index()
    {
    	return view('dosen.index');
    }

    public function getData(Request $request)
    {
        $q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
            $dosen = Dosen::where('nidn', 'LIKE', '%' . $q . '%')
                ->orderBy($sort, $orders)->paginate(10);
    	} else {
            $dosen = Dosen::orderBy($sort, $orders)->paginate(10);
    	}

    	return response()->json($dosen);
    }

    public function detail($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return response()->json($dosen);
    }

    public function add()
    {
    	return view('dosen.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nidn' => 'required|string|max:12|unique:dosen',
            'nama' => 'required|string|max:35',
            'alamat' => 'required|string|max:35',
            'tgl_lahir' => 'required',
            'no_tlpn' => 'required|max:12',
            'email' => 'required|email|unique:dosen'
        ]);

        $tgl_lahir = Carbon::parse($request->tgl_lahir)->format('Y-m-d');

        DB::beginTransaction();
        try {
            $dosen = Dosen::firstOrCreate([
                'nidn' => $request->nidn
            ], [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgl_lahir' => $tgl_lahir,
                'no_tlpn' => $request->no_tlpn,
                'email' => $request->email
            ]);
            $success = true;
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

        DB::commit();
        if ($success) {
            return redirect(route('dosen.index'))->with(['success' => 'Data :' . $dosen->nidn . ' Berhasil Disimpan']);
        }
    }

    public function edit($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $nidn)
    {
        $this->validate($request, [
            'nidn' => 'required|string|max:12|exists:dosen,nidn',
            'nama' => 'required|string|max:35',
            'alamat' => 'required|string|max:35',
            'tgl_lahir' => 'required',
            'no_tlpn' => 'required|max:12',
            'email' => 'required|email'
        ]);

        $tgl_lahir = Carbon::parse($request->tgl_lahir)->format('Y-m-d');
        try {
            $dosen = Dosen::findOrFail($nidn);
            $dosen->update([
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'tgl_lahir' => $tgl_lahir,
                'no_tlpn' => $request->no_tlpn,
                'email' => $request->email
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
        return redirect(route('dosen.index'))->with(['success' => 'Data Telah Diubah']);
    }

    public function destroy($nidn)
    {
        $dosen = Dosen::findOrFail($nidn);
        $dosen->delete();
        return response()->json($dosen);
    }
}
