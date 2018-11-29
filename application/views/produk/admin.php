<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Produk</h1>
				<button class="btn btn-outline-primary btn-tambah">Tambah Produk</button>
			</div>
		</div>
	</section>


	<section class="row" id="main">
		<div class="col-lg-12 col-12 order-lg-1 order-2" id="canvas">
			<div class="main-canvas">
				<div class="row catalogue" id="produk">

				<?php 
					foreach ($series as $dts) :
						$key_produk = array('produk.kode_series' => $dts['kode_series']);
						$produk 	= $this->crud_model->_all_produk($key_produk);
						if (! empty($produk)) {
				?>

					<div class="col-sm-12 col-md-12 col-lg-12 mb-4">
						<h4 class="display-6" style="font-weight: 800;"><?php echo $dts['nama_series']; ?></h4>
						
						<div class="row">
						
						<?php foreach ($produk as $dtp): ?>
							
							<div class="col-12 mb-3">
								<div class="card bg-light">
									<div class="row card-body">
										<div class="col-12 d-flex">
											<h4 class="display-6 produk-header"><?php echo $dtp['nama_produk'];?></h4>
											<ul class="list-inline ml-auto my-auto">
												<li class="list-inline-item">
													<a href="<?php echo site_url($session['akses'].'/produk/edit/'.$dtp['kode_produk'].'/');?>" class="text-primary">Ubah</a>
												</li>
												<li class="list-inline-item">
													<a href="javascript:void(0);" class="text-danger deleteBtn" data-id="<?php echo $dtp['kode_produk'];?>" data-nama="<?php echo $dtp['nama_produk'];?>">Hapus</a>
												</li>
											</ul>
										</div>

										<div class="col-12">
											<div class="row">
												<div class="col">
													<div class="produk-section">
														<p class="produk-subtitle">Tipe Transmisi</p>
														<p class="produk-text"><?php echo $dtp['transmisi']; ?></p>
													</div>
												</div>
												<div class="col">
													<div class="produk-section">
														<p class="produk-subtitle">Harga</p>
														<p class="produk-text">IDR. <?php echo number_format($dtp['harga']);?></p>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<div class="produk-section">
														<p class="produk-subtitle">Keterangan</p>
														<p class="produk-text"><?php echo $dtp['keterangan']?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						<?php endforeach; ?>

						</div>
						<hr>
					</div>

				<?php } endforeach; ?>

				</div>
			</div>
		</div>

		<div class="col-12 col-lg-5 order-lg-2 order-1" id="right-tab">
			<div class="right-tab">
				<div class="card">
					<div class="row">
						<div class="card-body">
							<div class="col-12 header-block">
								<h1 class="display-6 mr-auto">Tambah Produk</h1>
								<button class="navbar-toggler ml-auto closer btn-batal" type="button">
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
								</button>
							</div>
				
							<div class="col-12">
								<form class="form-box" method="POST" action="<?php echo site_url('produk_control/new_produk');?>">
									<div class="form-group">
										<label for="nama_produk" class="col-form-label">Nama Produk</label>
										<input type="text" name="nama_produk" class="form-control" required>
									</div>

									<div class="form-group">
										<label for="series" class="col-form-label">Series</label>
										<select class="form-control" id="series" name="series" required>
											<option value="" disabled selected hidden>Pilih Series</option>
										
										<?php foreach ($series as $dts): ?>

											<option value="<?php echo $dts['kode_series']; ?>"><?php echo $dts['nama_series']; ?></option>

										<?php endforeach; ?>

										</select>
									</div>
									<div class="form-group">
										<label for="transmisi" class="col-form-label">Transmisi</label>
										<select class="form-control" id="transmisi" name="transmisi" required>
											<option value="" disabled selected hidden>Pilih Transmisi</option>
											<option value="Automatic">Automatic</option>
											<option value="Manual">Manual</option>
											<option value="CVT">CVT</option>
										</select>
									</div>
									<div class="form-group">
										<label for="harga" class="col-form-label">Harga</label>
										<input type="text" name="harga" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="keterangan" class="col-form-label">Keterangan</label>
										<textarea cols="54" rows="3" name="keterangan" class="form-control"></textarea>
									</div>
									<hr>

									<div class="my-2 text-center">
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
				<div class="modal-title"><strong>Konfirmasi Hapus Produk</strong></div>
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
	var link = '<?php echo site_url('produk_control/delete_produk/');?>' + id;
	$('.modal-body').html('Apakah anda yakin akan menghapus produk: '+nama+'?');
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>