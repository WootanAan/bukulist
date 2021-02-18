@extends('layouts.tamu')

@section('isActiveTerbaru')
active
@endsection

@section('judul_situs')
Buku Terbaru
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
{{ $books->links('vendor.pagination.bootstrap-4')}}
@endsection