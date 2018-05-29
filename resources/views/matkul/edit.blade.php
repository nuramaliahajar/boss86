@extends('layouts.master')

@section('title')
	<title>Edit Data</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Edit Data</li>
	  	</ol>
  		<h1 class="page-title">Edit Data</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			
			<div class="col-md-12">
				@component('components.panel')
					@slot('title')
					@endslot
					@slot('addon')
					@endslot

					@if (session('error'))
						@component('components.alert', ['type' => 'danger'])
							{{ session('error') }}
						@endcomponent
					@endif

					{!! Form::model($mata_kuliah, ['url' => '/matkul/' . $mata_kuliah->kode_mk, 'method' => 'PUT']) !!}
					<div class="form-group">
                        <label for="">Kode Mata Kuliah</label>
                        <input type="text" name="kode_mk" readonly="" value="{{ $mata_kuliah->kode_mk }}" class="form-control" required="">
						<p class="text-danger">{{ $errors->first('kode_mk') }}</p>
					</div>
                    <div class="form-group">
                        <label for="">Mata Kuliah</label>
                        <input type="text" name="nama" value="{{ $mata_kuliah->nama }}" class="form-control" required="">
						<p class="text-danger">{{ $errors->first('nama') }}</p>
					</div>
                    <div class="form-group">
                        <label for="">Dosen</label>
                        <select id="nidn" name="nidn" required class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($dosen as $row)
                            <option value="{{ $row->nidn }}" {{ $mata_kuliah->nidn == $row->nidn ? 'selected':'' }}>{{ $row->nama }}</option>
                            @endforeach
						</select>
						<p class="text-danger">{{ $errors->first('nidn') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">SKS</label>
                        <input type="text" name="sks" value="{{ $mata_kuliah->sks }}" class="form-control" required="">
						<p class="text-danger">{{ $errors->first('sks') }}</p>
					</div>
					<div class="form-group">
						<button class="btn btn-primary btn-sm">
							<i class="fa fa-edit"></i>
						</button>
					</div>
					{!! Form::close() !!}
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection