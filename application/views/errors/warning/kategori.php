<?php 
	$admin 	= $session['akses'];
	$k_nama = $kategori['nama_kategori'];
	$k_kode = $kategori['kode_kategori'];
?>

<main role="main" class="container">
	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
		<div class="lh-100">
			<h5 class="mb-0 display-5 text-white lh-100">Peringatan</h5>
		</div>
	</div>

	<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-white rounded box-shadow">
		<h6 class="text-muted text-center">Anda hendak menghapus kategori <?php echo $k_nama;?>, yang didalamnya berisi:</h6>
	</div>

<?php 
	foreach ($series as $dts) :
		$s_kode = $dts['kode_series'];
		$s_nama = $dts['nama_series'];
		$key_produk = array('produk.kode_series' => $s_kode);
		$produk 	= $this->crud_model->_all_produk($key_produk);
?>

	<div class="my-3 p-3 bg-white rounded box-shadow">
		<h6 class="border-bottom border-gray pb-2 mb-0">Series <?php echo $s_nama;?></h6>
	
	<?php
		if (! empty($produk)) { 
			foreach ($produk as $dtp) :
				$p_nama = $dtp['nama_produk'];
	?>
		
		<div class="media text-muted pt-3">
			<p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				<strong class="d-block text-gray-dark"><?php echo $p_nama;?></strong>
			</p>
		</div>

	<?php endforeach; } ?>
	
	</div>

<?php endforeach; ?>

	<div class="d-flex align-items-center p-3 my-3">
		<div class="lh-100">
			<a href="<?php echo site_url('kategori_control/delete_kategori/'.$k_kode.'/ok');?>" class="btn btn-danger">Tetap Hapus</a>
			<a href="<?php echo site_url($admin.'/kategori/');?>" class="btn btn-success">Batalkan</a>
		</div>
	</div>
</main>