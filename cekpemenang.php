<?php

session_start();
if (!isset($_SESSION['name']))
{
	return;
}
if ($_SESSION['level'] != 'masyarakat')
{
	return;
}

require('connection.php');

$nama_lengkap = $_SESSION['name'];
$queryUser = mysqli_query($connection, "Select * From tb_masyarakat Where nama_lengkap='$nama_lengkap'");

$dataUser = mysqli_fetch_assoc($queryUser);

$id_user = $dataUser['id_user'];
$status = 'ditutup';

echo '<div class="jumbotron">';
echo '<div class="row">';
echo '<h3 class="display-4">Barang yang anda menangkan</h3>';
echo '</div>';
echo '<hr>';

$queryLelang = mysqli_query($connection, "Select * From tb_lelang Where id_user='$id_user' And status='$status'");
if (mysqli_num_rows($queryLelang) > 0)
{
	echo '<div class="row">'; // div row 2
	
	while ($dataLelang = mysqli_fetch_array($queryLelang))
	{
		$id_barang = $dataLelang['id_barang'];
		$queryBarang = mysqli_query($connection, "Select * From tb_barang Where id_barang='$id_barang'");
		$data_barang = mysqli_fetch_assoc($queryBarang);

		echo '<div class="card col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">';
		echo '<div class="card-body">';

		echo '<h5 class="card-title">' . $data_barang['nama_barang'] . '</h5>';

		$penawaran = "Rp" . number_format($dataLelang['harga_akhir'],2,',','.');
		echo '<h6 class="card-subtitle mb-2 text-muted">Penawaran anda: ' . $penawaran . '</h6>';

		echo '</div>';
		echo '</div>';
	}

	echo '</div>'; // div row 2
	echo '</div>'; // div jumbotron
}
else
{
	echo '<h5>Anda belum memenangkan barang apapun</h5>';
}

?>