<?php

session_start();
// Memanggil koneksi
require('connection.php');

// Mengambil data dari form
$username = mysqli_real_escape_string($connection, $_POST['login-username']);
$password = mysqli_real_escape_string($connection, $_POST['login-password']);

// Query untuk Login
$query = mysqli_query($connection, "Select * From tb_masyarakat Where username='$username' And password='$password'
									Union
									Select * From tb_petugas Where username='$username' And password='$password'");

if (mysqli_num_rows($query) > 0)
{
	$data = mysqli_fetch_assoc($query);

	// Hiraukan, buat testing aja
	/*echo '<pre>';
	print_r($data);
	echo '</pre>';*/
	
	// Mengatur variable sesi nama jadi nama lengkap pengguna
	$_SESSION['name'] = $data['nama_lengkap'];

	// Mengambil data id level
	$namaPetugas = $data['username'];
	$petugasQuery = mysqli_query($connection, "Select id_level From tb_petugas Where username='$namaPetugas'");
	$dataPetugas = mysqli_fetch_assoc($petugasQuery);

	// Mengatur level user berdasarkan data id level
	if ($dataPetugas['id_level'] != null)
	{
		if ($dataPetugas['id_level'] == 1)
		{
			$_SESSION['level'] = 'admin';
		}
		else
		{
			$_SESSION['level'] = 'petugas';
		}
	}
	else
	{
		$_SESSION['level'] = 'masyarakat';
	}

	header('Location: index.php?success=masuk');
}
else
{
	header('Location: inde.php?err=salah');
}

?>