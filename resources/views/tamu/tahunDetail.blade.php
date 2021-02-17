@extends('layouts.tamu')

@section('isActiveTahun')
active
@endsection

@section('judul_situs')
Daftar Buku Tahun {{$tahun->tahun}}
@endsection

@section('konten')
<div class="d-flex flex-wrap justify-content-around mt-3">
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