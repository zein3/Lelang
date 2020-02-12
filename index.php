<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width = device-width, initial-scale = 1">
	<title>L-OL | Lelang Online</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<!-- NavBar -->
<div class="container-fluid">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<p class="navbar-brand">Lelang Online</p>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="mainNav">
			<ul class="nav navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Pendataan Barang</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Penawaran</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Buka dan Tutup Lelang</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Generate Laporan</a></li>
			</ul>
			<div class="btn-group my-2 my-lg-0">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
					Login
				</button>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#regisModal">
					Register
				</button>
			</div>
		</div>
	</nav>
</div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet neque condimentum, tempor orci id, tempor nibh. Pellentesque id dolor sit amet odio aliquet semper. Donec leo tellus, convallis eget eros at, fermentum rutrum arcu. Integer tempor tellus purus, nec consequat eros dictum sed. Sed vitae dui vitae felis convallis tincidunt. Proin tellus dui, eleifend eget enim vel, tempor egestas lectus. Etiam leo purus, vehicula et risus eget, venenatis tristique dui. Pellentesque in lacinia mi. Curabitur feugiat arcu neque. In non lacus diam. Cras in viverra ligula. Donec id arcu ultricies, euismod erat sit amet, ullamcorper eros. Phasellus nec ultricies massa, et elementum eros.</p>
				<button type="submit" class="btn btn-primary">Login</button>
			</div>
		</div>
	</div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="regisModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title">Register</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Budi Gay</p>
				<button type="submit" class="btn btn-success">Register</button>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>