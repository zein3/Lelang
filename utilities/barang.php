<?php

require(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'connection.php');
$query = mysqli_query($connection, "Select * From tb_barang");
while ($data = mysqli_fetch_array($query))
{
	echo "<tr>";
	echo "<td>" . $data['id_barang'] . "</td>";
	echo "<td>" . $data['nama_barang'] . "</td>";
	echo "<td>" . $data['tgl'] . "</td>";
	echo "<td>" . $data['harga_awal'] . "</td>";
	echo "<td>" . $data['deskripsi_barang'] . "</td>";
	echo "</tr>";
}

?>