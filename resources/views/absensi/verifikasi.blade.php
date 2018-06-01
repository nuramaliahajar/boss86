@extends('layouts.master')

@section('title')
	<title>Request Absensi</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Request Absensi</li>
	  	</ol>
  		<h1 class="page-title">Request Absensi</h1>
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

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Perkuliahan</td>
                                <td>Mahasiswa</td>
                                <td>Status</td>
                                <td>Tanggal</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($absen->count() > 0)
                            @foreach ($absen as $row)
                            <tr>
                                <td></td>
                                <td>{{ $row->transaksi->kode_mk }}</td>
                                <td>{{ $row->mahasiswa->nama }}</td>
                                <td>
                                    @if ($row->kehadiran == 2)
                                    Izin
                                    @elseif ($row->kehadiran == 3)
                                    Sakit
                                    @endif
                                </td>
                                <td>{{ $row->tanggal->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    {!! Form::open(['url' => 'absensi/verifikasi/'. $row->id, 'method' => 'DELETE']) !!}
                                    <input type="hidden" name="alasan" value="1">
                                    <button class="btn btn-primary btn-sm">Terima</button>
                                    {!! Form::close() !!}
                                    <hr>
                                    {!! Form::open(['url' => 'absensi/verifikasi/'. $row->id, 'method' => 'DELETE']) !!}
                                    <input type="hidden" name="alasan" value="0">
                                    <button class="btn btn-danger btn-sm">Tolak</button>
                                    {!! Form::close() !!}
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
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
	</div>
@endsection