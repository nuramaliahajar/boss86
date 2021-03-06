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
					@can('akademik')
                    <a href="{{ route('transaksi.add') }}" class="btn btn-primary btn-sm">
                        Tambah Data
					</a>
					@endcan
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
                                <th>#</th>
                                <th>Jurusan</th>
								<th>Dosen</th>
								<th>Mata Kuliah</th>
                                <th>Kelas</th>
                                <th>Semester</th>
								<th></th>
								<th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
							@if ($transaksi->count() > 0)
							@php $no = 1 @endphp
                            @foreach ($transaksi as $row)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $row->jurusan->jurusan }}</td>
								<td>{{ ucfirst($row->dosen->nama) }} <sup>{{ $row->dosen->nidn }}</sup></td>
								<td>{{ $row->nama }}</td>
								<td>{{ $row->kelas->kelas }}</td>
								<td>{{ $row->semester->semester }}</td>
								<td>{{ $row->created_at->format('d-m-Y') }}</td>
								<td>
									<a href="{{ url('transaksi/' . $row->barcode) }}"
										target="_blank"
										class="btn btn-info btn-sm">
										<i class="fa fa-eye"></i>
									</a>
								</td>
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

	<!-- Modal -->
	<div class="modal fade modal-fade-in-scale-up" id="showBarcode" aria-hidden="true"
	aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-simple">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title">Show Barcode</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div id="displayBarcode"></div>
						</div>
						<div class="col-md-6">
							<table class="table table-hover">
								<tr>
									<th>Dosen</th>
									<td></td>
									<td class="dosen"></td>
								</tr>
								<tr>
									<th>Mata Kuliah</th>
									<td></td>
									<td class="matkul"></td>
								</tr>
								<tr>
									<th>Kelas</th>
									<td></td>
									<td class="kelas"></td>
								</tr>
								<tr>
									<th>Semester</th>
									<td></td>
									<td class="semester"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection