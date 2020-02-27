<div class="row">
	<div class="col jumbotron">
		<h1 class="display-4" id="nama_barang"></h1>
		<hr>
		<p class="text-muted" id="harga_awal"></p>
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
				<?php

				require('connection.php');
				$query = mysqli_query($connection, "Select * From history_lelang"); // Tambahin Where id_lelang dan sort dari penawaran tertinggi
				while ($data = mysqli_fetch_array($query))
				{
					$id_barang = $data['id_barang'];
					$id_user = $data['id_user'];

					$queryBarang = mysqli_query($connection, "Select * From tb_barang Where id_barang='$id_barang'");
					$queryUser = mysqli_query($connection, "Select * From tb_masyarakat Where id_user='$id_user'");

					$data_barang = mysqli_fetch_assoc($queryBarang);
					$data_user = mysqli_fetch_assoc($queryUser);

					echo "<tr>";
					echo "<td>" . $data_barang['nama_barang'] . "</td>";
					echo "<td>" . $data_user['nama_lengkap'] . "</td>";
					echo "<td>" . $data['penawaran_harga'] . "</td>";
					echo "</tr>";
				}

				?>
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
			<form action="tawar.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="tawar-nama_barang">Nama Barang</label>
						<div>
							<input type="text" class="form-control-plaintext" id="tawar-nama_barang" name="tawar-nama_barang" readonly>
							<input type="text" id="tawar-id_barang" name="tawar-id_barang" readonly style="display: none;">
							<input type="text" id="nama_user_penawaran" name="tawar-user" readonly style="display: none;">
							<input type="text" id="id_lelang" name="id_lelang" readonly style="display: none;">
						</div>
					</div>
					<div class="form-group">
						<label for="tawar-harga">Harga tawaran (Dalam Rupiah)</label>
						<div>
							<input min="" type="number" class="form-control" id="tawar-harga" name="tawar-harga" required>
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

<p style="display: none;" id="p_id_lelang"></p>
<!--<p style="display: none;" id="nama_user_penawaran"></p>-->

<script>
function aturBarang (nama_barang, deskripsi_barang, id_lelang, nama_user, id_barang, harga_minimal, harga_awal)
{
	document.getElementById('nama_barang').innerHTML = nama_barang.toString();
	document.getElementById('deskripsi_barang').innerHTML = deskripsi_barang.toString();
	document.getElementById('id_lelang').value = id_lelang;
	document.getElementById('p_id_lelang').innerHTML = id_lelang;
	document.getElementById('nama_user_penawaran').value = nama_user;
	document.getElementById('harga_awal').innerHTML = "Harga Awal: " + formatRupiah(harga_awal.toString(), 'Rp.');

	document.getElementById('tawar-nama_barang').value = nama_barang.toString();
	document.getElementById('tawar-id_barang').value = id_barang;
	document.getElementById('tawar-harga').min = harga_minimal + 1;
}

// Dicolong dari malasngoding
/* Fungsi formatRupiah */
function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	sisa     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, sisa),
	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>