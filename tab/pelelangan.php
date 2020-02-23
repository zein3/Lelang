<!-- Layout Card
	
		<div class="card col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
			<div class="card-body">
				<h5 class="card-title">Nama Barang</h5>
				<h6 class="card-subtitle mb-2 text-muted">Harga</h6>
				<p class="card-text">Deskripsi Barang</p>
				<a class="btn btn-primary btn-block" href="#">Buka atau tutup lelang</a>
			</div>
		</div>

-->

<div class="jumbotron">
	<div class="row">
		<h3 class="display-4">Pelelangan</h3>
	</div>
	<hr>
	<div class="row">
		<?php
		require('connection.php');
		$query = mysqli_query($connection, "Select * From tb_lelang Where status='dibuka'");

		while ($data = mysqli_fetch_array($query))
		{
			echo '<div class="card col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">';
			echo '<div class="card-body">';

			echo '</div>';
			echo '</div>';
		}

		?>
	</div>
</div>