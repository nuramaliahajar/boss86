<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
    	return view('jurusan.index');
    }

    public function getData(Request $request)
    {
    	$q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
    		$jurusan = Jurusan::where('jurusan', 'LIKE', '%' . $q . '%')
    			->orderBy($sort, $orders)
    			->paginate(10);
    	} else {
    		$jurusan = Jurusan::orderBy($sort, $orders)
    			->paginate(10);
    	}

    	return response()->json($jurusan);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'k_jurusan' => 'required',
    		'jurusan' => 'required'
    	]);

    	$jurusan = Jurusan::firstOrCreate([
    		'k_jurusan' => $request->k_jurusan
    	], [
    		'jurusan' => $request->jurusan
    	]);
    	return response()->json($jurusan);
    }

    public function edit($k_jurusan)
    {
    	$jurusan = Jurusan::findOrFail($k_jurusan);
    	return response()->json($jurusan);
    }

    public function update(Request $request)
    {
    	$jurusan = Jurusan::findOrFail($request->k_jurusan);
    	$jurusan->update([
    		'jurusan' => $request->jurusan
    	]);
    	return response()->json($jurusan);
    }

    public function delete($k_jurusan)
    {
    	$jurusan = Jurusan::findOrFail($k_jurusan);
    	$jurusan->delete();
    	return response()->json($jurusan);
    }
}
