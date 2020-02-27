<div class="row">
	<div class="col jumbotron">
		<h1 class="display-4" id="nama_barang"></h1>
		<hr>
		<p class="text-muted" id="harag_minimal"></p>
		<p class="lead" id="deskripsi_barang"></p>
		<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#tawarModal">Tawar</button>
	</div>
	<div class="col">
		<table class="table table-striped table-bordered table-hover" id="tb_pelelangan">
			<thead class="thead-dark">
				<tr>
					<th>Nama Barang</th>
					<th>Nama User</th>
					<th>Penawaran Harga</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" id="tawarModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header bg-3">
				<h5 class="modal-title text-white">Penawaran</h5>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="tawar-nama_barang">Nama Barang</label>
						<div>
							<input type="text" class="form-control-plaintext" id="tawar-nama_barang" name="tawar-nama_barang" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="tawar-harga">Harga tawaran</label>
						<div>
							<input type="number" class="form-control" id="tawar-harga" name="tawar-harga" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-block btn-blue btn-lg" name="tawar-btn">Tawar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<p style="display: none;" id="id_lelang"></p>
<p style="display: none;" id="nama_user_penawaran"></p>

<script>
function aturBarang (nama_barang, deskripsi_barang, id_lelang, nama_user)
{
	document.getElementById('nama_barang').innerHTML = nama_barang.toString();
	document.getElementById('deskripsi_barang').innerHTML = deskripsi_barang.toString();
	document.getElementById('id_lelang').innerHTML = id_lelang;
	document.getElementById('nama_user_penawaran').innerHTML = nama_user;

	document.getElementById('tawar-nama_barang').value = nama_barang.toString();
}
</script>