@extends('layouts.tamu')

@section('isActiveKategori'.$category->id)
active
@endsection

@section('isActiveKategori')
active
@endsection

@section('judul_situs')
Hasil pencarian
@endsection

@section('konten')
<div class="d-flex flex-wrap mt-3">
@foreach($books as $book)
	<a href="{{ url('/detail/'.$book->id)}}">
		<div class="m-3 bg-light p-3" style="height: 355px;">
			<img src="{{ asset('/gambar_sampul/'.$book->gambar)}}" style="width: 200px;">
			<p class="text-center text-body">{{ $book->nama}}</p>
		</div>
	</a>
@endforeach
</div>
@endsection