@extends('layouts.tamu')

@section('isActivePenulis')
active
@endsection

@section('judul_situs')
Daftar Penulis
@endsection

@section('konten')
<ul class="list-group mt-3 w-50">
	@foreach($authors as $author)
	<a href="{{url('/penulis/'.$author->id)}}" class="list-group-item text-body">{{$author->nama}}</a>
	@endforeach
</ul>
{{ $authors->links('vendor.pagination.bootstrap-4')}}
@endsection