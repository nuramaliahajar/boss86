@extends('layouts.master')

@section('title')
	<title>Pengaturan</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Pengaturan</li>
	  	</ol>
  		<h1 class="page-title">Pengaturan</h1>
	</div>
	<div class="page-content">
		{!! Form::open(['route' => 'setting.save']) !!}
		@component('components.panel')
			@slot('title')
				Pengaturan
			@endslot
			@slot('addon')
				<div class="panel-actions">
			        <button class="btn btn-primary btn-md">
						<i class="fa fa-send"></i> Simpan
					</button>
	      		</div>
			@endslot

			@if (session('success'))
				@component('components.alert', ['type' => 'success'])
					{!! session('success') !!}
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

			<table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Uraian</th>
						<th>Nilai</th>
						<th>Catatan</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Uraian</th>
						<th>Nilai</th>
						<th>Catatan</th>
					</tr>
				</tfoot>
				<tbody>
					@if ($setting->count() > 0)
						@php 
						$no = 1;
						@endphp
					@foreach ($setting as $set)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $set->ket }}</td>
						<td>
							<div class="form-group"> 
							{!! Form::text('nilai' . $set->kode, $set->nilai, ['class' => 'form-control']) !!}
							</div>
						</td>
						<td>{{ $set->catatan }}</td>
					</tr>
					@endforeach
					@endif
				</tbody>
			</table>
			@slot('footer')

			@endslot
		@endcomponent
	  	{!! Form::close() !!}
	</div>
@endsection