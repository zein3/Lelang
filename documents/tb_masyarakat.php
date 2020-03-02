<div id="laporan-user">
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<th>ID User</th>
				<th>Nama Lengkap</th>
				<th>Username</th>
				<th>Password</th>
				<th>No. Telp</th>
			</tr>
		</thead>
		<tbody>
			<?php

			require('connection.php');
			$query = mysqli_query($connection, "Select * From tb_masyarakat");
			while ($data = mysqli_fetch_array($query))
			{
				echo "<tr>";
				echo "<td>" . $data['id_user'] . "</td>";
				echo "<td>" . $data['nama_lengkap'] . "</td>";
				echo "<td>" . $data['username'] . "</td>";
				echo "<td>" . $data['password'] . "</td>";
				echo "<td>" . $data['telp'] . "</td>";
				echo "</tr>";
			}

			?>
		</tbody>
	</table>
</div>