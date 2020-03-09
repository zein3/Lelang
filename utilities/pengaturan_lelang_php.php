<?php

	require(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'connection.php');
	$query = mysqli_query($connection, "Select * From tb_barang");
	while ($data = mysqli_fetch_array($query))
	{
		$id = $data['id_barang'];
		$nama_barang = "'" . $data['nama_barang'] . "'";
		$queryCekLelang = mysqli_query($connection, "Select * From tb_lelang Where id_barang='$id'");

		$dilelang = false;
		if (mysqli_num_rows($queryCekLelang) > 0)
		{
			$datalelang = mysqli_fetch_assoc($queryCekLelang);
			if ($datalelang['status'] == 'dibuka')
			{
				$dilelang = true;
			}
		}

		$harga_rupiah = "Rp" . number_format($data['harga_awal'],2,',','.');

		echo '<div class="card col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">';
		echo '<div class="card-body">';
		echo '<h5 class="card-title">' . $data['nama_barang'] . '</h5>';
		echo '<h6 class="card-subtitle mb-2 text-muted">' . $harga_rupiah . '</h6>';
		
		if ($dilelang) { echo '<h6 class="card-subtitle mb-2 text-muted">Status: dilelang</h6>'; }
		else { echo '<h6 class="card-subtitle mb-2 text-muted">Status: tidak dilelang</h6>'; }

		echo '<p class="card-text">' . $data['deskripsi_barang'] . '</p>';

		if ($dilelang)
		{
			echo '<a class="btn btn-danger btn-block" href="tutuplelang.php?id=' . $id . '">Tutup Lelang</a>';
		}
		else
		{
			echo '<button class="btn btn-primary btn-block" onclick="bukaLelang(' . $id . ', ' . $nama_barang . ')">Buka Lelang</button>';
		}

		echo '</div>';
		echo '</div>';
	}

?>