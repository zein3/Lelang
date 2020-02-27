<div class="modal fade" id="error-modal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-danger">
				<h3 class="modal-title text-white d-flex justify-content-center">
					<?php
						$error = $_GET['err'];
						if ($error == 'passconfirm')
						{
							echo 'Konfirmasi Password Salah!';
						}
						else if ($error == 'nameexist')
						{
							echo 'Nama atau Username yang anda pilih sudah dipakai!';
						}
						else if ($error == 'salah')
						{
							echo 'Username atau Password salah!';
						}
						else if ($error == 'harusid')
						{
							echo 'ID Harus di isi!';
						}
						else if ($error == 'takbisatawar')
						{
							echo 'Admin atau Petugas tidak bisa mengajukan penawaran';
						}
						else if ($error == 'error')
						{
							echo 'Maaf, ada kesalahan pada sistem';
						}
					?>
				</h3>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
</div>

<script>
$('#error-modal').modal('show');
</script>