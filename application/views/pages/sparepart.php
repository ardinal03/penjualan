<div class="detail-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="d-flex">
					<h1 class="display-4 d-flex">Suku Cadang Toyota</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="detail-slider">
	<div class="container">
		<div class="row">

		<?php foreach ($sparepart as $data) : ?>

			<div class="col-sm-12 col-md-6 col-lg-3 mb-4 card-item">
				<div class="card">
					<div class="card-body pb-0">
						<div class="card-img-top">
							<img class="card-thumb card-thumb-sm" src="<?php echo $data['link_file'];?>">
						</div>
								
						<div class="card-section">
							<h4 class="display-5 text-center" style="font-size: 18px;"><?php echo $data['nama_sc'];?></h4>
						</div>
					</div>
					<a class="card-link link-primary" href="<?php echo site_url('sparepart/'.$data['kode_sc']);?>">Lihat Produk</a>
				</div>
			</div>
				
		<?php endforeach; ?>
		
		</div>
	</div>
</div>