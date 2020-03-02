<div class="jumbotron">
	<div>
		<h3 class="display-4">Laporan</h3>
	</div>
	<br/>
	<div id="laporan-pilihan" class="list-group list-group-horizontal">
		<button name="laporan-barang" type="button" class="list-group-item list-group-item-action" onclick="selectTable('laporan-barang')">Barang</button>
		<button name="laporan-lelang" type="button" class="list-group-item list-group-item-action" onclick="selectTable('laporan-lelang')">Lelang</button>
		<button name="laporan-user" type="button" class="list-group-item list-group-item-action" onclick="selectTable('laporan-user')">Masyarakat</button>
		<button name="laporan-petugas" type="button" class="list-group-item list-group-item-action" onclick="selectTable('laporan-petugas')">Petugas</button>
		<button name="laporan-histori" type="button" class="list-group-item list-group-item-action" onclick="selectTable('laporan-histori')">Histori Lelang</button>
		<button name="laporan-level" type="button" class="list-group-item list-group-item-action" onclick="selectTable('laporan-level')">Level</button>
	</div>
	
	<hr>

	<button class="btn btn-primary btn-block" onclick="printDocument()">Generate Laporan</button>
</div>

<div style="display: none;">
	<?php
		include 'documents/tb_barang.php';
	?>
</div>

<script>
var selectedTable = null;

function selectTable(table_id)
{
	var pilihan = document.getElementById('laporan-pilihan').childNodes;
	for  (var i = 0; i < pilihan.length; i++)
	{
		if ($(pilihan[i]).hasClass("active"))
		{
			pilihan[i].classList.remove("active");
		}
	}
	
	$('button[name = ' + table_id + ']').addClass("active")

	selectedTable = table_id;
}

function printDocument()
{
	if (selectedTable === null)
	{
		alert("Harus memilih table yang ingin diprint");
		return;
	}

	var printContents = document.getElementById(selectedTable).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}
</script>