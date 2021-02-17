@extends('layouts.tamu')

@section('isActivePenulis')
active
@endsection

@section('judul_situs')
Daftar Buku by {{$author->nama}}
@endsection

@section('konten')
<div class="d-flex flex-wrap mt-3">
@foreach($books as $book)
	<a href="{{ url('/detail/'.$book->id)}}">
		<div class="m-3 bg-light p-3">
			<img src="{{ asset('/gambar_sampul/'.$book->gambar)}}" style="width: 200px;">
			<p class="text-center text-body">{{ $book->nama}}</p>
		</div>
	</a>
@endforeach
</div>
@endsection