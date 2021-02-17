@extends('layouts.app')

@section('judul_situs')
Detail Penerbit
@endsection

@section('isActivePenerbit')
active
@endsection

@section('konten')
<div class="card mt-5">
	<div class="card-header">
		<h3>Detail Penerbit</h3>
	</div>
	<div class="card-body">
		@if (session('success_message'))
		    <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
		@endif
		<table>
			<tr>
				<td>Nama Penerbit </td>
				<td valign="top">: {{ $penerbit->nama}}</td>
			</tr>
			<tr>
				<td valign="top">Deskripsi </td>
				<td>: {{ $penerbit->deskripsi}}</td>
			</tr>
		</table>
		<a href="{{ url('penerbits/'.$penerbit->id.'/edit')}}" class="btn btn-warning m-2"><i class="fa fa-edit" style="font-size: 20px"></i>Edit</a>
		<form class="d-inline-block m-2" action="/penerbits/{{ $penerbit->id }}" method="POST">
		    @csrf
		    @method('DELETE')
		    <button class="btn btn-danger"><i class="fa fa-trash" style="font-size: 20px"></i>Hapus</button>
		</form>
		<a href="{{ url('/penerbits')}}" class="btn btn-dark m-2">Kembali</a>
	</div>
</div>
@endsection