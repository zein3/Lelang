<div class="row">
	<div class="col jumbotron">
		<form action="" method="post">
			<div class="form-group">
				<label for="tb-petugas_id">ID Petugas</label>
				<input type="text" class="form-control-plaintext" name="tb-petugas_id" id="tb-petugas_id" readonly>
				<small class="form-text text-muted">ID otomatis</small>
			</div>
			<div class="form-group">
				<label for="tb-petugas_nama">Nama Petugas</label>
				<input type="text" class="form-control" name="tb-petugas_nama" id="tb-petugas_nama">
			</div>
			<div class="form-group">
				<label for="tb-petugas_username">Username</label>
				<input type="text" class="form-control" name="tb-petugas_username" id="tb-petugas_username">
			</div>
			<div class="form-group">
				<label for="tb-petugas_password">Password</label>
				<input type="text" class="form-control" name="tb-petugas_password" id="tb-petugas_password">
			</div>
			<div class="form-group">
				<label for="tb-petugas_level">Level</label>
				<input type="text" class="form-control" name="tb-petugas_level" id="tb-petugas_level">
			</div>

			<div class="btn-group btn-block">
				<button name="add" class="btn btn-success">Tambah</button>
				<button name="edit" class="btn btn-primary">Ubah</button>
				<button name="delete" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
	<div class="col">
		<table class="table table-striped table-bordered table-hover" id="tb_petugas">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Password</th>
					<th>Level</th>
				</tr>
			</thead>
			<tbody>
				<?php

				?>
			</tbody>
		</table>
	</div>
</div>