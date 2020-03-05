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
</div>

<div class="modal fade" id="bukaLelangModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white">Buka Lelang</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="bukalelang.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="buka-id">ID Barang</label>
						<input type="text" class="form-control-plaintext" id="buka-id" name="buka-id" readonly>
					</div>
					<div class="form-group">
						<label for="buka-nama_barang">Nama Barang</label>
						<input type="text" class="form-control-plaintext" id="buka-nama_barang" name="buka-nama_barang" readonly>
					</div>
					<div class="form-group">
						<label for="buka-tanggal">Tanggal Akhir Lelang</label>
						<input type="date" class="form-control" name="buka-tanggal" id="buka-tanggal" required>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-block btn-lg">Buka Lelang</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
function bukaLelang(id, nama_barang)
{
	$("#buka-id").val(id);
	$("#buka-nama_barang").val(nama_barang);
	$("#bukaLelangModal").modal('show');
}
</script>