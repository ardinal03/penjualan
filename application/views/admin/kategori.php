
<div class="container">
	<section class="row">
		<div class="col-12 header-block mb-4">
			<h1 class="display-6 mr-auto">Kategori</h1>
			<button class="btn btn-outline-primary btn-tambah">Tambah Kategori</button>
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
						<h1 class="display-6 mr-auto col-12">Tambah Kategori</h1>
					</div>
					<div class="form-group row">
						<label for="nama_kategori" class="col-3 col-form-label">Kategori</label>
						<input type="text" name="nama_kategori" class="form-control col-9" placeholder="" required="required">
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

	<section class="catalogue" id="produk">
		<div class="container">
			<div class="row">
				<div class="col-12">
				<?php foreach ($kategori as $c) : ?>
					<div class="row">
						<div class="card col-md-6 col-lg-4">
							<div class="row">
								<div class="col-5">
									<?php $link_img = base_url('file/produk/'.$c['nama_kategori'].'/'.$c['gambar_kategori']); ?>
									<img class="card-img img-fluid p-3" src="<?php echo $link_img;?>">
								</div>
								<div class="col-7">
									<div class="card-body">
									<a href="#" class="link"><h4 class="display-5">MVP</h4></a>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>