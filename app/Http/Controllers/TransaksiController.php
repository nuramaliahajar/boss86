<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = Transaksi::orderBy('created_at', 'ASC');
        return view('transaksi.index', compact('transaksi'));
    }
}
