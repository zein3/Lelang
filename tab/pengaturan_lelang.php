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

<div class="row">
	<?php

	include 'connection.php';
	$query = mysqli_query($connection, "Select * From tb_barang");
	while ($data = mysqli_fetch_array($query))
	{
		$harga_rupiah = "Rp" . number_format($data['harga_awal'],2,',','.');

		echo '<div class="card col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title">' . $data['nama_barang'] . '</h5>';
		echo '<h6 class="card-subtitle mb-2 text-muted">' . $harga_rupiah . '</h6>';
		echo '<p class="card-text">' . $data['deskripsi_barang'] . '</p>';
		echo '<a class="btn btn-primary btn-block" href="#">Buka atau tutup lelang</a>';
		echo '</div>';
		echo '</div>';
	}

	?>
</div>