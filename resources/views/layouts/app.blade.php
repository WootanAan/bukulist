<!DOCTYPE html>
<html>
<head>
	<title>@yield('judul_situs')</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- css tambahan -->
	<style type="text/css">
		.tag {
			border: 1px solid #686868;
			border-radius: 3px;
		}
	</style>
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
						<a class="nav-link @yield('isActiveBuku')" aria-current="page" href="{{ url('/books')}}">Buku</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActiveKategori')" aria-current="page" href="{{ url('/categories')}}">Kategori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActivePenulis')" aria-current="page" href="{{ url('/authors')}}">Penulis</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActivePenerbit')" aria-current="page" href="{{ url('/penerbits')}}">Penerbit</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActiveTahun')" aria-current="page" href="{{ url('/tahuns')}}">Tahun Terbit</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActiveLemari')" aria-current="page" href="{{ url('/lemaries')}}">Lemari</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @yield('isActiveTag')" aria-current="page" href="{{ url('/tags')}}">Tag</a>
					</li>
				</ul>
				<ul class="navbar-nav navbar-right">
					<li>
						<form method="post" action="/logout">
							@csrf
							<a href="{{url('/login')}}" class="text-light" style="text-decoration: none;">Logout</a>
						</form>
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