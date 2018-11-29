<?php 
	$s_kode 	= $series['kode_series'];
	$s_kode_kat	= $series['kode_kategori'];
	$s_nama 	= $series['nama_series'];
	$s_nama_kat	= $series['nama_kategori'];
	$s_warna 	= $series['warna'];
	$s_tanggal 	= $series['ditambahkan'];
?>

<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto"><?php echo $s_nama;?></h1>
			</div>
		</div>
	</section>


	<section class="row" id="main">
		<div class="col-lg-7 col-12 order-1">
			<div class="main-canvas">
				<div class="card-section d-flex">
					<p class="col card-subtitle">Kode Series</p>
					<p class="col card-subtitle"><?php echo $s_kode; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Nama Series</p>
					<p class="col card-subtitle"><?php echo $s_nama; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Kategori</p>
					<p class="col card-subtitle"><?php echo $s_nama_kat; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Warna</p>
					<p class="col card-subtitle"><?php echo $s_warna; ?></p>
				</div>
				<div class="card-section d-flex no-border">
					<p class="col card-subtitle">Ditambahkan Pada</p>
					<p class="col card-subtitle"><?php echo date('d F Y', strtotime($s_tanggal)); ?></p>
				</div>
			</div>
		</div>

		<div class="col-lg-5 col-12 order-2">
			<div class="right-tab" style="display: block;">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Ubah Series</h1>
							</div>

							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('series_control/update_series');?>">
									<input type="hidden" name="kode_series" value="<?php echo $s_kode;?>">
									<div class="form-group">
										<label for="nama_series" class="col-form-label">Nama Series</label>
										<input type="text" name="nama_series" class="form-control" required value="<?php echo $s_nama;?>">
									</div>
									<div class="form-group">
										<label for="kategori" class="col-form-label">Kategori</label>
										<select class="form-control" id="kategori" name="kategori" required>
											<option value="<?php echo $s_kode_kat?>" selected hidden><?php echo $s_nama_kat;?></option>
								
									<?php foreach ($kategori as $data): ?>
									
											<option value="<?php echo $data['kode_kategori'];?>"><?php echo $data['nama_kategori'];?></option>
								
									<?php endforeach; ?>

										</select>
									</div>
									<div class="form-group">
										<label for="warna" class="col-form-label">Warna</label>
										<textarea cols="54" rows="3" name="warna" id="warna" class="form-control" required><?php echo $s_warna;?></textarea>
									</div>
									<hr class="mt-3">
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
				<h1 class="display-6 mr-auto">Gallery <?php echo $s_nama;?></h1>
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
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('series_control/upload_series');?>">
									<input type="hidden" name="nama_series" value="<?php echo $s_nama;?>">
									<input type="hidden" name="kode_series" value="<?php echo $s_kode;?>">
									<div class="form-group">
										<label for="upload[]" class="col-form-label">Gambar</label>
										<input type="file" name="upload[]" class="form-control" multiple accept="image/*" style="border: none;">
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
	var link = '<?php echo site_url('series_control/delete_series_file/');?>' + id;
	$('.modal-body img').attr('src', file);
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>