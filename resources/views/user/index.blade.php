@extends('layouts.master')

@section('title')
	<title>Manajemen User</title>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
	<div class="page-header">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
	    	<li class="breadcrumb-item active">Manajemen User</li>
	  	</ol>
  		<h1 class="page-title">Manajemen User</h1>
	</div>
	<div class="page-content" id="dw">
		<div class="row">
			<div class="col-md-12">
				@component('components.panel')
					@slot('title')
						<a href="{{ route('user.add') }}" class="btn btn-info btn-sm">
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
                                <td>#</td>
								<td>@{{ row.name }}</td>
								<td>@{{ row.email }}</td>
								<td v-if="row.role == 0">
                                    Akademik
                                </td>
                                <td v-else-if="row.role == 1">
                                    Mahasiswa
                                </td>
                                <td v-else>
                                    Dosen
                                </td>
								<td>
									<a :href="'/user/' + row.id"
										class="btn btn-warning btn-sm">
										<i class="fa fa-edit"></i>
									</a>
									<a href="javascript.void(0)" @click.prevent="remove(row.id)" 
										class="btn btn-danger btn-sm">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						</template>
						<template v-else slot="data">
							<tr>
								<td class="text-center" colspan="5">Tidak ada data</td>
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
	<script src="{{ asset('js/user.js') }}"></script>
@endsection