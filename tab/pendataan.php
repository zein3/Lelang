<div class="row">
	<div class="col">
		<form>
			<div class="form-group">
				<label for="tb-barang_id">ID Barang</label>
				<input type="text" class="form-control-plaintext" name="tb-barang_id" id="tb-barang_id" readonly>
			</div>
			<div class="form-group">
				<label for="tb-barang_nama">Nama</label>
				<input type="text" class="form-control" name="tb-barang_nama" id="tb-barang_nama">
			</div>
			<div class="form-group">
				<label for="tb-barang_tgl">Tanggal</label>
				<input type="date" class="form-control" name="tb-barang_tgl" id="tb-barang_tgl">
			</div>
			<div class="form-group">
				<label for="tb-barang_harga">Harga Awal</label>
				<input type="number" class="form-control" name="tb-barang_harga" id="tb-barang_harga">
			</div>
			<div class="form-group">
				<label for="tb-barang_deskripsi">Deskripsi</label>
				<input type="text" class="form-control" name="tb-barang_deskripsi" id="tb-barang_deskripsi">
			</div>

			<div class="btn-group btn-block">
				<button name="add" class="btn btn-success">Tambah</button>
				<button name="edit" class="btn btn-primary">Ubah</button>
				<button name="delete" class="btn btn-danger">Hapus</button>
			</div>
		</form>
	</div>
	<div class="col">
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
				
			</tbody>
		</table>
	</div>
</div>