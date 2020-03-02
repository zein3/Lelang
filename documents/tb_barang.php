<div id="laporan-barang">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Tanggal</th>
				<th>Harga Awal</th>
				<th>Deskripsi Barang</th>
			</tr>
		</thead>
		<tbody>
			<?php

			require('connection.php');
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
		</tbody>
	</table>
</div>