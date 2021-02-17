@extends('layouts.tamu')

@section('isActiveTahun')
active
@endsection

@section('judul_situs')
Tahun Terbit
@endsection

@section('konten')
<ul class="list-group mt-3 w-50">
	@foreach($tahuns as $tahun)
	<a href="{{url('/tahun/'.$tahun->id)}}" class="list-group-item text-body">{{$tahun->tahun}}</a>
	@endforeach
</ul>
@endsection