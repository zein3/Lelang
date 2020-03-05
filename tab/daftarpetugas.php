<div class="jumbotron">
	<h4 class="display-4">Pendaftaran Petugas</h4>

	<hr>

	<form action="regispetugas.php" method="post">
		<div class="form-group">
			<label for="tb-petugas_nama">Nama Petugas</label>
			<input type="text" class="form-control" name="tb-petugas_nama" id="tb-petugas_nama" minlength="4" maxlength="25" required>
		</div>
		<div class="form-group">
			<label for="tb-petugas_username">Username</label>
			<input type="text" class="form-control" name="tb-petugas_username" id="tb-petugas_username" minlength="4" maxlength="25" required>
		</div>
		<div class="form-group">
			<label for="tb-petugas_password">Password</label>
			<input type="password" class="form-control" name="tb-petugas_password" id="tb-petugas_password" minlength="8" required>
		</div>
		<div class="form-group">
			<label for="tb-petugas_password2">Konfirmasi Password</label>
			<input type="password" class="form-control" name="tb-petugas_password2" id="tb-petugas_password2" minlength="8" required>
		</div>
		<div class="form-group">
			<label for="tb-petugas_level">Level</label>
			<select type="text" class="form-control" name="tb-petugas_level" id="tb-petugas_level" required>
				<option value="" disabled selected>Pilih Level</option>

				<?php
				require('connection.php');
				$query = mysqli_query($connection, "Select * From tb_level");
				while ($data = mysqli_fetch_array($query))
				{
					$value = $data['id_level'];
					$level = $data['level'];

					echo '<option value="' . $value . '">' . $level . '</option>';
				}
				?>

			</select>
		</div>

		<button type="submit" class="btn btn-success btn-block">Daftar</button>
	</form>
</div>