@extends('layouts.app')

@section('judul_situs')
Tambah Kategori
@endsection

@section('isActiveKategori')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/categories')}}" class="mt-5 col-md-5">
	@csrf
	<h4>Tambah Kategori</h4>
	<div class="form-group">
		<input type="text" class="form-control" name="kategori" placeholder="kategori..">
		@error('kategori')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Tambah</button>
		</div>
		<div class="col">
			<a href="{{ url('/categories')}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection