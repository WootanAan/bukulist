@extends('layouts.app')

@section('judul_situs')
Tambah Penerbit
@endsection

@section('isActivePenerbit')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/penerbits')}}" class="mt-5 col-md-5">
	@csrf
	<h4>Tambah Penerbit</h4>
	<div class="form-group">
		<h5>Nama Penerbit:</h5>
		<input type="text" class="form-control" name="penerbit" placeholder="nama penerbit..">
		@error('penerbit')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="form-group mt-3">
		<h5>Deskripsi:</h5>
		<textarea type="text" class="form-control" rows="3" name="deskripsi"></textarea>
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Tambah</button>
		</div>
		<div class="col">
			<a href="{{ url('/penerbits')}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection