<?php

session_start();
// Memanggil koneksi
require('connection.php');

// Mengambil data dari form
$username = mysqli_real_escape_string($connection, $_POST['login-username']);
$password = mysqli_real_escape_string($connection, $_POST['login-password']);

// Enkripsi Password
$password = md5($password, "asdfasdf");

// Query untuk Login
$query = mysqli_query($connection, "Select * From tb_masyarakat Where username='$username' And password='$password'"); // Add Union Later

if (mysqli_num_rows($query) > 0)
{
	$data = mysqli_fetch_assoc($query);
	$_SESSION['level'] = 'masyarakat';
	$_SESSION['name'] = $data['nama_lengkap'];
	header('Location: index.php?success=masuk');
}
else
{
	header('Location: inde.php?err=salah');
}

?>