<div class="row">
	<div class="col">
		<form action="tb_barang.php" method="post">
			<div class="form-group">
				<label for="tb-barang_id">ID Barang</label>
				<input type="text" class="form-control-plaintext" name="tb-barang_id" id="tb-barang_id" readonly>
				<small class="form-text text-muted">ID otomatis</small>
			</div>
			<div class="form-group">
				<label for="tb-barang_nama">Nama</label>
				<input type="text" class="form-control" name="tb-barang_nama" maxlength="25" id="tb-barang_nama" required>
			</div>
			<div class="form-group">
				<label for="tb-barang_tgl">Tanggal</label>
				<input type="date" class="form-control" name="tb-barang_tgl" id="tb-barang_tgl" required>
			</div>
			<div class="form-group">
				<label for="tb-barang_harga">Harga Awal</label>
				<input type="number" class="form-control" name="tb-barang_harga" maxlength="20" id="tb-barang_harga" required>
			</div>
			<div class="form-group">
				<label for="tb-barang_deskripsi">Deskripsi</label>
				<textarea type="text" class="form-control" name="tb-barang_deskripsi" id="tb-barang_deskripsi" maxlength="100" required></textarea>
			</div>

			<div class="btn-group btn-block">
				<button name="add" class="btn btn-success">Tambah</button>
				<button name="edit" class="btn btn-primary">Ubah</button>
				<button name="delete" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
	<div class="col">
		<table class="table table-striped table-bordered table-hover" id="tb_barang">
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
</div>

<script>
var tb_barang = document.getElementById('tb_barang');

for (var i = 1; i < tb_barang.rows.length; i++)
{
	tb_barang.rows[i].onclick = function() 
	{
		document.getElementById('tb-barang_id').value = this.cells[0].innerHTML;
		document.getElementById('tb-barang_nama').value = this.cells[1].innerHTML;
		document.getElementById('tb-barang_tgl').value = this.cells[2].innerHTML;
		document.getElementById('tb-barang_harga').value = this.cells[3].innerHTML;
		document.getElementById('tb-barang_deskripsi').value = this.cells[4].innerHTML;
	}
}
</script>
