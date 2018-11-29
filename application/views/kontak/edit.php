<?php
	$kn_file 		= $kontak['link_file'];
	$kn_id 			= $kontak['id_kontak'];
	$kn_nama 		= $kontak['nama_kontak'];
	$kn_user		= $kontak['username'];
	$kn_pass	 	= $kontak['password'];
	$kn_telp 		= $kontak['no_telp'];
	$kn_email		= $kontak['email'];
	$kn_akses 		= $kontak['akses'];
	$kn_ket			= $kontak['keterangan'];
	$kn_tanggal		= $kontak['ditambahkan'];
?>

<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto"><?php echo $kn_nama;?></h1>
			</div>
		</div>
	</section>

	<section class="row" id="main">
		<div class="col-lg-6 col-12 order-1">
			<div class="main-canvas">
				<div class="card" style="min-height: auto;">
					<div class="card-body">
						<div class="row">
							<img class="card-thumb card-thumb-md" src="<?php echo $kn_file;?>">
						</div>
						<div class="row d-flex">
							<h4 class="display-5 mx-auto"><?php echo $kn_nama;?></h4>
						</div><hr/>
						<div class="card-section d-flex">
							<p class="col card-subtitle">ID Kontak</p>
							<p class="col card-subtitle"><?php echo $kn_id; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Nama Kontak</p>
							<p class="col card-subtitle"><?php echo $kn_nama; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Username</p>
							<p class="col card-subtitle"><?php echo $kn_user; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Password</p>
							<a href="javascript:void(0);" id="toggle-password" class="col card-subtitle">Tampilkan</a>
							<a href="javascript:void(0);" class="col card-subtitle" id="data-password" style="display: none;"><?php echo $kn_pass;?></a>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">No Telepon</p>
							<p class="col card-subtitle"><?php echo $kn_telp; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Alamat Email</p>
							<p class="col card-subtitle"><?php echo $kn_email; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Akses</p>
							<p class="col card-subtitle"><?php echo $kn_akses; ?></p>
						</div>
						<div class="card-section d-flex">
							<p class="col card-subtitle">Keterangan</p>
							<p class="col card-subtitle"><?php echo $kn_ket; ?></p>
						</div>
						<div class="card-section d-flex no-border">
							<p class="col card-subtitle">Ditambahkan Pada</p>
							<p class="col card-subtitle"><?php echo date('d F Y', strtotime($kn_tanggal)); ?></p>
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
								<h1 class="display-6 mr-auto">Ubah Kontak</h1>
							</div>

							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('Kontak_control/update_kontak');?>">
									<input type="hidden" name="id_kontak" value="<?php echo $kn_id?>">
									<input type="hidden" name="current_pass" value="<?php echo $kn_pass;?>">
									<input type="hidden" name="akses" value="<?php echo $kn_akses?>">
									<div class="form-group">
										<label for="nama_kontak" class="col-form-label">Nama kontak</label>
										<input type="text" name="nama_kontak" class="form-control" required value="<?php echo $kn_nama;?>">
									</div>
									<div class="form-group">
										<label for="username" class="col-form-label">Username</label>
										<input type="text" name="username" class="form-control" required value="<?php echo $kn_user;?>">
									</div>
									<div class="form-group">
										<label for="password" class="col-form-label">Password</label>
										<input type="password" name="password" class="form-control" autocomplete="new_password">
									</div>
									<div class="form-group">
										<label for="upload[]" class="col-form-label">Foto Kontak</label>
										<input type="file" name="upload[]" class="form-control no-border px-0">
									</div>
									<div class="form-group">
										<label for="no_telp" class="col-form-label">No Telepon</label>
										<input type="text" name="no_telp" class="form-control" required value="<?php echo $kn_telp;?>">
									</div>
									<div class="form-group">
										<label for="email" class="col-form-label">E-mail</label>
										<input type="text" name="email" class="form-control" required value="<?php echo $kn_email;?>">
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-form-label">Keterangan</label>
										<textarea cols="54" rows="3" name="keterangan" class="form-control"><?php echo $kn_ket;?></textarea>
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