@extends('layouts.master')

@section('title')
	<title>Show Barcode</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Show Barcode</li>
	  	</ol>
  		<h1 class="page-title">Show Barcode</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-12">
				@component('components.panel')
					@slot('title')
					@endslot
					@slot('addon')
					@endslot
                    
                    <div class="row">
                        <div class="col-md-6">
                            <qr-code 
                                text="{{ $transaksi->barcode }}"
                                error-level="M">
                            </qr-code>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-hover">
                                <tr>
                                    <th>Dosen</th>
                                    <td></td>
                                    <td class="dosen">{{ $transaksi->dosen->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Mata Kuliah</th>
                                    <td></td>
                                    <td class="matkul">{{ $matkul->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td></td>
                                    <td class="kelas">{{ $transaksi->kelas->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td></td>
                                    <td class="semester">{{ $transaksi->semester->semester }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection

@section('js')
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection