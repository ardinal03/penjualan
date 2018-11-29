<?php
	$admin 	= $session['akses'];
	$s_nama = $series['nama_series'];
	$s_kode = $series['kode_series'];
?>

<main role="main" class="container">
	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
		<div class="lh-100">
			<h5 class="mb-0 display-5 text-white lh-100">Peringatan</h5>
		</div>
	</div>

	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-white rounded box-shadow">
		<h6 class="text-muted text-center">Anda hendak menghapus series <?php echo $s_nama;?>, yang didalamnya berisi:</h6>
	</div>

<?php 
	$key_produk		= array('produk.kode_series' => $s_kode);
	$produk 		= $this->crud_model->_all_produk($key_produk);
		if (! empty($produk)) { 
?>

	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">Produk <?php echo $s_nama;?></h6>
	
	<?php foreach ($produk as $data) : ?>
		
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				<strong class="d-block text-gray-dark"><?php echo $data['nama_produk'];?></strong>
			</p>
		</div>

	<?php endforeach; ?>
	
	</div>

<?php } ?>

	<div class="d-flex align-items-center p-3 my-3">
		<div class="lh-100">
			<a href="<?php echo site_url('series_control/delete_series/'.$s_kode.'/ok');?>" class="btn btn-danger">Tetap Hapus</a>
			<a href="<?php echo site_url($admin.'/series/');?>" class="btn btn-success">Batalkan</a>
		</div>
	</div>
</main>