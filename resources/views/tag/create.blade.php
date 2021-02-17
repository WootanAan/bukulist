@extends('layouts.app')

@section('judul_situs')
Tambah Tag
@endsection

@section('isActiveTag')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/tags')}}" class="mt-5 col-md-5">
	@csrf
	<h4>Tambah Tag</h4>
	<div class="form-group">
		<input type="text" class="form-control" name="tag" placeholder="tag..">
		@error('tag')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Tambah</button>
		</div>
		<div class="col">
			<a href="{{ url('/tags')}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection