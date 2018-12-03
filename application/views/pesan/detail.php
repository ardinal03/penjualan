<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Kotak Masuk</h1>
			</div>
		</div>
	</section>

	<div class="row" style="display: block;">
		<div class="main-canvas p-4 bg-light">
			<div class="col-lg-12 col-12">
				<div class="header">
					<h4 class="header-small d-inline-block"><?php echo $pesan['nama'];?></h4>
					<span class="float-right"><?php echo time_ago($pesan['ditambahkan']);?></span>
				</div>
				<div class="content">
					<p class="service-font m-0" style="text-transform: lowercase;">
						<i class="fas fa-phone-square fa-fw"></i> <?php echo $pesan['no_telp'];?>
						<i class="fas fa-envelope fa-fw ml-3"></i> <?php echo $pesan['email'];?>
					</p>
				</div>
				<hr>
				<div class="content">
					<p class="service-font m-0" style="word-wrap: break-word;"><?php echo $pesan['isi'];?></p>
				</div>
				<hr>
				<div class="content d-flex">
					<a href="javascript:void(0);" class="d-inline-block text-danger deleteBtn py-1 ml-auto" data-id="<?php echo $pesan['kode_pesan'];?>">Hapus</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title"><strong>Konfirmasi Hapus Pesan</strong></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			
			<div class="modal-body">
				
			</div>
			
			<div class="modal-footer">
				<a id="deleteLink" href="">
					<button type="submit" class="btn btn-outline-danger"> Hapus</button>
				</a>
				<button type="button" class="btn btn-outline-success" data-dismiss="modal">Batalkan</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
$('.deleteBtn').click(function() {
	var id 	 = $(this).data('id');
	var link = '<?php echo site_url('pesan_control/delete_pesan/');?>' + id;
	$('.modal-body').html('Apakah anda yakin akan menghapus pesan ini?');
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>