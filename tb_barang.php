<?php

require('connection.php');

if (isset($_POST['add']))
{
	// Mengambil data yang diperlukan dari form
	$nama = mysqli_real_escape_string($connection, $_POST['tb-barang_nama']);
	$tgl = date("Y-m-d", strtotime($_POST['tb-barang_tgl']));
	$harga = mysqli_real_escape_string($connection, $_POST['tb-barang_harga']);
	$deskripsi = mysqli_real_escape_string($connection, $_POST['tb-barang_deskripsi']);

	// Membuat Query
	$query = "Insert Into tb_barang(nama_barang, tgl, harga_awal, deskripsi_barang) Values ('$nama', '$tgl', '$harga', '$deskripsi')";

	// Memasukkan data ke database
	if (mysqli_query($connection, $query))
	{
		// Kembali ke halaman utama
		header('Location: index.php?success=datamasuk');
	}
}
else if (isset($_POST['edit']))
{
	$id = mysqli_real_escape_string($connection, $_POST['tb-barang_id']);
	$nama = mysqli_real_escape_string($connection, $_POST['tb-barang_nama']);
	$tgl = date("Y-m-d", strtotime($_POST['tb-barang_tgl']));
	$harga = mysqli_real_escape_string($connection, $_POST['tb-barang_harga']);
	$deskripsi = mysqli_real_escape_string($connection, $_POST['tb-barang_deskripsi']);

	// Apabila ID kosong
	if ($id == "" || $id == null)
	{
		header('Location: index.php?err=harusid');
		return;
	}

	$query = "Update tb_barang
			  Set nama_barang='$nama', tgl='$tgl', harga_awal='$harga', deskripsi_barang='$deskripsi'
			  Where id_barang='$id'";

	if (mysqli_query($connection, $query))
	{
		header('Location: index.php?success=dataubah');
	}
}
else if (isset($_POST['delete']))
{
	$id = mysqli_real_escape_string($connection, $_POST['tb-barang_id']);

	// Apabila ID kosong
	if ($id == "" || $id == null)
	{
		header('Location: index.php?err=harusid');
		return;
	}

	$query = "Delete From tb_barang Where id_barang='$id'";

	if (mysqli_query($connection, $query))
	{
		header('Location: index.php?success=datahapus');
	}
}

?>