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
                    <a href="{{ route('transaksi.add') }}" class="btn btn-primary btn-sm">
                        Tambah Data
                    </a>
					@endslot
					@slot('addon')
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

					<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Jurusan</th>
                                <th>Dosen</th>
                                <th>Kelas</th>
                                <th>Semester</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transaksi->count() > 0)
                            @foreach ($transaksi as $row)
							<tr>
								<td></td>
								<td>{{ $row->jurusan->jurusan }}</td>
								<td>{{ $row->dosen->dosen }} <sup>{{ $row->dosen->nidn }}</sup></td>
								<td>{{ $row->kelas->kelas }}</td>
								<td>{{ $row->semester->semester }}</td>
								<td>{{ $row->created_at }}</td>
							</tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                            @endif
                        </tbody>
					</table>
					<div class="pull-right">
						{!! $transaksi->links() !!}
					</div>
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection