@extends('layouts.master')

@section('title')
	<title>Laporan</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Laporan</li>
	  	</ol>
  		<h1 class="page-title">Laporan</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-8">
				@component('components.panel')
                    @slot('title')
                    @endslot
					@slot('addon')
					@endslot
					
					{!! Form::open(['route' => 'laporan.get']) !!}
					<div class="form-group">
						<label for="">Semester</label>
						<select name="semester_id" id="semester_id" required class="form-control">
                            <option value="">Pilih</option>
                            @foreach ($semester as $row)
                            <option value="{{ $row->id }}">{{ $row->semester }}</option>
                            @endforeach
                        </select>
						<p class="text-danger">{{ $errors->first('semester_id') }}</p>
					</div>
					<div class="form-group">
						<label for="">Jurusan</label>
						<select name="k_jurusan" id="k_jurusan" required class="form-control">
							<option value="">Pilih</option>
							@foreach ($jurusan as $row)
							<option value="{{ $row->k_jurusan }}">{{ $row->jurusan }}</option>
							@endforeach
						</select>
						<p class="text-danger">{{ $errors->first('k_jurusan') }}</p>
					</div>
					<div class="form-group">
						<label for="">Dosen</label>
						<select name="nidn" id="nidn" required class="form-control">
							<option value="">Pilih</option>
							@foreach ($dosen as $row)
							<option value="{{ $row->nidn }}">{{ $row->nama }} - {{ $row->nidn }}</option>
							@endforeach
						</select>
						<p class="text-danger">{{ $errors->first('nidn') }}</p>
					</div>
					<div class="form-group">
						<label for="">Kelas</label>
						<select name="kode_kls" id="kode_kls" required class="form-control">
							<option value="">Pilih</option>
							@foreach ($kelas as $row)
							<option value="{{ $row->kode_kls }}">{{ $row->kelas }}</option>
							@endforeach
						</select>
						<p class="text-danger">{{ $errors->first('kode_kls') }}</p>
					</div>
					<div class="form-group">
						<label for="">Mata Kuliah</label>
						<select name="kode_mk" id="kode_mk" required class="form-control">
							<option value="">Pilih</option>
							@foreach ($matkul as $row)
							<option value="{{ $row->kode_mk }}">{{ $row->nama }}</option>
							@endforeach
						</select>
						<p class="text-danger">{{ $errors->first('kode_mk') }}</p>
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

@section('js')
	<script>
		$('#semester_id').select2();
		$('#k_jurusan').select2();
		$('#nidn').select2();
		$('#kode_kls').select2();
		$('#kode_mk').select2();
	</script>
@endsection