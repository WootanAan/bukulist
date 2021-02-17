@extends('layouts.app')

@section('judul_situs')
Daftar Penulis
@endsection

@section('isActivePenulis')
active
@endsection

@section('konten')
@if (session('success_message'))
    <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
@endif
<a href="{{ url('/authors/create')}}" class="btn btn-success mt-2" style="float: right"><i class="fa fa-plus"></i></a>
<table class="table table-striped mt-2">
	<thead>
		<tr>
			<th scope="col">No. </th>
			<th scope="col">Nama Penulis</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $i = 1; ?>
		@foreach($authors as $author)
		<tr>
			<td scope="row"><?php echo $i++; ?></td>
			<a href="dadaxd"><td>{{ $author->nama}}</td></a>
			<td>
				<a href="{{ url('authors/'.$author->id)}}" class="btn btn-info"><i class="fa fa-info-circle" style="font-size: 20px"></i></a>
				<form class="d-inline-block" action="/authors/{{ $author->id }}" method="POST">
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