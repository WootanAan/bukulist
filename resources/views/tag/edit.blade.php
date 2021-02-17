@extends('layouts.app')

@section('judul_situs')
Edit Tag
@endsection

@section('isActiveTag')
active
@endsection

@section('konten')
<form method="post" action="{{ url('/tags/'.$tag->id)}}" class="mt-5 col-md-5">
	@csrf
	@method('PUT')
	<h4>Edit Tag</h4>
	<div class="form-group">
		<input type="text" class="form-control" name="tag" placeholder="tag.." value="{{ old('tag', $tag->nama) }}">
		@error('tag')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
	<div class="row mt-2">
		<div class="col">
			<button type="submit" class="btn btn-success">Edit</button>
		</div>
		<div class="col">
			<a href="{{ url('/tags')}}" class="btn btn-dark" style="float: right">Batal</a>
		</div>
	</div>
</form>
@endsection