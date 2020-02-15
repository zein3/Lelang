<?php

session_start();

if (isset($_GET['err']))
{
	include 'ui/alert/error.php';
}

if (isset($_GET['success']))
{
	include 'ui/alert/success.php';
}

?>
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
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-1">
	<p class="navbar-brand">Lelang Online</p>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="mainNav">
		<!-- Navbar Menu/Link -->
		<ul class="nav navbar-nav nav-tabs mr-auto">
			<li class="nav-item"><a class="nav-link text-white active" id="home-tab" data-toggle="tab" href="#home">Home</a></li>

			<?php
			if (isset($_SESSION['level']))
			{
				if ($_SESSION['level'] == "masyarakat")
				{
					include 'ui/nav_menu/masyarakat.php';
				}
				else if ($_SESSION['level'] == "admin")
				{
					include 'ui/nav_menu/admin_atau_petugas.php';
				}
				else if ($_SESSION['level'] == "petugas")
				{
					include 'ui/nav_menu/petugas.php';
					include 'ui/nav_menu/admin_atau_petugas.php';
				}
			}
			?>
		</ul>

		<!-- Login and Register Button -->
		<?php 
		if (!isset($_SESSION['name']))
		{
			// Berisi tombol login dan register
			include 'ui/nav_logged_out.php';
		}
		?>

		<!-- Logout Button dan Search Form -->
		<?php
		if (isset($_SESSION['name']))
		{
			// Berisi form search dan tombol log out
			include 'ui/nav_logged_in.php';
		}
		?>
	</div>
</nav>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-3">
				<h5 class="modal-title text-white">Login</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="login.php" method="post">
				<div class="modal-body">
					<div class="form-group row">
						<label for="login-username" class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="login-username" name="login-username" required>
						</div>
					</div>
					<div class="form-group row">
						<label for="login-password" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="login-password" name="login-password" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="login-btn" class="btn btn-blue btn-lg btn-block">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="regisModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-3">
				<h5 class="modal-title text-white">Register</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="register.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="register-name">Name</label>
						<div>
							<input type="text" class="form-control" id="register-name" name="register-name" maxlength="25" required>
						</div>
					</div>
					<div class="form-group">
						<label for="register-username">Username</label>
						<div>
							<input type="text" class="form-control" id="register-username" name="register-username" maxlength="25" required>
						</div>
					</div>
					<div class="form-group">
						<label for="register-telp">Phone Number</label>
						<div>
							<input type="tel" class="form-control" id="register-telp" name="register-telp" minlength="2" maxlength="25" required>
						</div>
					</div>
					<div class="form-group">
						<label for="register-password1">Password</label>
						<div>
							<input type="password" class="form-control" id="register-password1" name="register-password1" maxlength="25" required>
						</div>
					</div>
					<div class="form-group">
						<label for="register-password2">Confirm Password</label>
						<div>
							<input type="password" class="form-control" id="register-password2" name="register-password2" maxlength="25" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="register-btn" class="btn btn-blue btn-lg btn-block">Register</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Konten Tab -->
<div class="container">
	<div class="tab-content">
		<div class="tab-pane fade show active" id="home">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vestibulum tincidunt mauris quis mattis. Nullam gravida est id risus interdum interdum. Vivamus et posuere diam, at semper velit. Suspendisse quam augue, placerat sit amet iaculis quis, porta rutrum elit. Donec tempor nisl ut eleifend iaculis. Fusce consectetur ipsum in sapien laoreet tincidunt. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum at nibh tincidunt, feugiat lectus et, congue felis. Pellentesque convallis lobortis finibus. Quisque dictum nec velit posuere rutrum.</p>
		</div>
		<div class="tab-pane fade" id="pendataan">
			<?php
			include 'tab/pendataan.php';
			?>
		</div>
		<div class="tab-pane fade" id="laporan">
			<p>Curabitur vitae dui id nisi blandit molestie. Phasellus vel enim sapien. Mauris tincidunt nunc nec magna pharetra viverra. Phasellus euismod tempus quam, eu volutpat felis ultricies eu. Nam ut tincidunt augue, vitae ultricies mauris. Nunc non ligula quis enim tincidunt faucibus. Donec aliquet fermentum sapien eget suscipit. Mauris maximus risus a sagittis sodales. In consectetur felis vel massa blandit, et vulputate erat pellentesque.</p>
		</div>
		<div class="tab-pane fade" id="pengaturan-lelang">
			<p>Tes</p>
		</div>
	</div>

	<hr>

	<footer>
		<p>&copy; Ahmad Zein Haddad</p>
	</footer>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>