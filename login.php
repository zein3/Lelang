<?php

session_start();
// Memanggil koneksi
require('connection.php');

// Mengambil data dari form
$username = mysqli_real_escape_string($connection, $_POST['login-username']);
$password = $_POST['login-password'];

// Query untuk Login
$query = mysqli_query($connection, "Call LoginQuery('$username')");

if (mysqli_num_rows($query) > 0)
{
	$data = mysqli_fetch_assoc($query);
	if (password_verify($password, $data['password']))
	{
		// Hiraukan, buat testing aja
		/*echo '<pre>';
		print_r($data);
		echo '</pre>';*/
	
		// Mengatur variable sesi nama jadi nama lengkap pengguna
		$_SESSION['name'] = $data['nama_petugas'];

		// Mengatur level user berdasarkan data id level
		if ($data['level'] != null)
		{
			if ($data['level'] == 'administrator')
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

		header('Location: index.php');
	}
	else
	{
		header('Location: index.php?err=salah');
	}
}
else
{
	header('Location: index.php?err=salah');
}

?>