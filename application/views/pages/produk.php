<link href="<?php echo base_url('assets/vendor/lightslider/css/lightslider.min.css');?>" rel="stylesheet">

<div class="detail-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="d-flex">
					<h1 class="display-4 d-flex"><?php echo $series['nama_series'];?></h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="detail-slider">
	<div class="container">
		<div class="row">	
			<div class="col-lg-12 col-12">
				<section class="section" id="carousel">
					<ul id="produkSlide" class="produkSlide">
					
					<?php foreach ($file as $img) : ?>
					
						<li data-thumb="<?php echo $img['link_file']; ?>" data-img="<?php echo $img['link_file']; ?>">
							<img class="img-fluid img-slide" src="<?php echo $img['link_file']; ?>" />
						</li>
					
					<?php endforeach;?>
					
					</ul>
				</section>
			</div>
		</div>
	</div>
</div>

<div class="detail-subheader">
	<div class="bg-dark text-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-12">
					<div class="d-block">
						<h2 class="display-5">Varian Warna</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-12">
				<p class="color-text my-4"><?php echo $series['warna']; ?></p>
			</div>
		</div>
	</div>
</div>

<div class="detail-produk">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="produk-header">
					<h2 class="header-small">Produk</h2>
					<h3 class="header-big"><?php echo $series['nama_series'];?></h3>
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

						<?php foreach ($produk as $p) : ?>
						
							<li class="nav-item produk-link">
								<a class="nav-link" id="<?php echo $p['kode_produk'];?>"><?php echo $p['nama_produk'];?></a>
							</li>
							
						<?php endforeach; ?>

						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="produk-spec">
		
	<?php 
		if (! empty($produk)) { 
			foreach ($produk as $p) :
	?>
			<div class="row mb-5 spec-content">
				<div class="col-lg-12 col-12">
					<div class="spec-list <?php echo $p['kode_produk'];?> ">
						<div class="row">
							<div class="col-lg-8 col-12">
								<div class="header">
									<h5 class="title">Keterangan</h5>
								</div>
								<div class="content">
									<p><?php echo $p['keterangan'];?></p>
								</div>
							</div>
							<div class="col-lg-4 col-12">
								<div class="header">
									<h5 class="title">Harga</h5>
								</div>
								<div class="content">
									<p style="font-size: 24px; font-weight: 300;">IDR. <?php echo number_format($p['harga']);?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

	<?php endforeach; } ?>

		</div>
	</div>
</div>