<?php

if (!isset($_POST['buka-id']) || !isset($_POST['buka-tanggal']))
{
	header('Location: index.php?err=error');
	return;
}

session_start();
require('connection.php');
$id = mysqli_real_escape_string($connection, $_POST['buka-id']);
$tgl_lelang = date("Y-m-d", strtotime($_POST['buka-tanggal']));
$tgl_hari_ini = date("Y-m-d");

if ($tgl_hari_ini > $tgl_lelang)
{
	header('Location: index.php?err=tgl');
	return;
}

// Mengambil data barang
$query = mysqli_query($connection, "Select * From tb_barang Where id_barang='$id'");
$data_barang = mysqli_fetch_assoc($query);
	
// Mengambil data petugas
$nama = $_SESSION['name'];
$query = mysqli_query($connection, "Select * From tb_petugas Where nama_petugas='$nama'");
$data_petugas = mysqli_fetch_assoc($query);
	
$harga_akhir = $data_barang['harga_awal'];
$id_petugas = $data_petugas['id_petugas'];
$status = 'dibuka';

$query = mysqli_query($connection, "Select * From tb_lelang Where id_barang='$id'");
if (mysqli_num_rows($query) > 0)
{
	$query = "Update tb_lelang 
			  Set status='$status', harga_akhir='$harga_akhir', id_user=NULL, tgl_lelang='$tgl_lelang', id_petugas='$id_petugas'
			  Where id_barang='$id'";

	echo $query;
	if (mysqli_query($connection, $query))
	{
		header('Location: index.php');
	}
}
else
{	
	$query = "Insert Into tb_lelang(id_barang, tgl_lelang, harga_akhir, id_petugas, status) 
			  Values('$id', '$tgl_lelang', '$harga_akhir', '$id_petugas', '$status')";
	
	echo $query;
	if (mysqli_query($connection, $query))
	{
		header('Location: index.php');
	}
}



?>