<?php

if (!isset($_GET['id']))
{
	header('Location: index.php');
	return;
}

session_start();
require('connection.php');
$id = $_GET['id'];

$query = mysqli_query($connection, "Select * From tb_lelang Where id_barang='$id'");
if (mysqli_num_rows($query) > 0)
{
	$status = 'ditutup';
	$query = "Update tb_lelang Set status='$status' Where id_barang='$id'";

	echo $query;
	if (mysqli_query($connection, $query))
	{
		header('Location: index.php');
	}
}

?>