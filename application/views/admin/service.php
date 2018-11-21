<div class="container">
	<div class="row">
		<div class="col-12" id="canvas">
			<div class="main-canvas">
				<section class="row main-canvas">	
					<div class="col-12 header-block mb-4">
						<h1 class="display-6 mr-auto">Service</h1>
						<button class="btn btn-outline-primary btn-tambah">Tambah Bengkel</button>
					</div>
				</section>
			</div>
		</div>

		<div class="col-4">
			<div class="right-tab">
				<section class="row form-tambah" id="form-tambah">
					<div class="col-12 header-block">
						<h1 class="display-6 mr-auto">Tambah Bengkel</h1>
						<button class="navbar-toggler ml-auto closer btn-batal" type="button">
							<span class="bg-secondary"></span>
							<span class="bg-secondary"></span>
							<span class="bg-secondary"></span>
						</button>
					</div>
				
					<div class="col-12 p-0">
						<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('service_control/new_service');?>">
							<div class="form-group">
								<label for="nama_bengkel" class="col-form-label">Nama Bengkel</label>
								<input type="text" name="nama_bengkel" class="form-control" placeholder="" required="required">
							</div>
							<div class="form-group">
								<label for="alamat" class="col-form-label">Alamat</label>
								<input type="text" name="seri_sparepart" class="form-control" placeholder="" required="required">
							</div>
							<div class="form-group">
								<label for="no_telp" class="col-form-label">No Telp</label>
								<input type="text" name="no_telp" class="form-control" placeholder="" required="required">
							</div>
							<div class="form-group">
								<label for="upload[]" class="col-form-label">Gambar</label>
								<input type="file" name="upload[]" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Tambah</button>
								<button type="button" class="btn btn-danger btn-batal">Batal</button>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>