@extends('layouts.master')

@section('title')
	<title>Mata Kuliah</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Mata Kuliah</li>
	  	</ol>
  		<h1 class="page-title">Mata Kuliah</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-4">
				@component('components.panel')
					@slot('title')
						Tambah Data
					@endslot
					@slot('addon')
					@endslot

					<form action="#" @submit.prevent="sendData">
						<div class="form-group">
							<label for="">Kode Mata Kuliah</label>
							<input type="text" v-model="kode_mk" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="">Mata Kuliah</label>
							<input type="text" v-model="nama" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label for="">Dosen</label>
                            <select id="nidn" v-model="nidn" required class="form-control">
                                <option v-for="row in dosen" :value="row.nidn" :key="row.nidn">@{{ row.nama }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">SKS</label>
                            <input type="text" v-model="sks" class="form-control" required="">
                        </div>

						<div class="form-group">
							<button class="btn btn-primary btn-sm"
								:disabled="button"
								>
								@{{ button ? 'Loading...':'Simpan' }}
							</button>
						</div>
					</form>

					@slot('footer')
					@endslot
				@endcomponent
			</div>
			<div class="col-md-8">
				@component('components.panel')
					@slot('title')
						Mata Kuliah
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

					<data-table :columns="columns" @query="searchingData">
						<template v-if="data.data && data.data.length > 0" slot="data">
							<tr v-for="(row, index) in data.data">
								<td>@{{ index + 1 }}</td>
								<td>@{{ row.kode_mk }}</td>
                                <td>@{{ row.nama }}</td>
                                <td>@{{ row.dosen.nama }}</td>
                                <td>@{{ row.sks }}</td>
								<td>
									<button class="btn btn-warning btn-sm"
										@click.prevent="edit(row.kode_mk)"
									>
										<i class="fa fa-edit"></i>
									</button>
									<button class="btn btn-danger btn-sm"
										@click.prevent="remove(row.kode_mk)"
										>
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						</template>
						<template v-else slot="data">
							<tr>
								<td class="text-center" colspan="6">Tidak ada data</td>
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
	</div>
@endsection

@section('js')
	<script src="{{ asset('js/matkul.js') }}"></script>
@endsection