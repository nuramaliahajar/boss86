<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function index()
    {
    	return view('kelas.index');
    }

    public function getData(Request $request)
    {
    	$q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
    		$kelas = Kelas::where('kelas', 'LIKE', '%' . $q . '%')
    			->orderBy($sort, $orders)
    			->paginate(10);
    	} else {
    		$kelas = Kelas::orderBy($sort, $orders)
    			->paginate(10);
    	}

    	return response()->json($kelas);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'kode_kls' => 'required',
    		'kelas' => 'required'
    	]);

    	$kelas = Kelas::firstOrCreate([
    		'kode_kls' => $request->kode_kls
    	], [
    		'kelas' => $request->kelas
    	]);
    	return response()->json($kelas);
    }

    public function edit($kode_kls)
    {
    	$kelas = Kelas::findOrFail($kode_kls);
    	return response()->json($kelas);
    }

    public function update(Request $request)
    {
    	$kelas = Kelas::findOrFail($request->kode_kls);
    	$kelas->update([
    		'kelas' => $request->kelas
    	]);
    	return response()->json($kelas);
    }

    public function delete($kode_kls)
    {
    	$kelas = Kelas::findOrFail($kode_kls);
    	$kelas->delete();
    	return response()->json($kelas);
    }
}
