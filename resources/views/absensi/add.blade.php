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
					
					{!! Form::open(['route' => 'absensi.store']) !!}
					<div class="form-group">
						<qrcode-reader 
							:paused="paused"
							@decode="onDecode" 
							></qrcode-reader>
					</div>
					<div class="form-group">
						<label for="">Barcode</label>
						<input type="text" v-model="barcode" name="barcode" class="form-control">
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
    <script src="{{ asset('js/absensi.js') }}"></script>
@endsection