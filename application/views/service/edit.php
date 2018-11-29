<?php
	$sv_kode 	= $service['kode_bengkel'];
	$sv_nama 	= $service['nama_bengkel'];
	$sv_alamat 	= $service['alamat'];
	$sv_telepon	= $service['no_telp'];
	$sv_tanggal = $service['ditambahkan'];
?>

<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto"><?php echo $sv_nama;?></h1>
			</div>
		</div>
	</section>

	<section class="row" id="main">
		<div class="col-lg-7 col-12 order-1">
			<div class="main-canvas">
				<div class="card-section d-flex">
					<p class="col card-subtitle">Kode Bengkel</p>
					<p class="col card-subtitle"><?php echo $sv_kode; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Nama Suku Cadang</p>
					<p class="col card-subtitle"><?php echo $sv_nama; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">Alamat</p>
					<p class="col card-subtitle"><?php echo $sv_alamat; ?></p>
				</div>
				<div class="card-section d-flex">
					<p class="col card-subtitle">No Telpon</p>
					<p class="col card-subtitle"><?php echo $sv_telepon; ?></p>
				</div>
				<div class="card-section d-flex no-border">
					<p class="col card-subtitle">Ditambahkan Pada</p>
					<p class="col card-subtitle"><?php echo date('d F Y', strtotime($sv_tanggal)); ?></p>
				</div>
			</div>
		</div>

		<div class="col-lg-5 col-12 order-2">
			<div class="right-tab" style="display: block;">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Ubah Bengkel</h1>
							</div>

							<div class="col-12">
								<form class="form-box" method="POST" action="<?php echo site_url('Service_control/update_service');?>">
									<div class="form-group">
										<input type="hidden" name="kode_bengkel" value="<?php echo $sv_kode;?>">
										<label for="nama_bengkel" class="col-form-label">Nama Bengkel</label>
										<input type="text" name="nama_bengkel" class="form-control" required value="<?php echo $sv_nama;?>">
									</div>
									<div class="form-group">
										<label for="alamat" class="col-form-label">Alamat</label>
										<textarea cols="54" rows="3" name="alamat" class="form-control" required><?php echo $sv_alamat;?></textarea>
									</div>
									<div class="form-group">
										<label for="no_telp" class="col-form-label">No Telp</label>
										<input type="text" name="no_telp" class="form-control" required value="<?php echo $sv_telepon;?>">
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