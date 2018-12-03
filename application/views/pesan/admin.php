<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Kotak Masuk</h1>
			</div>
		</div>
	</section>

	<div class="row" style="display: block;">
		<div class="main-canvas">

	<?php foreach ($pesan as $data) : ?>

			<div class="col-lg-12 col-12">
				<div class="header">
					<h4 class="header-small d-inline-block"><?php echo $data['nama'];?></h4>
					<span class="float-right"><?php echo time_ago($data['ditambahkan']);?></span>
				</div>
				<div class="content">
					<p class="service-font d-inline-block m-0"><i class="fas fa-phone-square fa-fw"></i> <?php echo $data['no_telp'];?></p>
					<a class="float-right text-primary" href="<?php echo site_url($session['akses'].'/pesan/'.$data['kode_pesan'].'/');?>">Lihat</a>
				</div>
			</div>
			<hr>

	<?php endforeach;?>
		
		</div>
	</div>
</div>