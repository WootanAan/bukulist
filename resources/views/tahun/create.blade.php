@extends('layouts.app')

@section('judul_situs')
Tambah Tahun Terbit
@endsection

@section('isActiveTahun')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/tahuns')}}" class="mt-5 col-md-5">
	@csrf
	<h4>Tambah Tahun Terbit</h4>
	<div class="form-group">
		<input type="text" class="form-control" name="tahun" placeholder="tahun..." value="{{ old('tahun')}}">
		@error('tahun')
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