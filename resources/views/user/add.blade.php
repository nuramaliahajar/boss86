@extends('layouts.master')

@section('title')
	<title>Tambah Data</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Tambah Data</li>
	  	</ol>
  		<h1 class="page-title">Tambah Data</h1>
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

					{!! Form::open(['route' => 'mahasiswa.store']) !!}
					<div class="form-group {{ $errors->has('role') ? 'has-error':'' }}">
						<label for="">Role</label>
						<select name="role" id="role" v-model="role" class="form-control">
                            <option value="">Pilih</option>
                            <option value="0">Akademik</option>
                            <option value="1">Mahasiswa</option>
                            <option value="2">Dosen</option>
                        </select>
						<p class="text-danger">{{ $errors->first('role') }}</p>
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
    <script src="{{ asset('js/user_add.js') }}"></script>
    <script>
        $('#role').select2()
    </script>
@endsection