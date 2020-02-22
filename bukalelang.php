<?php

if (!isset($_GET['id']))
{
	header('Location: index.php');
	return;
}

session_start();
require('connection.php');
$id = $_GET['id'];


// Mengambil data barang
$query = mysqli_query($connection, "Select * From tb_barang Where id_barang='$id'");
$data_barang = mysqli_fetch_assoc($query);

// Mengambil data petugas
$nama = $_SESSION['name'];
$query = mysqli_query($connection, "Select * From tb_petugas Where nama_petugas='$nama'");
$data_petugas = mysqli_fetch_assoc($query);

$harga_akhir = $data_barang['harga_awal'];
$tgl_lelang = date('Y-m-d');
$id_petugas = $data_petugas['id_petugas'];
$status = 'dibuka';

$query = "Insert Into tb_lelang(id_barang, tgl_lelang, harga_akhir, id_petugas, status) 
		  Values('$id', '$tgl_lelang', '$harga_akhir', '$id_petugas', '$status')";

echo $query;
if (mysqli_query($connection, $query))
{
	header('Location: index.php');
}

?>