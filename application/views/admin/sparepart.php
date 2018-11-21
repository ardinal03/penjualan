<div class="container">
	<div class="row">
		<div class="col-12" id="canvas">
			<div class="main-canvas">
				<section class="row main-canvas">	
					<div class="col-12 header-block mb-4">
						<h1 class="display-6 mr-auto">Sparepart</h1>
						<button class="btn btn-outline-primary btn-tambah">Tambah Sparepart</button>
					</div>
				</section>
			</div>
		</div>

		<div class="col-4">
			<div class="right-tab">
				<section class="row form-tambah" id="form-tambah">
					<div class="col-12 header-block">
						<h1 class="display-6 mr-auto">Tambah Sparepart</h1>
						<button class="navbar-toggler ml-auto closer btn-batal" type="button">
							<span class="bg-secondary"></span>
							<span class="bg-secondary"></span>
							<span class="bg-secondary"></span>
						</button>
					</div>
				
					<div class="col-12 p-0">
						<form class="form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('sparepart_control/new_sparepart');?>">
							<div class="form-group">
								<label for="nama_sparepart" class="col-form-label">Nama Sparepart</label>
								<input type="text" name="nama_sparepare" class="form-control" placeholder="" required="required">
							</div>
							<div class="form-group">
								<label for="seri_sparepart" class="col-form-label">Seri Sparepart</label>
								<input type="text" name="seri_sparepart" class="form-control" placeholder="" required="required">
							</div>
							<div class="form-group">
								<label for="harga" class="col-form-label">Harga</label>
								<input type="text" name="harga" class="form-control" placeholder="" required="required">
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