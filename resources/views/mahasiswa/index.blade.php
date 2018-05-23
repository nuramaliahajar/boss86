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

					<data-table :columns="columns" @query="searchingData">
						<template v-if="data.data && data.data.length > 0" slot="data">
							<tr v-for="row in data.data" :key="row.nim">
								<td>@{{ row.nim }}</td>
								<td>@{{ row.nama }}</td>
								<td>@{{ row.no_tlpn }}</td>
								<td>@{{ row.jurusan.jurusan }}</td>
								<td>@{{ row.email }}</td>
								<td>
									<a href="#"
										@click="showModal(row.nim)"
										class="btn btn-info btn-sm">
										<i class="fa fa-eye"></i>
									</a>
									<a :href="'/mahasiswa/' + row.nim"
										class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="javascript.void(0)" @click.prevent="remove(row.nim)" 
										class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						</template>
						<template v-else slot="data">
							<tr>
								<td class="text-center" colspan="8">Tidak ada data</td>
							</tr>
						</template>
					</data-table>
					<div class="pull-right">
						<pagination :pagination="data" :offset="4" @paginate="getData" />
					</div>
					@slot('footer')

					@endslot
				@endcomponent
			</div>
		</div>
		<modal-tab
			v-show="isModalVisible"
			@close="closeModal"
			>
			<template slot="title">Detail Mahasiswa</template>
			<template slot="menu">
				<li class="nav-item" role="presentation">
					<a class="nav-link" data-toggle="tab" href="#contact"
					aria-controls="contact" role="tab">Contact</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" data-toggle="tab" href="#semester"
					aria-controls="semester" role="tab">Semester</a>
				</li>
			</template>
			<template slot="content">
				<div class="tab-content" v-if="person">
					<div class="tab-pane active" id="home" role="tabpanel">
						<table class="table table-hover">
							<tr>
								<th>NIM</th>
								<td>:</td>
								<td>@{{ person.nim }}</td>
							</tr>
							<tr>
								<th>Nama Lengkap</th>
								<td>:</td>
								<td>@{{ person.nama }}</td>
							</tr>
							<tr>
								<th>Jurusan</th>
								<td>:</td>
								<td>@{{ person.jurusan.jurusan }}</td>
							</tr>
							<tr>
								<th>Tgl Lahir</th>
								<td>:</td>
								<td>@{{ person.tgl_lahir }}</td>
							</tr>
						</table>
					</div>

					<div class="tab-pane" id="contact" role="tabpanel">
						<table class="table table-hover">
							<tr>
								<th>Alamat</th>
								<td>:</td>
								<td>@{{ person.alamat }}</td>
							</tr>
							<tr>
								<th>No Telepon</th>
								<td>:</td>
								<td>@{{ person.no_tlpn }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>:</td>
								<td>@{{ person.email }}</td>
							</tr>
						</table>
					</div>
					<div class="tab-pane" id="semester" role="tabpanel">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Semester</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(row, index) in person.mahasiswa_semester">
									<td>@{{ index + 1 }}</td>
									<td>@{{ row.semester }}</td>
									<td v-if="row.pivot.status">
										Aktif
									</td>
									<td v-else>
										-
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</template>
		</modal-tab>
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/mahasiswa.js') }}"></script>
@endsection