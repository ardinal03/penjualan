<?php 
	$ctg = $this->crud_model->_all_kategori();
	$session = $this->access->session_data();
?>

<nav class="navbar navbar-expand-lg">
	<div class="container">
		<div class="navbar-top">
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('file/source/logo.png');?>" class="image-fluid navbar-logo"></a>

			<div class="burger-pos">
				<button class="nav-link navbar-toggler collapsed mg-open">
					<span> </span>
					<span> </span>
					<span> </span>
				</button>
			</div>
		</div>
	</div>
</nav>

		
<div class="mega-menu" id="mega-menu">
	<div class="mega-wrapper"></div>
	<div class="mega-closer">
		<button class="navbar-toggler ml-auto closer mg-close" type="button">
			<span class="bg-secondary"></span>
			<span class="bg-secondary"></span>
			<span class="bg-secondary"></span>
		</button>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="mega-header">
					<h1 class="display-5 nav-display">Mobil</h1>
					<ul class="nav mega-nav">
					
					<?php foreach ($ctg as $key_c): ?>
					
						<li class="nav-item catlink" id="<?php echo $key_c['nama_kategori'];?>">
							<a class="nav-link" href="javascript:void(0);"><?php echo $key_c['nama_kategori'];?></a>
						</li>
					
					<?php endforeach;?>
					
					</ul>
				</div>

				<div class="mega-content">

				<?php foreach ($ctg as $key_c): ?>

					<div class="row <?php echo $key_c['nama_kategori'];?>" style="display: none;">
				
				<?php  
						$where = array('series.kode_kategori' => $key_c['kode_kategori']);
						$srs = $this->crud_model->_all_series($where);
						foreach ($srs as $key_s):
							$index = str_replace(' ', '-', $key_s['nama_series']);
				?>
						
						<div class="col-6 col-sm-6 col-lg-3">
							<a class="mega-link" href="<?php echo site_url('produk/'.$index);?>">
								<img src="<?php echo $key_s['link_file']; ?>" class="img-fluid mega-thumb">
								<p class="mega-series"><?php echo $key_s['nama_series'];?></p>
							</a>
						</div>
				
				<?php endforeach; ?>

					</div>

				<?php endforeach; ?>
					
				</div>
			</div>
		</div>
	</div>
	<div class="mega-wrapper"></div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-12">
				<div class="mega-header">
					<h1 class="display-5 nav-display">Navigasi</h1>
					<ul class="nav mega-nav">
						<li class="nav-item othlink">
							<a class="nav-link" href="<?php echo site_url('sparepart/');?>">Sparepart</a>
						</li>
						<li class="nav-item othlink">
							<a class="nav-link" href="<?php echo site_url('service/');?>">Service</a>
						</li>
						<li class="nav-item othlink">
							<a class="nav-link" href="<?php echo site_url('kontak/');?>">Kontak</a>
						</li>
						<li class="nav-item othlink">
						<?php
							if (empty($session)) {
								$link = site_url('home_control/login/');
								echo '<a href="'.$link.'" class="nav-link">Login</a>';
							} 
							else {
								$link = site_url($session['akses'].'/kontak/');
								echo '<a class="nav-link" href="'.$link.'">Menu</a>';
							}
						?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
