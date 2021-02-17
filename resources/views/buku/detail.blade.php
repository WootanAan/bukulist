@extends('layouts.app')

@section('isActiveBuku')
active
@endsection

@section('judul_situs')
Tambah Buku
@endsection

@section('konten')
<div class="card mt-3">
	<div class="card-header">
		{{ $book->nama}}
	</div>
	<div class="card-body">
		<img src="{{ asset('/gambar_sampul/'.$book->gambar)}}" style="height: 400px; margin: 3px;">
		<div>
			<h4>{{ $book->nama}}</h4>
			<table>
				<tr>
					<td valign="top">Penulis</td>
					<td valign="top">: {{$book->author->nama}}</td>
				</tr>
				<tr>
					<td valign="top">Penerbit</td>
					<td valign="top">: {{$book->penerbit->nama}}</td>
				</tr>
				<tr>
					<td valign="top">Tahun Terbit</td>
					<td valign="top">: {{$book->tahun->tahun}}</td>
				</tr>
				<tr>
					<td valign="top">Tebal</td>
					<td valign="top">: {{$book->tebal}} halaman</td>
				</tr>
				<tr>
					<td valign="top">Sinopsis</td>
					<td valign="top">: {{$book->sinopsis}}</td>
				</tr>
				<tr>
					<td valign="top">Deskripsi</td>
					<td valign="top">: {{$book->deskripsi}}</td>
				</tr>
				<tr>
					<td valign="top">Kategori</td>
					<td valign="top">: {{$book->category->nama}}</td>
				</tr>
				<tr>
					<td valign="top">Jumlah buku</td>
					<td valign="top">: {{$book->jumlah_buku}}</td>
				</tr>
			</table>
			<a href="{{ url('books/'.$book->id.'/edit')}}" class="btn btn-warning m-2"><i class="fa fa-edit" style="font-size: 20px"></i>Edit</a>
			<form class="d-inline-block m-2" action="/books/{{ $book->id }}" method="POST">
			    @csrf
			    @method('DELETE')
			    <button class="btn btn-danger"><i class="fa fa-trash" style="font-size: 20px"></i>Hapus</button>
			</form>
			<a href="{{ url('/books')}}" class="btn btn-dark m-2">Kembali</a>
		</div>
	</div>
</div>
@endsection
