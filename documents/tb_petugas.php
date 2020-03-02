<div id="laporan-petugas">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>ID Petugas</th>
				<th>Nama Petugas</th>
				<th>Username</th>
				<th>Password</th>
				<th>ID Level</th>
			</tr>
		</thead>
		<tbody>
			<?php

			require('connection.php');
			$query = mysqli_query($connection, "Select * From tb_petugas");
			while ($data = mysqli_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" . $data['id_petugas'] . "</td>";
				echo "<td>" . $data['nama_petugas'] . "</td>";
				echo "<td>" . $data['username'] . "</td>";
				echo "<td>" . $data['password'] . "</td>";
				echo "<td>" . $data['id_level'] . "</td>";
				echo "</tr>";
			}

			?>
		</tbody>
	</table>
</div>