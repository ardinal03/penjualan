<div class="container">
	<section class="row" id="header">
		<div class="main-canvas">
			<?php echo $this->session->flashdata('msg'); ?>
			<div class="col-12 header-block mb-2">
				<h1 class="display-6 mr-auto">Kotak Masuk</h1>
			</div>
		</div>
	</section>

	<?php foreach ($ulasan as $dtu) : ?>
		<div class="row mb-2">
			<div class="col-lg-12 col-12">
				<div class="kontak-desc bg-kontak">
					<div class="kontak-pos row">
						<div class="col-lg-4 col-12">
							<div class="kontak-section d-flex">
								<h4 class="header-small m-0"><?php echo $dtu['nama'];?> </h4>
								<section class="rating-block m-0">
									<ul id="stars">
											
							<?php
								$ratings = array('1','2','3','4','5');
								$i =1;
								foreach ( $ratings as $rating) {
									$selected = ( $dtu['rating'] >= $i)?'selected':'';
									echo "<li class='star rating-disabled ".$selected."' data-value='".$i++."'><i class='fa fa-star fa-fw small-star'></i></li>";
								}
							?>

									</ul>
								</section>
							</div>
							<div class="kontak-section m-0">
								<p class="kontak-text m-0"><?php echo $dtu['email'];?></p>
							</div>

							<div class="kontak-section m-0">
								<p class="kontak-text m-0"><?php echo time_ago($dtu['ditambahkan']);?></p>
							</div>
						</div>


						<div class="col-12 col-lg-8">
							<div class="kontak-section">
								<h4 class="header-small">Deskripsi</h4>
							</div>
							<div class="kontak-section d-flex my-auto">
								<p class="m-0" style="font-weight: 500;">Customer</p>
								<p class="kontak-text ml-1 mb-0"><?php echo $dtu['nama_kontak'];?></p>

								<ul class="list-inline ml-auto my-auto">
									<li class="list-inline-item">
										<a href="javascript:void(0);" class="text-danger deleteBtn" data-id="<?php echo $dtu['kode_ulasan'];?>" data-nama="<?php echo $dtu['nama'];?>">Hapus</a>
									</li>
								</ul>
							</div>
							<hr/>
							<div class="kontak-section">
								<p class="kontak-text m-0"><?php echo $dtu['deskripsi'];?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach;?>
</div>
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="modal-title"><strong>Konfirmasi Hapus Ulasan</strong></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			
			<div class="modal-body">
				
			</div>
			
			<div class="modal-footer">
				<a id="deleteLink" href="">
					<button type="submit" class="btn btn-outline-danger"> Hapus</button>
				</a>
				<button type="button" class="btn btn-outline-success" data-dismiss="modal">Batalkan</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
$('.deleteBtn').click(function() {
	var id 	 = $(this).data('id');
	var nama = $(this).data('nama');
	var link = '<?php echo site_url('ulasan_control/delete_ulasan/');?>' + id;
	$('.modal-body').html('Apakah anda yakin akan menghapus ulasan dari: '+nama+'?');
	$('#deleteLink').attr('href', link);
	$('#delete_modal').modal('show');
});

</script>