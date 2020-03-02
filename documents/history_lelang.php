<div id="laporan-histori">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>ID History</th>
				<th>ID Lelang</th>
				<th>ID Barang</th>
				<th>ID User</th>
				<th>Penawaran Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php

			require('connection.php');
			$query = mysqli_query($connection, "Select * From history_lelang Order By id_barang Asc");
			while ($data = mysqli_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" . $data['id_history'] . "</td>";
				echo "<td>" . $data['id_lelang'] . "</td>";
				echo "<td>" . $data['id_barang'] . "</td>";
				echo "<td>" . $data['id_user'] . "</td>";
				echo "<td>" . $data['penawaran_harga'] . "</td>";
				echo "</tr>";
			}

			?>
		</tbody>
	</table>
</div>