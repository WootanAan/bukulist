@extends('layouts.app')

@section('judul_situs')
Edit Kategori
@endsection

@section('isActiveKategori')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/categories/'.$category->id)}}" class="mt-5 col-md-5">
	@csrf
	@method('PUT')
	<h4>Edit Kategori</h4>
	<div class="form-group">
		<input type="text" class="form-control" name="kategori" placeholder="kategori.." value="{{ old('kategori', $category->nama) }}">
		@error('kategori')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Edit</button>
		</div>
		<div class="col">
			<a href="{{ url('/categories')}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection