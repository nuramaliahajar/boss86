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
			<div class="col-md-6">
				@component('components.panel')
                    @slot('title')
                    @endslot
					@slot('addon')
					@endslot
					
					<table class="table table-hover">
                        <tr>
                            <th>Dosen</th>
                            <td></td>
                            <td class="dosen">{{ $transaksi->dosen->nama }}</td>
                        </tr>
                        <tr>
                            <th>Mata Kuliah</th>
                            <td></td>
                            <td class="matkul">{{ $matkul->nama }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td></td>
                            <td class="kelas">{{ $transaksi->kelas->kelas }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td></td>
                            <td class="semester">{{ $transaksi->semester->semester }}</td>
                        </tr>
                    </table>
					@slot('footer')

					@endslot
				@endcomponent
            </div>
            <div class="col-md-6">
                @component('components.panel')
                    @slot('title')
                    @endslot
                    @slot('addon')
                    @endslot
                    
                    <qr-code 
                        text="{{ $transaksi->barcode }}"
                        bg-color="#3498db" 
                        error-level="M">
                    </qr-code>
                    @slot('footer')

                    @endslot
                @endcomponent
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @component('components.panel')
                    @slot('title')
                    Detail Absen
                    @endslot
                    @slot('addon')
                    @endslot
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>NIM</td>
                                <td>Nama Lengkap</td>
                                <td>Kehadiran</td>
                                <td>Tanggal</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($absensi->count() > 0)
                            @php $no = 1 @endphp
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
                                    Izin
                                    @endif
                                </td>
                                <td>{{ $row->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data</td>
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

@section('js')
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection