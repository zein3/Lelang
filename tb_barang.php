<?php

require('connection.php');

if (isset($_POST['add']))
{
	$nama = mysqli_real_escape_string($connection, $_POST['tb-barang_nama']);
	$tgl = date("Y-m-d", strtotime($_POST['tb-barang_tgl']));
	$harga = mysqli_real_escape_string($connection, $_POST['tb-barang_harga']);
	$deskripsi = mysqli_real_escape_string($connection, $_POST['tb-barang_deskripsi']);

	$query = "Insert Into tb_barang(nama_barang, tgl, harga_awal, deskripsi_barang) Values ('$nama', '$tgl', '$harga', '$deskripsi')";

	if (mysqli_query($connection, $query))
	{
		header('Location: index.php?success=datamasuk');
	}
}
else if (isset($_POST['edit']))
{

}
else if (isset($_POST['delete']))
{

}

?>