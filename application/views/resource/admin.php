<?php $session = $this->access->session_data(); ?>
<div class="bg-darken pt-4">
	<section class="container">
		<div class="row">
			<h1 class="display-5 col-12 mb-4"> Administrator </h1>
			
			<ul class="nav nav-tabs navbar-expand-sm mr-auto" id="header">
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/kontak/'); ?>">Kontak</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/kategori/'); ?>">Kategori</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/series/'); ?>">Series</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/produk/'); ?>">Produk</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/sparepart/'); ?>">Sparepart</a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="<?php echo site_url($session['akses'].'/service/'); ?>">Service</a>	
 				</li>
 			</ul>
 		</div>
	</section>
</div>