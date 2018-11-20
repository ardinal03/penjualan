<div class="container">
	<section class="row">
		<div class="col-12 header-block mb-4">
			<h1 class="display-6 mr-auto">Produk</h1>
			<button class="btn btn-outline-primary btn-tambah">Tambah Produk</button>
		</div>
	</section>

	<section class="form-tambah overlay-tab" id="form-tambah">
		<div class="d-flex">
			<button class="navbar-toggler ml-auto closer btn-batal" type="button">
				<span class="bg-secondary"></span>
				<span class="bg-secondary"></span>
				<span class="bg-secondary"></span>
			</button>
		</div>

		<div class="container overlay-wrapper">
			<div class="row justify-content-center">
				<form class="col-6 form-box" enctype="multipart/form-data" method="POST" action="<?php echo site_url('kategori_control/new_kategori');?>">
					<div class="header-block row py-2 mb-3">
						<h1 class="display-6 mr-auto col-12">Tambah Produk</h1>
					</div>
					<div class="form-group row">
						<label for="kode_produk" class="col-3 col-form-label">Kode Produk</label>
						<input type="text" name="kode_kategori" class="form-control col-9" placeholder="" required="required">
					</div>
					<div class="form-group row">
						<label for="nama_produk" class="col-3 col-form-label">Nama Produk</label>
						<input type="text" name="nama_kategori" class="form-control col-9" placeholder="" required="required">
					</div>
					<div class="form-group row">
						<label for="series" class="col-3 col-form-label">Series</label>
						<input type="text" name="series" class="form-control col-9" placeholder="" required="required">
					</div>
					<div class="form-group row">
						<label for="kode_kategori" class="col-3 col-form-label">Kode Kategori</label>
						<input type="text" name="kode_kategori" class="form-control col-9" placeholder="" required="required">
					</div>
					<div class="form-group row">
						<label for="type" class="col-3 col-form-label">Type</label>
						<input type="text" name="type" class="form-control col-9" placeholder="" required="required">
					</div>
					<div class="form-group row">
						<label for="harga" class="col-3 col-form-label">Harga</label>
						<input type="text" name="harga" class="form-control col-9" placeholder="" required="required">
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-3 col-form-label">Keterangan</label>
						<textarea cols="54" rows="3" name="keterangan" class="form-control col-9" placeholder="" required="required"></textarea>
					</div>
					<div class="form-group row">
						<label for="warna" class="col-3 col-form-label">Warna</label>
						<input type="text" name="warna" class="form-control col-9" placeholder="" required="required">

					</div>
					<div class="form-group row">
						<label for="upload[]" class="col-3 col-form-label">Gambar</label>
						<input type="file" name="upload[]" class="form-control col-9"  placeholder="">
					</div>
					<div class="form-group row justify-content-end">
						<button type="button" class="btn btn-danger form-control col-3 btn-batal mr-1">Batal</button>
						<button type="submit" class="btn btn-primary form-control col-3">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</section>
