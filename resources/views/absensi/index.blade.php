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
                    <a href="{{ route('absensi.add') }}" class="btn btn-primary btn-sm">Absen Sekarang!</a>
					@endslot
					@slot('addon')
					@endslot

					@if (session('success'))
						@component('components.alert', ['type' => 'success'])
							{!! session('success') !!}
						@endcomponent
					@endif
                    <table class="table table-hover">
                        <tr>
                            <td>#</td>
                            <td>NIM</td>
                            <td>Nama Lengkap</td>
                            <th>Kehadiran</th>
                            <td>Tanggal</td>
                            <td>Actions</td>
                        </tr>
                        @if ($absensi->count() > 0)
                            @php $no = 1; @endphp
                            @foreach ($absensi as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->mahasiswa->nama }}</td>
                                <td>
                                    @if ($row->kehadiran == 1)
                                    Hadir
                                    @elseif ($row->kehadiran == 0)
                                    Absen
                                    @else
                                    Izin / Sakit
                                    @endif
                                </td>
                                <td>{{ $row->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ url('absensi/detail/' . $row->barcode) }}" 
                                        class="btn btn-primary btn-sm">
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
                    </table>
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection