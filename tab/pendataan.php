<div class="row">
	<div class="col jumbotron">
		<!--<form>-->
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
				<button id="tb_barang_add" class="btn btn-success">Tambah</button>
				<button id="tb_barang_edit" class="btn btn-primary">Ubah</button>
				<button id="tb_barang_delete" class="btn btn-danger">Hapus</button>
			</div>
		<!--</form>-->
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
			<tbody id="tbody_tb_barang">
				
			</tbody>
		</table>
	</div>
</div>

<script>
var id = null;
var nama = null;
var tgl = null;
var harga = null;
var deskripsi = null;

function loadTbBarang ()
{
	$.ajax({
		url: 'utilities/barang.php'
	}).done(function (data) {
		$("#tbody_tb_barang").html(data);
		addTableInteraction();
	})
}

$(document).ready(function () {
	loadTbBarang();

	// Tambah Barang
	$("#tb_barang_add").click(function() {
		prepareInputValue();
		$.ajax({
			url: 'tb_barang.php',
			type: 'POST',
			data: {'option' : 'add', 'tb-barang_id' : id, 'tb-barang_nama' : nama, 'tb-barang_tgl' : tgl, 'tb-barang_harga' : harga, 'tb-barang_deskripsi' : deskripsi}
		}).done(function () {
			loadTbBarang();		
		})
	})

	// Edit Barang
	$("#tb_barang_edit").click(function() {
		prepareInputValue();
		$.ajax({
			url: 'tb_barang.php',
			type: 'POST',
			data: {'option' : 'edit', 'tb-barang_id' : id, 'tb-barang_nama' : nama, 'tb-barang_tgl' : tgl, 'tb-barang_harga' : harga, 'tb-barang_deskripsi' : deskripsi}
		}).done(function () {
			loadTbBarang();
		})
	})

	// Hapus Barang
	$("#tb_barang_delete").click(function() {
		prepareInputValue();
		$.ajax({
			url: 'tb_barang.php',
			type: 'POST',
			data: {'option' : 'delete', 'tb-barang_id' : id, 'tb-barang_nama' : nama, 'tb-barang_tgl' : tgl, 'tb-barang_harga' : harga, 'tb-barang_deskripsi' : deskripsi}
		}).done(function () {
			loadTbBarang();
		})
	})
})

function prepareInputValue ()
{
	id = $("#tb-barang_id").val();
	nama = $("#tb-barang_nama").val();
	tgl = $("#tb-barang_tgl").val();
	harga = $("#tb-barang_harga").val();
	deskripsi = $("#tb-barang_deskripsi").val();
}

function addTableInteraction ()
{
	var tb_barang = document.getElementById('tbody_tb_barang');

	for (var i = 0; i < tb_barang.rows.length; i++)
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
}
</script>
