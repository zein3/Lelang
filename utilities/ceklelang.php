<?php

require(dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'connection.php');

$queryLelang = "Select * From tb_lelang Where status='dibuka'";
while ($data = mysqli_fetch_array(mysqli_query($connection, $queryLelang)))
{
	$current_date = date('Y-m-d');
	$date = date('Y-m-d', strtotime($data['tgl_lelang']));

	if ($date < $current_date)
	{
		$id = $data['id_barang'];
		$status = 'ditutup';
		$query = "Update tb_lelang Set status='$status' Where id_barang='$id'";

		if (mysqli_query($connection, $query))
		{
			$query = "Delete From history_lelang Where id_barang='$id'";
			if (mysqli_query($connection, $query))
			{
				//
			}
		}
	}
}

?>