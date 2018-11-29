<link href="<?php echo base_url('assets/vendor/lightslider/css/lightslider.min.css');?>" rel="stylesheet">
<section class="section" id="carousel">
	<ul id="slideGallery" class="slideGallery">
		<li><img class="img-fluid img-slide" src="<?php echo base_url('file/slider/sl-1.jpg');?>" /></li>
		<li><img class="img-fluid img-slide" src="<?php echo base_url('file/slider/sl-2.jpg');?>" /></li>
		<li><img class="img-fluid img-slide" src="<?php echo base_url('file/slider/sl-3.jpg');?>" /></li>
		<li><img class="img-fluid img-slide" src="<?php echo base_url('file/slider/sl-4.jpg');?>" /></li>
	</ul>
</section>
<div class="container">
	<div class="row">
		<div class="col-12" id="canvas">
			<div class="main-canvas">
				<section class="row catalogue" id="kategori">
					<div class="col-12">
						<font class="display-4 display">Kategori</font>
					</div>
			
				<?php foreach ($kategori as $c) : ?>

					<div class="col-sm-12 col-md-6 col-lg-4 card-item mb-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<img class="card-thumb card-thumb-sm my-auto" src="<?php echo $c['link_file'];?>">
									</div>
								
									<div class="col">
										<div class="full-wrap">
											<a href="#" class="link display-5 m-auto"><?php echo $c['nama_kategori'];?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				<?php endforeach; ?>
				
				</section>
			</div>
		</div>
	</div>
</div>