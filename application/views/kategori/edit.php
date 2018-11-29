<?php 
	$k_file 	= $kategori['link_file'];
	$k_kode 	= $kategori['kode_kategori']; 
	$k_nama 	= $kategori['nama_kategori'];
	$k_tanggal 	= $kategori['ditambahkan'];
?>

<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto"><?php echo $k_nama; ?></h1>
			</div>
		</div>
	</section>

	<section class="row" id="main">
		<div class="col-lg-6 col-12 order-1">
			<div class="main-canvas">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<img class="card-thumb card-thumb-md" src="<?php echo $k_file;?>">
						</div>
						<div class="row d-flex">
							<h4 class="display-5 mx-auto"><?php echo $k_nama;?></h4>
						</div><hr/>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Kode Kategori</p>
							<p class="col card-subtitle"><?php echo $k_kode; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Nama Kategori</p>
							<p class="col card-subtitle"><?php echo $k_nama; ?></p>
						</div>
						<div class="card-section d-flex no-border">
							<p class="col card-subtitle">Ditambahkan Pada</p>
							<p class="col card-subtitle"><?php echo date('d F Y', strtotime($k_tanggal)); ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-12 order-2">
			<div class="right-tab" style="display: block;">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Ubah Kategori</h1>
							</div>

							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('kategori_control/update_kategori');?>">
									<input type="hidden" name="kode_kategori" value="<?php echo $k_kode;?>">
									<div class="form-group">
										<label for="nama_kategori" class="col-form-label">Nama Kategori</label>
										<input type="text" name="nama_kategori" class="form-control" required value="<?php echo $k_nama;?>">
									</div>
									<div class="form-group">
										<label for="upload[]" class="col-form-label">Ubah Gambar</label>
										<input type="file" name="upload[]" class="form-control no-border px-0">
									</div>
									<hr class="mt-4">
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