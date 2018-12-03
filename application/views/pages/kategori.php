<div class="detail-produk bg-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="produk-header">
					<h2 class="header-small">Kategori</h2>
					<h3 class="header-big"><?php echo $kategori;?></h3>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="detail-slider mt-0">
	<div class="container">
		<div class="row">

		<?php 
			foreach ($series as $data) : 
				$index = str_replace(' ', '-', $data['nama_series']);
		?>

			<div class="col-sm-12 col-md-6 col-lg-3 mb-4 card-item">
				<div class="card">
					<div class="card-body pb-0">
						<div class="card-img-top">
							<img class="card-thumb card-thumb-md" src="<?php echo $data['link_file'];?>">
						</div>
								
						<div class="card-section">
							<h4 class="header-small text-center" style="font-size: 18px;"><?php echo $data['nama_series'];?></h4>
						</div>
					</div>
					<a class="card-link link-primary" href="<?php echo site_url('produk/'.$index);?>">Lihat Produk</a>
				</div>
			</div>
				
		<?php endforeach; ?>
		</div>
	</div>
</div>