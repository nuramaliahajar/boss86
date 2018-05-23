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

					{!! Form::open(['url' => '/user/' . $user->id, 'method' => 'PUT']) !!}
					<div class="form-group {{ $errors->has('email') ? 'has-error':'' }}">
                        <label for="">Email</label>
                        <input type="email" value="{{ $user->email }}" readonly name="email" class="form-control" required>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>
                    
                    <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required>
                        <p class="text-danger">{{ $errors->first('password') }}</p>
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