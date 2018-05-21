<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Semester;

class SemesterController extends Controller
{
    public function index()
    {
    	return view('semester.index');
    }

    public function getData(Request $request)
    {
    	$q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
    		$semester = Semester::where('semester', 'LIKE', '%' . $q . '%')
    			->orderBy($sort, $orders)
    			->paginate(10);
    	} else {
    		$semester = Semester::orderBy($sort, $orders)
    			->paginate(10);
    	}

    	return response()->json($semester);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'semester' => 'required'
    	]);

    	$semester = Semester::firstOrCreate([
    		'semester' => $request->semester
    	]);
    	return response()->json($semester);
    }

    public function edit($id)
    {
    	$semester = Semester::findOrFail($id);
    	return response()->json($semester);
    }

    public function update(Request $request)
    {
    	$semester = Semester::findOrFail($request->id);
    	$semester->update([
    		'semester' => $request->semester
    	]);
    	return response()->json($semester);
    }

    public function delete($id)
    {
    	$semester = Semester::findOrFail($id);
    	$semester->delete();
    	return response()->json($semester);
    }
}
