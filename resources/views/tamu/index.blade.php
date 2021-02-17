@extends('layouts.tamu')

@section('isActiveHome')
active
@endsection

@section('judul_situs')
Home Page
@endsection

@section('konten')
<form method="post" action="/cari">
	@csrf
	<div class="form-group  w-75" style="margin: auto;">
		@if (session('error_message'))
		    <div class="alert alert-success mt-2">{{ session('error_message') }}</div>
		@endif
		<div class="input-group mt-5">
			<input type="text" class="form-control" aria-describedby="cari" name="cari" placeholder="cari.." style="border-top-left-radius: 15px; border-bottom-left-radius: 15px">
			<div class="input-group-append">
				<button class="btn btn-primary" type="submit" id="cari" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px"><i class="fa fa-search"></i></button>
			</div>
		</div>
		@error('cari')
			<div class="text-danger">{{ $message }}</div>
		@enderror
	</div>
</form>
@endsection