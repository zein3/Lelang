<div id="laporan-lelang">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>ID Lelang</th>
				<th>ID Barang</th>
				<th>Tanggal Lelang</th>
				<th>Harga Akhir</th>
				<th>ID User</th>
				<th>ID Petugas</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php

			require('connection.php');
			$query = mysqli_query($connection, "Select * From tb_lelang");
			while ($data = mysqli_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" . $data['id_lelang'] . "</td>";
				echo "<td>" . $data['id_barang'] . "</td>";
				echo "<td>" . $data['tgl_lelang'] . "</td>";
				echo "<td>" . $data['harga_akhir'] . "</td>";
				echo "<td>" . $data['id_user'] . "</td>";
				echo "<td>" . $data['id_petugas'] . "</td>";
				echo "<td>" . $data['status'] . "</td>";
				echo "</tr>";
			}

			?>
		</tbody>
	</table>
</div>