<?php
	require('connection.php');
	$id_lelang = $_POST['post_id_lelang'];
	$query = mysqli_query($connection, "Select * From history_lelang Where id_lelang='$id_lelang' Order By penawaran_harga Desc");
	while ($data = mysqli_fetch_array($query))
	{
		$id_barang = $data['id_barang'];
		$id_user = $data['id_user'];

		$queryBarang = mysqli_query($connection, "Select * From tb_barang Where id_barang='$id_barang'");
		$queryUser = mysqli_query($connection, "Select * From tb_masyarakat Where id_user='$id_user'");

		$data_barang = mysqli_fetch_assoc($queryBarang);
		$data_user = mysqli_fetch_assoc($queryUser);

		$harga_rupiah = "Rp" . number_format($data['penawaran_harga'],2,',','.');

		echo "<tr>";
		//echo "<td>" . $data_barang['nama_barang'] . "</td>";
		echo "<td>" . $data_user['nama_lengkap'] . "</td>";
		echo "<td>" . $harga_rupiah . "</td>";
		echo "</tr>";
	}
?>