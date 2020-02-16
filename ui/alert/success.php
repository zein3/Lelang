<div class="modal fade" id="success-modal" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h3 class="modal-title text-white d-flex justify-content-center">
					<?php
						$success = $_GET['success'];
						if ($success == 'pendaftaran')
						{
							echo 'Selamat! Anda berhasil mendaftar, silahkan login';
						}
						else if ($success == 'datamasuk')
						{
							echo 'Data berhasil dimasukkan';
						}
						else if ($success == 'dataubah')
						{
							echo 'Data berhasil diubah';
						}
						else if ($success == 'datahapus')
						{
							echo 'Data berhasil dihapus';
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
$('#success-modal').modal('show');
</script>