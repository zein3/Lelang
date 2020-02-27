<?php

session_start();
require('connection.php');

if ($_SESSION['level'] != 'masyarakat')
{
	header('Location: index.php?err=takbisatawar');
	return;
}

$harga = mysqli_real_escape_string($connection, $_POST['tawar-harga']);
$nama_user = mysqli_real_escape_string($connection, $_POST['tawar-user']);
$id_lelang = mysqli_real_escape_string($connection, $_POST['id_lelang']);
$id_barang = mysqli_real_escape_string($connection, $_POST['tawar-id_barang']);
$nama_barang = mysqli_real_escape_string($connection, $_POST['tawar-nama_barang']);

$queryUser = "Select * From tb_masyarakat Where nama_lengkap='$nama_user'";
echo $queryUser;
$data_user = mysqli_fetch_assoc(mysqli_query($connection, $queryUser));
$id_user = $data_user['id_user'];

if ($id_user == null)
{
	header('Location: index.php?err=error');
	return;
}

$query_historyLelang = "Insert Into history_lelang (id_lelang, id_barang, id_user, penawaran_harga)
						Values ('$id_lelang', '$id_barang', '$id_user', '$harga')";

echo $query_historyLelang . "</br>";
if (mysqli_query($connection, $query_historyLelang))
{
	$query_tbLelang = "Update tb_lelang Set harga_akhir='$harga', id_user='$id_user'
					   Where id_lelang='$id_lelang'";

	echo $query_tbLelang;
	if (mysqli_query($connection, $query_tbLelang))
	{
		header('Location: index.php');
	}
}

?>