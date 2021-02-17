@extends('layouts.app')

@section('judul_situs')
Edit Penerbit
@endsection

@section('isActivePenerbit')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/penerbits/'.$penerbit->id)}}" class="mt-5 col-md-5">
	@csrf
	@method('PUT')
	<h4>Edit Penerbit</h4>
	<div class="form-group">
		<h5>Nama Penerbit:</h5>
		<input type="text" class="form-control" name="penerbit" placeholder="nama penerbit.." value="{{ $penerbit->nama}}">
		@error('penerbit')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="form-group mt-3">
		<h5>Deskripsi:</h5>
		<textarea type="text" class="form-control" rows="3" name="deskripsi">{{ $penerbit->deskripsi}}</textarea>
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Edit</button>
		</div>
		<div class="col">
			<a href="{{ url('/penerbits/'.$penerbit->id)}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection