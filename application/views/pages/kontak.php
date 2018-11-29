<div class="detail-produk bg-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-12">
				<div class="produk-header">
					<h2 class="header-small">Kontak</h2>
					<h3 class="header-big">Costumer Support</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="container">

	<?php foreach ($kontak as $data) : ?>

		<div class="row my-4 spec-content" style="display: block;">
			<div class="col-lg-12 col-12">
				<div class="header">
					<h4 class="header-small" style="color: var(--primary);"><?php echo $data['nama_bengkel'];?></h4>
				</div>

				<div class="row">
					<div class="col-lg-3 col-12">
						<div class="content">
							<p class="service-font"><i class="fas fa-phone-square fa-fw"></i> <?php echo $data['no_telp'];?></p>
						</div>
					</div>
							
					<div class="col-lg-9 col-12">
						<div class="content">
							<p class="service-font"><i class="fab fa-servicestack fa-fw"></i> <?php echo $data['alamat'];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr>

	<?php endforeach;?>
	
	</div>
</div>