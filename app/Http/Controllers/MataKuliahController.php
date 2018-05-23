<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mata_kuliah;
use App\Dosen;

class MataKuliahController extends Controller
{
    public function index()
    {
    	return view('matkul.index');
    }

    public function getData(Request $request)
    {
    	$q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
    		$mata_kuliah = Mata_kuliah::with('dosen')->where('nama', 'LIKE', '%' . $q . '%')
    			->orderBy($sort, $orders)
    			->paginate(10);
    	} else {
    		$mata_kuliah = Mata_kuliah::with('dosen')->orderBy($sort, $orders)
    			->paginate(10);
    	}

    	return response()->json($mata_kuliah);
    }

    public function getDosen()
    {
        $dosen = Dosen::orderBy('nama', 'asc')->get();
        return response()->json($dosen);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'kode_mk' => 'required',
            'nama' => 'required',
            'nidn' => 'required',
            'sks' => 'required'
    	]);

    	$mata_kuliah = Mata_kuliah::firstOrCreate([
    		'kode_mk' => $request->kode_mk
    	], [
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'sks' => $request->sks
    	]);
    	return response()->json($mata_kuliah);
    }

    public function edit($kode_mk)
    {
        $mata_kuliah = Mata_kuliah::findOrFail($kode_mk);
        $dosen = Dosen::orderBy('nama', 'ASC')->get();
    	return view('matkul.edit', compact('mata_kuliah', 'dosen'));
    }

    public function update(Request $request, $kode_mk)
    {
    	$mata_kuliah = Mata_kuliah::findOrFail($request->kode_mk);
    	$mata_kuliah->update([
            'nama' => $request->nama,
            'nidn' => $request->nidn,
            'sks' => $request->sks
    	]);
    	return response()->json($mata_kuliah);
    }

    public function delete($kode_mk)
    {
    	$mata_kuliah = Mata_kuliah::findOrFail($kode_mk);
    	$mata_kuliah->delete();
    	return response()->json($mata_kuliah);
    }
}
