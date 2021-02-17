@extends('layouts.tamu')

@section('isActiveHome')
active
@endsection

@section('judul_situs')
{{$book->nama}} Detail
@endsection

@section('konten')
<div class="mt-3 d-flex flex-wrap">
	<div><img src="{{ asset('/gambar_sampul/'.$book->gambar)}}" style="width: 300px;"></div>
	<div>
		<h4>{{$book->nama}}</h4>
		<table>
			<tr>
				<td>Penulis</td>
				<td>: {{$author->nama}}</td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>: {{$penerbit->nama}}</td>
			</tr>
			<tr>
				<td>Tahun terbit </td>
				<td valign="top">: {{$tahun->tahun}}</td>
			</tr>
			<tr>
				<td>Tebal</td>
				<td>: {{$book->tebal}} halaman</td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>: {{$category->nama}}</td>
			</tr>
			<tr>
				<td>Lemari</td>
				<td>: {{$lemary->nama}}</td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>: {{$book->jumlah_buku}}</td>
			</tr>
			<tr>
				<td valign="top">Sinopsis</td>
				<td>: 
					@if($book->sinopsis == null)
					-
					@else
					{{$book->sinopsis}}
					@endif
				</td>
			</tr>
			<tr>
				<td valign="top">Deskripsi</td>
				<td>: 
					@if($book->deskripsi == null)
					-
					@else
					{{$book->deskripsi}}
					@endif
				</td>
			</tr>
		</table>
		<a class="btn btn-dark m-2" onclick="goBack()">Kembali</a>
	</div>
</div>
@endsection