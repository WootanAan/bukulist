@extends('layouts.app')

@section('judul_situs')
Tambah Lemari
@endsection

@section('isActiveLemari')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/lemaries')}}" class="mt-5 col-md-5">
	@csrf
	<h4>Tambah Lemari</h4>
	<div class="form-group">
		<input type="text" class="form-control" name="lemari" placeholder="lemari..." value="{{ old('lemari')}}">
		@error('lemari')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Tambah</button>
		</div>
		<div class="col">
			<a href="{{ url('/tahuns')}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection