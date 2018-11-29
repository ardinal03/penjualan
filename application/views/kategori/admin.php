<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Kategori</h1>
				<button class="btn btn-outline-primary btn-tambah">Tambah Kategori</button>
			</div>
		</div>
	</section>
	
	<section class="row" id="main">
		<div class="col-lg-12 col-12 order-lg-1 order-2" id="canvas">
			<div class="main-canvas">
				<div class="row catalogue" id="kategori">
			
				<?php foreach ($kategori as $data): ?>

					<div class="col-sm-12 col-md-6 col-lg-4 mb-4 card-item">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<img class="card-thumb card-thumb-sm" src="<?php echo $data['link_file'];?>">
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="text-center">
											<a href="<?php echo site_url($session['akses'].'/series/'.$data['nama_kategori'].'/');?>" class="link">
												<h4 class="display-5"><?php echo $data['nama_kategori'];?></h4>
											</a>
										</div>
										<ul class="list-inline text-center m-0">
											<li class="list-inline-item">
												<a href="<?php echo site_url($session['akses'].'/kategori/edit/'.$data['kode_kategori'].'/');?>" class="text-primary">Ubah</a>
											</li>
											<li class="list-inline-item">
												<a href="javascript:void(0);" class="text-danger deleteBtn" data-id="<?php echo $data['kode_kategori'];?>" data-nama="<?php echo $data['nama_kategori'];?>">Hapus</a>
											</li>
										</ul>
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
								<h1 class="display-6 mr-auto">Tambah Kategori</h1>
								<button class="navbar-toggler ml-auto closer btn-batal" type="button">
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
									<span class="bg-secondary"></span>
								</button>
							</div>
						
							<div class="col-12">
								<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('kategori_control/new_kategori');?>">
									<div class="form-group">
										<label for="nama_kategori" class="col-form-label">Kategori</label>
										<input type="text" name="nama_kategori" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="upload[]" class="col-form-label">Gambar</label>
										<input type="file" name="upload[]" class="form-control no-border px-0" required>
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
				<div class="modal-title"><strong>Konfirmasi Hapus Kategori</strong></div>
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
	var link = '<?php echo site_url('kategori_control/delete_kategori/');?>' + id;
	$('.modal-body').html('Apakah anda yakin akan menghapus kategori: '+nama+'?');
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>