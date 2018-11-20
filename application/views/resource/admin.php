<?php $session = $this->access->session_data(); ?>
<div class="bg-darken pt-4">
	<section class="container" id="header">
		<div class="row">
			<h1 class="display-5 col-12 mb-4"> Administrator </h1>
			
			<ul class="nav nav-tabs navbar-expand-sm mr-auto">
 				<li class="nav-item">
 					<a class="nav-link active" href="<?php echo site_url($session['akses'].'/'); ?>">Dashboard</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/kategori/'); ?>">Kategori</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="#">Produk</a>
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
 			</ul>
 		</div>
	</section>
</div>