@extends('layouts.app')

@section('judul_situs')
Daftar Tahun Terbit
@endsection

@section('isActiveTahun')
active
@endsection

@section('konten')
@if (session('success_message'))
    <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
@endif
<a href="{{ url('/tahuns/create')}}" class="btn btn-success mt-2" style="float: right"><i class="fa fa-plus"></i></a>
<table class="table table-striped mt-2">
	<thead>
		<tr>
			<th scope="col">Tahun Terbit</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($tahuns as $tahun)
		<tr>
			<td>{{ $tahun->tahun}}</td>
			<td>
				<a href="{{ url('tahuns/'.$tahun->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-edit" style="font-size: 20px"></i></a>
				<form class="d-inline-block" action="/tahuns/{{ $tahun->id }}" method="POST">
				    @csrf
				    @method('DELETE')
				    <button class="btn btn-danger"><i class="fa fa-trash" style="font-size: 20px"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection