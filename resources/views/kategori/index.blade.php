@extends('layouts.app')

@section('judul_situs')
Daftar Kategori
@endsection

@section('isActiveKategori')
active
@endsection

@section('konten')
@if (session('success_message'))
    <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
@endif
<a href="{{ url('/categories/create')}}" class="btn btn-success mt-2" style="float: right"><i class="fa fa-plus"></i></a>
<table class="table table-striped mt-2">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nama Kategori</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		@foreach($categories as $category)
		<tr>
			<td scope="row"><?php echo $i++; ?></td>
			<td>{{ $category->nama}}</td>
			<td>
				<a href="{{ url('categories/'.$category->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-edit" style="font-size: 20px"></i></a>
				<form class="d-inline-block" action="/categories/{{ $category->id }}" method="POST">
				    @csrf
				    @method('DELETE')
				    <button class="btn btn-danger"><i class="fa fa-trash" style="font-size: 20px"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection