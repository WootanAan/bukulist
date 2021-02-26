<!DOCTYPE html>
<html>
<head>
	<title>@yield('judul_situs')</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</style>

	<script>
	function goBack() {
		window.history.back();
	}
	</script>
</head>
<body>

	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ url('/')}}">BukuList</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link @yield('isActiveHome')" aria-current="page" href="{{ url('/')}}"><i class="fa fa-home" style="font-size: 20px"></i> Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActiveTerbaru')" aria-current="page" href="{{ url('/terbaru')}}">Terbaru</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActivePopuler')" aria-current="page" href="{{ url('/populer')}}">Populer</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle @yield('isActiveKategori')" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Kategori
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							@foreach($categories as $kategory)
							<a class="dropdown-item @yield('isActiveKategori'.$kategory->id)" href="{{url('/kategori/'.$kategory->id)}}">{{$kategory->nama}}</a>
							@endforeach
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActiveTahun')" aria-current="page" href="{{ url('/tahun')}}">Tahun</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActivePenulis')" aria-current="page" href="{{ url('/penulis')}}">Penulis</a>
					</li>
				</ul>
				<ul class="navbar-nav navbar-right">
					<li>
						<a href="{{url('/login')}}" class="text-light" style="text-decoration: none;">
							<i class="fa fa-sign-in" style="font-size: 20px"></i> Login</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		@yield('konten')
	</div>
</body>
</html>