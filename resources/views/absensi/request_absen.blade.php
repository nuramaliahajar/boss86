@extends('layouts.master')

@section('title')
	<title>Request Absensi</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Request Absensi</li>
	  	</ol>
  		<h1 class="page-title">Request Absensi</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-8">
				@component('components.panel')
                    @slot('title')
                    @endslot
					@slot('addon')
					@endslot

                    {!! Form::open(['url' => 'absensi/request']) !!}
                    <div class="form-group">
                        <label for="">Perkuliahan</label>
                        <select name="barcode" id="" required class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($transaksi as $row)
                            <option value="{{ $row->barcode }}">{{ $row->kode_mk }} - {{ $row->dosen->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Alasan</label>
                        <select name="alasan" id="" required class="form-control">
                            <option value="">Pilih</option>
                            <option value="2">Izin</option>
                            <option value="3">Sakit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Request!</button>
                    </div>
                    {!! Form::close() !!}
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection