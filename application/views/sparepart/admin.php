<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Suku Cadang</h1>
				<button class="btn btn-outline-primary btn-tambah">Tambah Suku Cadang</button>
			</div>
		</div>
	</section>

	<section class="row" id="main">
		<div class="col-lg-12 col-12 order-lg-1 order-2" id="canvas">
			<div class="main-canvas">
				<div class="row catalogue" id="sparepart">
			
			<?php foreach ($sparepart as $data) : ?>

					<div class="col-sm-12 col-md-6 col-lg-4 mb-4 card-item">
						<div class="card">
							<div class="card-body pb-0">
								<div class="card-img-top">
									<img class="card-thumb card-thumb-md" src="<?php echo $data['link_file'];?>">
								</div>
								
								<div class="card-section">
									<h4 class="display-6 text-center"><?php echo $data['nama_sc'];?></h4>
								</div>
								<div class="card-section">
									<p class="card-subtitle text-center p-2">Harga</p>
									<p class="card-text text-center">IDR. <?php echo number_format($data['harga']);?></p>
								</div>
								<div class="card-section no-border">
									<p class="card-subtitle text-center p-2">Keterangan</p>
									<p class="card-text text-center"><?php echo $data['keterangan'];?></p>
								</div>
								<div class="card-menu dropdown">
									<button type="button" class="btn toggle-card-menu" id="dropdown-card" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-pencil-alt"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="dropdown-card">
										<a href="<?php echo site_url($session['akses'].'/sparepart/edit/'.$data['kode_sc']);?>" class="dropdown-item text-primary">Ubah</a>
										<a href="javascript:void(0);" class="dropdown-item text-danger deleteBtn" data-id="<?php echo $data['kode_sc'];?>" data-nama="<?php echo $data['nama_sc'];?>">Hapus</a>
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
								<h1 class="display-6 mr-auto">Tambah Suku Cadang</h1>
								<button class="navbar-toggler ml-auto closer btn-batal" type="button">
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
								</button>
							</div>
				
							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('Sparepart_control/new_sparepart');?>">
									<div class="form-group">
										<label for="nama_sc" class="col-form-label">Nama Suku Cadang</label>
										<input type="text" name="nama_sc" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="harga" class="col-form-label">Harga</label>
										<input type="text" name="harga" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-form-label">Keterangan</label>
										<textarea cols="54" rows="3" name="keterangan" class="form-control"></textarea>
									</div>
									<div class="form-group">
										<label for="upload[]" class="col-form-label">Gambar</label>
										<input type="file" name="upload[]" class="form-control no-border px-0" multiple required accept="image/*">
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
				<div class="modal-title"><strong>Konfirmasi Hapus Suku Cadang</strong></div>
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
	var nama = $(this).data('nama');
	var link = '<?php echo site_url('Sparepart_control/delete_sparepart/');?>' + id;
	$('.modal-body').html('Apakah anda yakin akan menghapus suku cadang: '+nama+'?');
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>