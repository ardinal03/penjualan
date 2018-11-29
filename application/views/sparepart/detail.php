<link href="<?php echo base_url('assets/vendor/lightslider/css/lightslider.min.css');?>" rel="stylesheet">

<div class="detail-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="d-flex">
					<h1 class="display-4 d-flex"><?php echo $sparepart['nama_sc'];?></h1>
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
					<ul id="spareGallery" class="spareGallery">
					
					<?php foreach ($file as $img) : ?>
					
						<li class="lS-spare" data-thumb="<?php echo $img['link_file']; ?>" data-img="<?php echo $img['link_file']; ?>">
							<img class="img-fluid img-slide" src="<?php echo $img['link_file']; ?>" style="height: 300px;"/>
						</li>
					
					<?php endforeach;?>
					
					</ul>
				</section>
			</div>
		</div>
	</div>
</div>

<div class="detail-produk">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="produk-header">
					<h2 class="header-small">Sparepart</h2>
					<h3 class="header-big"><?php echo $sparepart['nama_sc'];?></h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row mb-5 spec-content" style="display: block;">
			<div class="col-lg-12 col-12">
				<div class="spec-list">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="header">
								<h5 class="title">Keterangan</h5>
							</div>
							<div class="content">
								<p><?php echo $sparepart['keterangan'];?></p>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="header">
								<h5 class="title">Harga</h5>
							</div>
							<div class="content">
								<p style="font-size: 24px; font-weight: 300;">IDR. <?php echo number_format($sparepart['harga']);?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>