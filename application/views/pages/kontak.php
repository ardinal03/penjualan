<div class="detail-produk bg-white pb-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="produk-header">
					<h2 class="header-small">Kontak</h2>
					<h3 class="header-big">Costumer Support</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="produk-spec">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="tab-produk">
						<ul  class="nav nav-produk">
							<li class="nav-item produk-link">
								<a class="nav-link" id="kontak">Kontak Kami</a>
							</li>
							<li class="nav-item produk-link">
								<a class="nav-link" id="ulasan">Kirim Ulasan</a>
							</li>
							<li class="nav-item produk-link">
								<a class="nav-link" id="pesan">Kirim Pesan</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $this->session->flashdata('msg'); ?>

<div class="detail-produk bg-white pt-0">
	<div class="container spec-content">
		<div class="row justify-content-center spec-list kontak">

		<?php foreach ($kontak as $data) : ?>
			
			<div class="col-lg-6 col-12">
				<div class="row kontak-wrap">
					<div class="col-lg-5 col-12 bg-kontak">
						<div class="kontak-img">
							<img class="img-fluid" src="<?php echo $data['link_file'];?>">
						</div>
					</div>
					
					<div class="col-lg-7 col-12">
						<div class="kontak-desc">
							<div class="kontak-pos">
								<div class="kontak-section">
									<h4 class="header-big m-0"><?php echo $data['nama_kontak'];?> </h4>
								</div>
								<div class="kontak-section">
									<h5 class="header-small m-0"><?php echo $data['jabatan'];?> </h5>
								</div>
								<div class="kontak-section">
									<p class="kontak-text m-0"><i class="fa fa-phone fa-fw"></i> <?php echo $data['no_telp'];?></p>
									<p class="kontak-text m-0"><i class="fa fa-envelope fa-fw"></i> <?php echo $data['email'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php endforeach;?>

		</div>

		<div class="row justify-content-center">
			<div class="col-lg-12 col-12">
				<div class="produk-header">
					<h2 class="header-small">Review</h2>
					<h3 class="header-big">Ulasan Pengunjung</h3>
				</div>
			</div>
		</div>

	<?php foreach ($ulasan as $dtu) : ?>
		<div class="row mb-2">
			<div class="col-lg-12 col-12">
				<div class="kontak-desc bg-kontak">
					<div class="kontak-pos row">
						<div class="col-lg-4 col-12">
							<div class="kontak-section d-flex">
								<h4 class="header-small m-0"><?php echo $dtu['nama'];?> </h4>
								<section class="rating-block m-0">
									<ul id="stars">
											
							<?php
								$ratings = array('1','2','3','4','5');
								$i =1;
								foreach ( $ratings as $rating) {
									$selected = ( $dtu['rating'] >= $i)?'selected':'';
									echo "<li class='star rating-disabled ".$selected."' data-value='".$i++."'><i class='fa fa-star fa-fw small-star'></i></li>";
								}
							?>

									</ul>
								</section>
							</div>
							<div class="kontak-section m-0">
								<p class="kontak-text m-0"><?php echo $dtu['email'];?></p>
							</div>

							<div class="kontak-section m-0">
								<p class="kontak-text m-0"><?php echo time_ago($dtu['ditambahkan']);?></p>
							</div>
						</div>


						<div class="col-12 col-lg-8">
							<div class="kontak-section">
								<h4 class="header-small">Deskripsi</h4>
							</div>
							<div class="kontak-section d-flex my-auto">
								<p class="m-0" style="font-weight: 500;">Customer</p>
								<p class="kontak-text ml-1 mb-0"><?php echo $dtu['nama_kontak'];?></p>
							</div>
							<hr/>
							<div class="kontak-section">
								<p class="kontak-text m-0"><?php echo $dtu['deskripsi'];?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach;?>
	</div>
	
	<div class="container spec-content">
		<div class="row spec-list ulasan justify-content-center">
			<div class="col-12 col-lg-12">
				<h1 class="header-small">Berikan Ulasan</h1>
				<hr/>
			</div>
			
			<div class="col-lg-12 col-12">
				<form class="form-box" method="POST" action="<?php echo site_url('ulasan_control/new_ulasan');?>">
					<input type="hidden" class="rating-value" name="rating" value="">
					<div class="form-group row">
						<label for="nama" class="col-12 col-lg-2 col-form-label">Nama Anda</label>
						<input type="text" name="nama" class="form-control col-12 col-lg-4" required>
					</div>
					
					<div class="form-group row">
						<label for="email" class="col-12 col-lg-2 col-form-label">Alamat Email</label>
						<input type="email" name="email" class="form-control col-12 col-lg-4" required>
					</div>

					<div class="form-group row">
						<label for="cp" class="col-12 col-lg-2 col-form-label">Customer</label>

						<select class="form-control col-12 col-lg-4" name="cp" required>
							<option value="" disabled hidden selected>Pilih Customer</option>
							
							<?php foreach ($kontak as $opt): ?>
							<option value="<?php echo $opt['id_kontak'];?>"><?php echo $opt['nama_kontak']; ?></option>
							<?php endforeach;?>
						</select>
					</div>

				<?php 
					$ratings = array('Sangat Buruk','Buruk','Bagus','Sangat Bagus','Luar Biasa');
					$i = 1 ;
				?>
						
					<div class="form-group row">
						<label for="rating" class="col-12 col-lg-2 col-form-label">Penilaian Anda</label>
						<section class="rating-block p-0 m-0 col-12 col-lg-4">
							<ul id="stars" class="m-0">
											
							<?php
								foreach ( $ratings as $rating) {
								$selected = ( 0 >= $i)?'selected':'';
								echo 
									"<li class='star ".$selected."' title='".$rating."' data-value='".$i++."'>
										<i class='fa fa-star fa-fw big-star'></i>
									</li>";
								}
							?>

							</ul>
							<div class="rating-error" style="display: none;">
								Isi dulu ratingnya
							</div>
						</section>
					</div>

					<div class="form-group row">
						<label for="deskripsi" class="col-12 col-lg-2 col-form-label">Deskripsi</label>
						<textarea cols="54" rows="5" name="deskripsi" class="form-control col-12 col-lg-4"></textarea>
					</div>
					<div class="form-group row text-center my-4">
						<div class="col-12 col-lg-6">
							<button id="user_confirm" type="submit" class="btn btn-primary">Kirimkan</button>
							<button id="user_cancel" type="reset" class="btn btn-danger">Batal</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="container spec-content">
		<div class="row spec-list pesan justify-content-center">
			<div class="col-12 col-lg-12">
				<h1 class="header-small px-0">Kirimkan Pesan</h1>
				<hr/>
			</div>
			
			<div class="col-lg-12 col-12">
				<form class="form-box" method="POST" action="<?php echo site_url('pesan_control/new_pesan');?>">
					<div class="form-group row">
						<label for="nama" class="col-12 col-lg-2 col-form-label m-0">Nama Anda</label>
						<input type="text" name="nama" class="form-control col-12 col-lg-4" required>
					</div>
					
					<div class="form-group row">
						<label for="email" class="col-12 col-lg-2 col-form-label m-0">Alamat Email</label>
						<input type="email" name="email" class="form-control col-12 col-lg-4" required>
					</div>

					<div class="form-group row">
						<label for="no_telp" class="col-12 col-lg-2 col-form-label m-0">Nomor Telepon</label>
						<input type="text" name="no_telp" class="form-control col-12 col-lg-4" required>
					</div>

					<div class="form-group row">
						<label for="pesan" class="col-12 col-lg-2 col-form-label m-0">Isi Pesan</label>
						<textarea cols="54" rows="5" name="pesan" class="form-control col-12 col-lg-4"></textarea>
					</div>
					<div class="form-group row text-center my-4">
						<div class="col-12 col-lg-6">
							<button id="user_confirm" type="submit" class="btn btn-primary">Kirimkan</button>
							<button id="user_cancel" type="reset" class="btn btn-danger">Batal</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>