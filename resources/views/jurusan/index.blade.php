@extends('layouts.master')

@section('title')
	<title>Jurusan</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Jurusan</li>
	  	</ol>
  		<h1 class="page-title">Jurusan</h1>
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
							<label for="">Kode Jurusan</label>
							<input type="hidden" class="form-control" v-model="type">
							<input type="text" maxlength="4" v-model="k_jurusan" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="">Jurusan</label>
							<input type="text" maxlength="35" v-model="jurusan" class="form-control" required="">
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
						Jurusan
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
								<td>@{{ row.k_jurusan }}</td>
								<td>@{{ row.jurusan }}</td>
								<td>
									<button class="btn btn-warning btn-sm"
										@click.prevent="edit(row.k_jurusan)"
									>
										<i class="fa fa-edit"></i>
									</button>
									<button class="btn btn-danger btn-sm"
										@click.prevent="remove(row.k_jurusan)"
										>
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						</template>
						<template v-else slot="data">
							<tr>
								<td class="text-center" colspan="4">Tidak ada data</td>
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
	<script src="{{ asset('js/jurusan.js') }}"></script>
@endsection