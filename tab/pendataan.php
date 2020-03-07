<div class="row">
	<div class="col jumbotron">
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
			<button id="add" name="tb-barang-btn" class="btn btn-success">Tambah</button>
			<button id="edit" name="tb-barang-btn" class="btn btn-primary">Ubah</button>
			<button id="delete" name="tb-barang-btn" class="btn btn-danger">Hapus</button>
		</div>
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

<div id="loading-spinner" class="spinner-border loading-spinner" style="display: none;"></div>

<div class="modal fade" tabindex="-1" role="dialog" id="tb-barangModal">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="text-center" id="modal-pesan">Success</h5>
			</div>
		</div>
	</div>
</div>

<script>
var id = '';
var nama = '';
var tgl = '';
var harga = '';
var deskripsi = '';

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

	$("button[name='tb-barang-btn']").click(function() {
		prepareInputValue();
		var option = this.id.toString();
		var pesan = '';

		// Cek input
		if (option == 'add')
		{
			if (nama == '' || tgl == '' || harga == '' || deskripsi == '')
			{
				alert('Semua harus diisi!');
				return;
			}
			pesan = 'Data berhasil ditambah';
		}
		else if (option == 'delete')
		{
			if (id == '')
			{
				alert('Semua harus diisi!');
				return;
			}
			pesan = 'Data berhasil dihapus';
		}
		else
		{
			if (id == '' || nama == '' || tgl == '' || harga == '' || deskripsi == '')
			{
				alert('Semua harus diisi!');
				return;
			}
			pesan = 'Data berhasil diubah';
		}
		$("#modal-pesan").html(pesan);

		$.ajax({
			url: 'tb_barang.php',
			type: 'POST',
			data: {'option' : option, 'tb-barang_id' : id, 'tb-barang_nama' : nama, 'tb-barang_tgl' : tgl, 'tb-barang_harga' : harga, 'tb-barang_deskripsi' : deskripsi},
			beforeSend: function()
			{
				$("#loading-spinner").css('display', 'inline-block');
			}
		}).done(function() {
			loadTbBarang();
			$("#loading-spinner").css('display', 'none');
			$("#tb-barangModal").modal('show');
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
