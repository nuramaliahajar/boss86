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

                    <img src="data:image/png;base64, {{ $code }}" />
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection
