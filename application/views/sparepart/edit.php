<?php
	$sp_kode 		= $sparepart['kode_sc'];
	$sp_nama 		= $sparepart['nama_sc'];
	$sp_harga 		= $sparepart['harga'];
	$sp_keterangan 	= $sparepart['keterangan'];
	$sp_tanggal 	= $sparepart['ditambahkan'];
?>

<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto"><?php echo $sp_nama;?></h1>
			</div>
		</div>
	</section>

	<section class="row" id="main">
		<div class="col-lg-7 col-12 order-1">
			<div class="main-canvas">
				<div class="card-section d-flex">
					<p class="col card-subtitle">Kode Suku Cadang</p>
					<p class="col card-subtitle"><?php echo $sp_kode; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Nama Suku Cadang</p>
					<p class="col card-subtitle"><?php echo $sp_nama; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Harga</p>
					<p class="col card-subtitle"><?php echo $sp_harga; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Keterangan</p>
					<p class="col card-subtitle"><?php echo $sp_keterangan; ?></p>
				</div>
				<div class="card-section d-flex no-border">
					<p class="col card-subtitle">Ditambahkan Pada</p>
					<p class="col card-subtitle"><?php echo date('d F Y', strtotime($sp_tanggal)); ?></p>
				</div>
			</div>
		</div>

		<div class="col-lg-5 col-12 order-2">
			<div class="right-tab" style="display: block;">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Ubah Suku Cadang</h1>
							</div>

							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('sparepart_control/update_sparepart');?>">
									<input type="hidden" name="kode_sc" value="<?php echo $sp_kode;?>">
									<div class="form-group">
										<label for="nama_sc" class="col-form-label">Nama Suku Cadang</label>
										<input type="text" name="nama_sc" class="form-control" required value="<?php echo $sp_nama;?>">
									</div>
									<div class="form-group">
										<label for="harga" class="col-form-label">Harga</label>
										<input type="text" name="harga" class="form-control" required value="<?php echo $sp_harga;?>">
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-form-label">Keterangan</label>
										<textarea cols="54" rows="3" name="keterangan" class="form-control"><?php echo $sp_keterangan;?></textarea>
									</div>
									<hr>
									<div class="text-center">
										<button type="submit" class="btn btn-primary">Ubah</button>
										<button type="reset" class="btn btn-danger">Batal</button>
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
<div class="container">
	<section class="row" id="gallery">
		<div class="main-canvas">
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Gallery <?php echo $sp_nama;?></h1>
			</div>
		</div>
	</section>

	<section class="row" id="gallery-item">
		<div class="col-lg-7 col-12 order-1">
			<div class="main-canvas">
				<div class="row gallery" id="gallery">

			<?php foreach ($file as $image) : ?>
				
					<div class="col-sm-12 col-md-6 col-lg-4 mb-4 card-item">
						<div class="card">
							<div class="card-body pb-0">
								<div class="row">
									<div class="col-12">
										<img class="card-thumb card-thumb-sm" src="<?php echo $image['link_file'];?>">
									</div>
								</div>
							</div>
							<a href="javascript:void(0);" class="card-link link-danger deleteBtn" data-id="<?php echo $image['kode_file'];?>" data-file="<?php echo $image['link_file'];?>">Hapus Gambar</a>
						</div>
					</div>

			<?php endforeach; ?>

				</div>
			</div>
		</div>

		<div class="col-lg-5 col-12 order-2">
			<div class="right-tab" style="display: block;">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Tambah Gambar</h1>
							</div>

							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('sparepart_control/upload_sparepart');?>">
									<input type="hidden" name="kode_sc" value="<?php echo $sp_kode;?>">
									<input type="hidden" name="nama_sc" value="<?php echo $sp_nama;?>">
									<div class="form-group">
										<label for="upload[]" class="col-form-label">Gambar</label>
										<input type="file" name="upload[]" class="form-control px-0 no-border" multiple accept="image/*">
									</div>
									<hr class="mt-4">
									<div class="text-center">
										<button type="submit" class="btn btn-primary">Tambah</button>
										<button type="reset" class="btn btn-danger">Batal</button>
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
				<div class="modal-title"><strong>Apakah anda yakin akan menghapus gambar ini?</strong></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			
			<div class="modal-body">
				<img class="card-thumb card-thumb-sm my-auto" src="">
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
	var file = $(this).data('file');
	var link = '<?php echo site_url('sparepart_control/delete_sparepart_file/');?>' + id;
	$('.modal-body img').attr('src', file);
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>