@extends('layouts.master')

@section('title')
	<title>Absensi</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Absensi</li>
	  	</ol>
  		<h1 class="page-title">Absensi</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-6">
				@component('components.panel')
                    @slot('title')
                    @endslot
					@slot('addon')
					@endslot

					@if (session('success'))
						@component('components.alert', ['type' => 'success'])
							{!! session('success') !!}
						@endcomponent
					@endif
					
					<table class="table table-hover">
                        <thead>
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
                        </thead>
                    </table>
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection

@section('js')
    <script src="{{ asset('js/absensi.js') }}"></script>
@endsection