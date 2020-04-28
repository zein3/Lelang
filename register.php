<?php

session_start();
//Memanggil Database
require('connection.php');

//Mengambil data dari form register
$nama_lengkap = mysqli_real_escape_string($connection, $_POST['register-name']);
$username = mysqli_real_escape_string($connection, $_POST['register-username']);
$telp = mysqli_real_escape_string($connection, $_POST['register-telp']);
$password1 = $_POST['register-password1'];
$password2 = $_POST['register-password2'];

//Mengecek apakah bagian konfirmasi passwordnya sama
if ($password1 != $password2)
{
	header('Location: index.php?err=passconfirm');
	return;
}

//Mengecek apakah nama lengkap atau username sudah dipakai user lain
$checkQuery = "Select * From tb_masyarakat Where nama_lengkap='$nama_lengkap' Or username='$username'";
$check = mysqli_query($connection, $checkQuery);
if (mysqli_num_rows($check) > 0)
{
	header('Location: index.php?err=nameexist');
	return;
}

//Mengecek apakah nama lengkap atau username sudah dipakai petugas
$checkQuery = "Select * From tb_petugas Where nama_petugas='$nama_lengkap' Or username='$username'";
$check = mysqli_query($connection, $checkQuery);
if (mysqli_num_rows($check) > 0)
{
	header('Location: index.php?err=nameexist');
	return;
}

$password = password_hash($password1, PASSWORD_DEFAULT);

//Query untuk memasukkan data user ke Database
$query = "Insert Into tb_masyarakat(nama_lengkap, username, password, telp) Values('$nama_lengkap', '$username', '$password', '$telp')";
if (mysqli_query($connection, $query))
{
	header('Location: index.php?success=pendaftaran');
}

?>