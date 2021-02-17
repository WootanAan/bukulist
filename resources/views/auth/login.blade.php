@extends('layouts.tamu')

@section('judul_situs')
Login Page
@endsection

@section('konten')
<form class="col-lg-3 col-md-5 col-sm-7 m-auto mt-5 border border-primary p-3" style="border-radius: 20px;" action="{{url('/login')}}" method="post">
	@if (session('error'))
	    <div class="alert alert-success mt-2">{{ session('error') }}</div>
	@endif
	@csrf
	<div class="form-group">
		<label for="email">Masukkan Email</label>
		<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="contoh@email.com" name="email">
	</div><br>
	<div class="form-group">
		<label for="password">Masukkan Password</label>
		<input type="password" class="form-control" id="password" placeholder="password" name="password">
	</div><br>
	<button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection