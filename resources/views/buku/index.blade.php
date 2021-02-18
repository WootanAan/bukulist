@extends('layouts.app')

@section('isActiveBuku')
active
@endsection

@section('judul_situs')
Tambah Buku
@endsection

@section('konten')
@if (session('success_message'))
    <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
@endif
<a href="{{ url('/books/create')}}" class="btn btn-success mt-2" style="float: right"><i class="fa fa-plus"></i></a>
<table class="table table-striped mt-2">
	<thead>
		<tr>
			<th scope="col">ID</th>
			<th scope="col">Judul Buku</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($books as $book)
		<tr>
			<td scope="row">{{$book->id}}</td>
			<td>{{ $book->nama}}</td>
			<td>
				<a href="{{ url('books/'.$book->id)}}" class="btn btn-info"><i class="fa fa-info" style="font-size: 20px"></i></a>
				<form class="d-inline-block" action="/books/{{ $book->id }}" method="POST">
				    @csrf
				    @method('DELETE')
				    <button class="btn btn-danger"><i class="fa fa-trash" style="font-size: 20px"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $books->links('vendor.pagination.bootstrap-4')}}
@endsection