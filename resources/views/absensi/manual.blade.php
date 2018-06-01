@extends('layouts.master')

@section('title')
	<title>Manual Absensi</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Manual Absensi</li>
	  	</ol>
  		<h1 class="page-title">Manual Absensi</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-8">
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

                    {!! Form::open(['url' => 'absensi/manual']) !!}
                    <div class="form-group">
                        <label for="">Perkuliahan</label>
                        <select name="barcode" id="" required class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($transaksi as $row)
                            <option value="{{ $row->barcode }}">
                                {{ $row->nama }} (<sup>{{ $row->jurusan->jurusan }}</sup>) - {{ $row->dosen->nama }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">NIM Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" required>
                        <p class="text-danger">{{ $errors->first('nim') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Absen!</button>
                    </div>
                    {!! Form::close() !!}
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection