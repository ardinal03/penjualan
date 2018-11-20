<header class="container">
	<div class="row">
		<nav class="col-12 navbar navbar-expand-md navbar-light fixed-top p-4 bg-white">
 			<div class="mr-auto">
 				
	 		<?php
	 			$session = $this->access->session_data();
	 			if (empty($session)) {
					$link = site_url('home_control/login/');
					echo '<a href="'.$link.'" role="button" class="btn btn-outline-primary">Login</a>';
				} 
				else {
					$link = site_url($session['akses'].'/');
					echo '<a href="'.$link.'">Menu</a>';
				}
			?>
			</div>

			<button class="navbar-toggler collapsed ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span> </span>
				<span> </span>
				<span> </span>
			</button>


 			<div class="collapse navbar-collapse" id="navbarCollapse">
 				<ul class="navbar-nav ml-auto">
 					<li class="nav-item active">
 						<a class="nav-link" href="<?php echo base_url(); ?>">Beranda</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="#">Produk</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="#">Daftar Harga</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="#">Sparepart</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="#">Service</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" href="#">Kontak</a>
 					</li>
 					<li class="nav-item">
 						<a class="nav-link" id="btn-search" href="javascript:void(0);">Pencarian</a>
 					</li>
 				</ul>
 			</div>
 		</nav>
	</div>
</header>

<section class="overlay-tab search-tab">
	<div class="d-flex">
		<button class="navbar-toggler ml-auto closer" type="button" id="close-search">
			<span class="bg-secondary"></span>
			<span class="bg-secondary"></span>
			<span class="bg-secondary"></span>
		</button>
	</div>
	
	<div class="container overlay-wrapper">
		<div class="row">
			<form class="col-12" action="" method="GET">
				<h1 class="display-3 text-white"> Pencarian: </h1>
				<div class="form-group">
					<div class="input-group">
						<input type="text" name="keyword" required="required" class="form-control">
						<div class="input-group-append">
							<button type="submit" class="btn btn-primary">Cari</button>
						</div>
					</div> 
				</div>
			</form>
		</div>
	</div>
</section>
<div class="wrapper"></div>