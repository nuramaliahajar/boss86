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

					{!! Form::model($mahasiswa, ['url' => '/mahasiswa/' . $mahasiswa->nim, 'method' => 'PUT']) !!}
					<div class="form-group {{ $errors->has('nim') ? 'has-error':'' }}">
						<label for="">Nim</label>
                        <input type="text" 
                            value="{{ $mahasiswa->nim or old('nim') }}" 
                            name="nim" maxlength="12" 
                            class="form-control" required=""
                            readonly
                            >
						<p class="text-danger">{{ $errors->first('nim') }}</p>
					</div>
					<div class="form-group {{ $errors->has('nama') ? 'has-error':'' }}">
						<label for="">Nama Lengkap</label>
                        <input type="text" 
                            value="{{ $mahasiswa->nama or old('nama') }}" 
                            name="nama" maxlength="35" 
                            class="form-control" 
                            required="">
						<p class="text-danger">{{ $errors->first('nama') }}</p>
					</div>
					<div class="form-group {{ $errors->has('alamat') ? 'has-error':'' }}">
						<label for="">Alamat</label>
						<textarea name="alamat" id="" cols="5" rows="5" class="form-control">{{ $mahasiswa->alamat or old('alamat') }}</textarea>
						<p class="text-danger">{{ $errors->first('alamat') }}</p>
					</div>
					<div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error':'' }}">
						<label for="">Tgl Lahir</label>
                        <input type="text" value="{{ $mahasiswa->tgl_lahir->format('m/d/Y') }}" 
                            id="tgl_lahir"
                            name="tgl_lahir" 
                            class="form-control" 
                            required="">
						<p class="text-danger">{{ $errors->first('tgl_lahir') }}</p>
					</div>
					<div class="form-group {{ $errors->has('no_tlpn') ? 'has-error':'' }}">
						<label for="">No Telpon</label>
						<input type="text" value="{{ $mahasiswa->no_tlpn or old('no_tlpn') }}" name="no_tlpn" maxlength="12" class="form-control" required="">
						<p class="text-danger">{{ $errors->first('no_tlpn') }}</p>
					</div>
					<div class="form-group {{ $errors->has('k_jurusan') ? 'has-error':'' }}">
						<label for="">Jurusan</label>
						<select name="k_jurusan" id="k_jurusan" class="form-control" required="">
							<option value="">Pilih</option>
							@foreach ($jurusan as $value)
                            <option value="{{ $value->k_jurusan }}" {{ $mahasiswa->k_jurusan == $value->k_jurusan ? 'selected':'' }}>{{ $value->jurusan }}</option>
							@endforeach
						</select>
						<p class="text-danger">{{ $errors->first('k_jurusan') }}</p>
					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
						<label for="">Email</label>
						<input type="email" value="{{ $mahasiswa->email or old('email') }}" name="email" maxlength="100" class="form-control" required="">
						<p class="text-danger">{{ $errors->first('email') }}</p>
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

@section('js')
	<script>
        $('#k_jurusan').select2();
        $('#tgl_lahir').datepicker();
	</script>
@endsection