<section class="login-block">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-4 login-sec my-auto p-5">
				<h3 class="text-center mb-4">Login</h3>
				<?php echo $this->session->flashdata('msg'); ?>
				<form class="login-form" method="POST" action="<?php echo site_url('home_control/login_action');?>">
					<div class="form-group">
						<label for="username" class="col-form-label">Username</label>
						<input type="text" name="username" class="form-control" placeholder="" required="required">
					</div>
					<div class="form-group">
						<label for="password" class="col-form-label">Password</label>
						<input type="password" name="password" autocomplete="current-password" class="form-control" placeholder="" required="required">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary form-control">Masuk</button>
					</div>
				</form>
				<div class="dropdown-divider"></div>
				<div class="text-center">	
					<a href="<?php echo base_url();?>">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>