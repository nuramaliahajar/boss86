<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mahasiswa;
use App\Dosen;

class UserController extends Controller
{
    public function index()
    {
    	return view('user.index');
    }

    public function getData(Request $request)
    {
        $q = $request->q;
    	$sort = $request->sort;
    	$orders = $request->orders;

    	if (!empty($q)) {
            $user = User::where('email', 'LIKE', '%' . $q . '%')
                ->orderBy($sort, $orders)->paginate(10);
    	} else {
            $user = User::orderBy($sort, $orders)->paginate(10);
    	}

    	return response()->json($user);
    }

    public function getMahasiswa()
    {
        $mahasiswa = Mahasiswa::orderBy('nama', 'ASC')->get();
        return response()->json($mahasiswa);
    }

    public function selectMhs($email)
    {
        $mahasiswa = Mahasiswa::where('email', $email)->first();
        return response()->json($mahasiswa);
    }

    public function dosen()
    {
        $dosen = Dosen::orderBy('nama')->get();
        return response()->json($dosen);
    }

    public function selectDosen($email)
    {
        $dosen = Dosen::where('email', $email)->first();
        return response()->json($dosen);
    }

    public function add()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);
        return redirect(route('user.index'))->with(['success' => 'User: ' . $user->email . ' Telah Disimpan']);
    }
}
