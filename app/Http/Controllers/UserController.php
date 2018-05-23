<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    public function add()
    {
        return view('user.add');
    }
}
