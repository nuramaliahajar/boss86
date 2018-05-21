@extends('layouts.master')

@section('title')
	<title>Mahasiswa</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Mahasiswa</li>
	  	</ol>
  		<h1 class="page-title">Mahasiswa</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			
			<div class="col-md-12">
				@component('components.panel')
					@slot('title')
						<a href="{{ route('mahasiswa.add') }}" class="btn btn-info btn-sm">
							<i class="fa fa-edit"></i> Tambah Data
						</a>
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
							{{ session('error') }}
						@endcomponent
					@endif

					<table class="table table-hover">
						<thead>
							<tr>
								<th>Nim</th>
								<th>Nama Lengkap</th>
								<th>Alamat</th>
								<th>Tgl Lahir</th>
								<th>No Telp</th>
								<th>Jurusan</th>
								<th>Email</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if ($mahasiswa->count() > 0)
							@foreach ($mahasiswa as $row)
							<tr>
								<td>{{ $row->nim }}</td>
								<td>{{ ucfirst($row->nama) }}</td>
								<td>{{ $row->alamat }}</td>
								<td>{{ $row->tgl_lahir->format('d-m-Y') }}</td>
								<td>{{ $row->no_tlpn }}</td>
								<td><label class="label label-default">{{ $row->jurusan->jurusan }}</label></td>
								<td>{{ $row->email }}</td>
								<td>
									{!! Form::open(['url' => '/mahasiswa/' . $row->nim, 'method' => 'DELETE']) !!}
									<a href="{{ url('/mahasiswa/' . $row->nim) }}" class="bt btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<button class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</button>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td class="text-center" colspan="8">Tidak ada data</td>
							</tr>
							@endif
						</tbody>
					</table>
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection
