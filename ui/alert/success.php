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
						else
						{

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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$('#success-modal').modal('show');
</script>