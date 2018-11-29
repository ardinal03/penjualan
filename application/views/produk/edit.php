<?php
	$p_kode 		= $produk['kode_produk'];
	$p_nama 		= $produk['nama_produk'];
	$p_kode_series	= $produk['kode_series'];
	$p_nama_series 	= $produk['nama_series'];
	$p_transmisi 	= $produk['transmisi'];
	$p_harga 		= $produk['harga'];
	$p_keterangan	= $produk['keterangan'];
?>

<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto"><?php echo $p_nama;?></h1>
			</div>
		</div>
	</section>


	<section class="row" id="main">
		<div class="col-lg-7 col-12 order-1">
			<div class="main-canvas">
				<div class="row catalogue" id="produk">
					<div class="col-sm-12 col-md-12 col-lg-12 mb-4">
						<div class="produk-section">
							<p class="produk-subtitle">Kode Produk</p>
							<p class="produk-text"><?php echo $p_kode; ?></p>
						</div>
						<div class="produk-section">
							<p class="produk-subtitle">Nama Produk</p>
							<p class="produk-text"><?php echo $p_nama; ?></p>
						</div>
						<div class="produk-section">
							<p class="produk-subtitle">Series</p>
							<p class="produk-text"><?php echo $p_nama_series; ?></p>
						</div>
						<div class="produk-section">
							<p class="produk-subtitle">Tipe Transmisi</p>
							<p class="produk-text"><?php echo $p_transmisi; ?></p>
						</div>
						
						<div class="produk-section">
							<p class="produk-subtitle">Harga</p>
							<p class="produk-text">IDR. <?php echo number_format($p_harga);?></p>
						</div>

						<div class="produk-section">
							<p class="produk-subtitle">Keterangan</p>
							<p class="produk-text"><?php echo $p_keterangan; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 col-lg-5 order-2">
			<div class="right-tab d-block">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Ubah Produk</h1>
							</div>
				
							<div class="col-12">
								<form class="form-box" method="POST" action="<?php echo site_url('produk_control/update_produk');?>">
									<input type="hidden" name="kode_produk" value="<?php echo $p_kode; ?>">
									<div class="form-group">
										<label for="nama_produk" class="col-form-label">Nama Produk</label>
										<input type="text" name="nama_produk" class="form-control" required value="<?php echo $p_nama;?>">
									</div>

									<div class="form-group">
										<label for="series" class="col-form-label">Series</label>
										<select class="form-control" id="series" name="series" required>
											<option value="<?php echo $p_kode_series;?>" selected hidden><?php echo $p_nama_series;?></option>
										
										<?php foreach ($series as $data): ?>

											<option value="<?php echo $data['kode_series']; ?>"><?php echo $data['nama_series']; ?></option>

										<?php endforeach; ?>

										</select>
									</div>
									<div class="form-group">
										<label for="transmisi" class="col-form-label">Transmisi</label>
										<select class="form-control" id="transmisi" name="transmisi" required>
											<option value="<?php echo $p_transmisi;?>" selected hidden><?php echo $p_transmisi;?></option>
											<option value="Automatic">Automatic</option>
											<option value="Manual">Manual</option>
											<option value="CVT">CVT</option>
										</select>
									</div>
									<div class="form-group">
										<label for="harga" class="col-form-label">Harga</label>
										<input type="text" name="harga" class="form-control" required value="<?php echo $p_harga;?>">
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-form-label">Keterangan</label>
										<textarea cols="54" rows="3" name="keterangan" class="form-control"><?php echo $p_keterangan;?></textarea>
									</div>
									<hr>

									<div class="my-2 text-center">
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