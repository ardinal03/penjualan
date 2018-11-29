<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Bengkel</h1>
				<button class="btn btn-outline-primary btn-tambah">Tambah Bengkel</button>
			</div>
		</div>
	</section>

	<section class="row" id="main">
		<div class="col-lg-12 col-12 order-lg-1 order-2" id="canvas">
			<div class="main-canvas">
				<div class="row catalogue" id="produk">
			
				<?php foreach ($service as $data) : ?>

					<div class="col-sm-12 col-md-12 col-lg-12 mb-4">
						<div class="card bg-light">
							<div class="row card-body">
								<div class="col-12 d-flex">
									<h4 class="display-6 produk-header"><?php echo $data['nama_bengkel'];?></h4>
									<ul class="list-inline ml-auto my-auto">
										<li class="list-inline-item">
											<a href="<?php echo site_url($session['akses'].'/service/edit/'.$data['kode_bengkel'].'/');?>" class="text-primary">Ubah</a>
										</li>
										<li class="list-inline-item">
											<a href="javascript:void(0);" class="text-danger deleteBtn" data-id="<?php echo $data['kode_bengkel'];?>" data-nama="<?php echo $data['nama_bengkel'];?>">Hapus</a>
										</li>
									</ul>
								</div>

								<div class="col-12">
									<div class="row">
										<div class="col">
											<div class="produk-section">
												<p class="produk-subtitle">No Telepon</p>
												<p class="produk-text"><?php echo $data['no_telp']; ?></p>
											</div>
										</div>
										<div class="col">
											<div class="produk-section">
												<p class="produk-subtitle">Alamat</p>
												<p class="produk-text"><?php echo $data['alamat'];?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php endforeach; ?>

				</div>
			</div>
		</div>

		<div class="col-12 col-lg-5 order-lg-2 order-1" id="right-tab">
			<div class="right-tab">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Tambah Bengkel</h1>
								<button class="navbar-toggler ml-auto closer btn-batal" type="button">
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
								</button>
							</div>
				
							<div class="col-12">
								<form class="form-box" method="POST" action="<?php echo site_url('Service_control/new_service');?>">
									<div class="form-group">
										<label for="nama_bengkel" class="col-form-label">Nama Bengkel</label>
										<input type="text" name="nama_bengkel" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="alamat" class="col-form-label">Alamat</label>
										<textarea cols="54" rows="3" name="alamat" class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label for="no_telp" class="col-form-label">No Telp</label>
										<input type="text" name="no_telp" class="form-control" required>
									</div>
									<hr>
									<div class="text-center">
										<button type="submit" class="btn btn-primary">Tambah</button>
										<button type="button" class="btn btn-danger btn-batal">Batal</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title"><strong>Konfirmasi Hapus Bengkel</strong></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			
			<div class="modal-body">
				
			</div>
			
			<div class="modal-footer">
				<a id="deleteLink" href="">
					<button type="submit" class="btn btn-outline-danger">Hapus</button>
				</a>
				<button type="button" class="btn btn-outline-success" data-dismiss="modal">Batalkan</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
$('.deleteBtn').click(function() {
	var id 	 = $(this).data('id');
	var nama = $(this).data('nama');
	var link = '<?php echo site_url('Service_control/delete_service/');?>' + id;
	$('.modal-body').html('Apakah anda yakin akan menghapus bengkel: '+nama+'?');
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>