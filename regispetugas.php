<?php

session_start();
require('connection.php');

$nama_petugas = mysqli_real_escape_string($connection, $_POST['tb-petugas_nama']);
$username = mysqli_real_escape_string($connection, $_POST['tb-petugas_username']);
$password1 = mysqli_real_escape_string($connection, $_POST['tb-petugas_password']);
$password2 = mysqli_real_escape_string($connection, $_POST['tb-petugas_password2']);
$id_level = mysqli_real_escape_string($connection, $_POST['tb-petugas_level']);

if ($password1 != $password2)
{
	header('Location: index.php');
	return;
}
if ($id_level == "")
{
	header('Location: index.php');
	return;
}

$checkQuery = mysqli_query($connection, "Select * From tb_petugas Where nama_petugas='$nama_petugas' Or username='$username'");
if (mysqli_num_rows($checkQuery) > 0)
{
	header('Location: index.php?err=nameexist');
	return;
}
$checkQuery = mysqli_query($connection, "Select * From tb_masyarakat Where nama_lengkap='$nama_petugas' Or username='$username'");
if (mysqli_num_rows($checkQuery) > 0)
{
	header('Location: index.php?err=nameexist');
	return;
}

$password = $password1;

$query = "Insert Into tb_petugas (nama_petugas, username, password, id_level)
		  Values ('$nama_petugas', '$username', '$password', '$id_level')";

if (mysqli_query($connection, $query))
{
	header('Location: index.php?success=pendaftaran');
}

?>