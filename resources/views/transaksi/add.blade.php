@extends('layouts.master')

@section('title')
	<title>Perkuliahan</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Perkuliahan</li>
	  	</ol>
  		<h1 class="page-title">Perkuliahan</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-12">
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
                    
                    @if (session('error'))
						@component('components.alert', ['type' => 'danger'])
							{!! session('error') !!}
						@endcomponent
					@endif

					@if ($errors->all())
						@component('components.alert', ['type' => 'danger'])
							<ul>
								@foreach ($errors->all() as $err)
								<li>{!! $err !!}</li>
								@endforeach
							</ul>
						@endcomponent
					@endif

                    {!! Form::open(['route' => 'transaksi.store']) !!}
					<div class="form-group">
                        <label for="">Jurusan</label>
                        <select name="k_jurusan" id="k_jurusan" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($jurusan as $row)
                            <option value="{{ $row->k_jurusan }}">{{ $row->jurusan }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('k_jurusan') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Dosen</label>
                        <select name="nidn" v-model="nidn" id="nidn" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($dosen as $row)
                            <option value="{{ $row->nidn }}">{{ ucfirst($row->nama) }} - {{ $row->nidn }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('nidn') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Mata Kuliah</label>
                        <select name="kode_mk" id="kode_mk" class="form-control" required>
                            <option v-for="row in matkul" :value="row.kode_mk">@{{ row.nama }}</option>
                        </select>
                        <p class="text-danger">{{ $errors->first('kode_mk') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Kelas</label>
                        <select name="kode_kls" id="kode_kls" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($kelas as $row)
                            <option value="{{ $row->kode_kls }}">{{ $row->kelas }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('kode_kls') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select name="semester_id" id="semester_id" class="form-control" required>
                            <option value="">Pilih</option>
                            @foreach ($semester as $row)
                            <option value="{{ $row->id }}">{{ $row->semester }}</option>
                            @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('semester_id') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info btn-sm">
                            <i class="fa fa-send"></i> Generate
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
        $('#nidn').select2();
        $('#kode_kls').select2();
        $('#semester_id').select2();
    </script>
    <script src="{{ asset('js/transaksi_add.js') }}"></script>
@endsection