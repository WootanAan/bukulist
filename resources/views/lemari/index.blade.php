@extends('layouts.app')

@section('judul_situs')
Daftar Lemari
@endsection

@section('isActiveLemari')
active
@endsection

@section('konten')
@if (session('success_message'))
    <div class="alert alert-success mt-2">{{ session('success_message') }}</div>
@endif
<a href="{{ url('/lemaries/create')}}" class="btn btn-success mt-2" style="float: right"><i class="fa fa-plus"></i></a>
<table class="table table-striped mt-2">
	<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Lemari</th>
			<th scope="col">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		@foreach($lemaries as $lemari)
		<tr>
			<td><?php echo $no++; ?></td>
			<td>{{ $lemari->nama}}</td>
			<td>
				<a href="{{ url('lemaries/'.$lemari->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-edit" style="font-size: 20px"></i></a>
				<form class="d-inline-block" action="/lemaries/{{ $lemari->id }}" method="POST">
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