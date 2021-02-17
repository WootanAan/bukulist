@extends('layouts.app')

@section('isActiveBuku')
active
@endsection

@section('judul_situs')
Tambah Buku
@endsection

@section('konten')
<form class="mt-3" method="post" action="{{ url('/books/'.$book->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<table class="table table-striped mt-2">
		<tr>
			<td  valign="top">Judul Buku</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control" name="buku" placeholder="judul buku.." value="{{ old('buku', $book->nama)}}">
					@error('buku')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">Penulis</td>
			<td>
				<div>
					<select class="form-control" name="author_id">
						@foreach($authors as $author)
						@if( old('author_id', $book->author_id == $author->id))
						<option selected value="{{ $author->id}}">{{ $author->nama}}</option>
						@else
						<option value="{{ $author->id}}">{{ $author->nama}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</td>
			<td><a href="{{ url('/authors/create')}}" class="btn btn-success mt-2 m-1" target="_blank"><i class="fa fa-plus"></i></a></td>
		</tr>
		<tr>
			<td valign="top">Penerbit</td>
			<td>
				<div>
					<select class="form-control" name="penerbit_id">
						@foreach($penerbits as $penerbit)
						@if( old('penerbit_id', $book->penerbit_id == $penerbit->id))
						<option selected value="{{ $penerbit->id}}">{{ $penerbit->nama}}</option>
						@else
						<option value="{{ $penerbit->id}}">{{ $penerbit->nama}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</td>
			<td><a href="{{ url('/penerbits/create')}}" class="btn btn-success mt-2 m-1" target="_blank"><i class="fa fa-plus"></i></a></td>
		</tr>
		<tr>
			<td valign="top">Tahun Terbit</td>
			<td>
				<div>
					<select class="form-control" name="tahun_id">
						@foreach($tahuns as $tahun)
						@if( old('tahun_id', $book->tahun_id == $tahun->id))
						<option selected value="{{ $tahun->id}}">{{ $tahun->tahun}}</option>
						@else
						<option value="{{ $tahun->id}}">{{ $tahun->tahun}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</td>
			<td><a href="{{ url('/tahuns/create')}}" class="btn btn-success mt-2 m-1" target="_blank"><i class="fa fa-plus"></i></a></td>
		</tr>
		<tr>
			<td valign="top">Jumlah Halaman</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control" name="tebal" placeholder="jumlah halaman.." value="{{ old('tebal', $book->tebal)}}">
					@error('tebal')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">Sinopsis</td>
			<td>
				<div class="form-group">
					<textarea class="form-control" name="sinopsis" rows="3">{{$book->sinopsis}}</textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">Deskripsi</td>
			<td>
				<div class="form-group">
					<textarea class="form-control" name="deskripsi" rows="3">{{$book->deskripsi}}</textarea>
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">Kategori</td>
			<td>
				<div>
					<select class="form-control" name="category_id">
						@foreach($categories as $category)
						@if( old('category_id', $book->category_id == $category->id))
						<option selected value="{{ $category->id}}">{{ $category->nama}}</option>
						@else
						<option value="{{ $category->id}}">{{ $category->nama}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</td>
			<td><a href="{{ url('/categories/create')}}" class="btn btn-success mt-2 m-1" target="_blank"><i class="fa fa-plus"></i></a></td>
		</tr>
		<tr>
			<td valign="top">Lemari</td>
			<td>
				<div>
					<select class="form-control" name="lemary_id">
						@foreach($lemaries as $lemary)
						@if( old('lemary_id', $book->lemary_id == $lemary->id))
						<option selected value="{{ $lemary->id}}">{{ $lemary->nama}}</option>
						@else
						<option value="{{ $lemary->id}}">{{ $lemary->nama}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</td>
			<td><a href="{{ url('/lemaries/create')}}" class="btn btn-success mt-2 m-1" target="_blank"><i class="fa fa-plus"></i></a></td>
		</tr>
		<tr>
			<td  valign="top">Jumlah Buku</td>
			<td>
				<div class="form-group">
					<input type="text" class="form-control" name="jumlah_buku" placeholder="jumlah buku.." value="{{ old('jumlah_buku', $book->jumlah_buku)}}">
					@error('jumlah_buku')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</td>
		</tr>
		<tr>
			<td valign="top">Gambar Sampul</td>
			<td>
				<div class="form-group">
					<input type="file" class="form-control-file" name="gambar" value="{{$book->gambar}}">
					@error('gambar')
					    <div class="text-danger">{{ $message }}</div>
					@enderror
				</div>
			</td>
		</tr>
	</table>
	<div class="row mt-2"  style="float: right">
		<div class="col">
			<button type="submit" class="btn btn-success">Edit</button>
		</div>
		<div class="col">
			<a href="{{ url('/books')}}" class="btn btn-dark">Batal</a>
		</div>
	</div>
</form>
@endsection