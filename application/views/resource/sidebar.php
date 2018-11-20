<div class="container-fluid" id="wrapper">
	<div class="row">
		<nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">			
			<div class="sidebar-nav navbar-expand-lg" id="sidebar-nav">
				<ul class="nav nav-pills flex-column sidebar-menu">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('admin_control/'); ?>">Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="toggle-menu nav-link" href="javascript:void(0);">Pegawai </a>
						<ul class="nav nav-pills flex-column sidebar-tree">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin_control/form_input_pegawai/'); ?>">Input Pegawai</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin_control/view_pegawai/'); ?>">Lihat Data Pegawai</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link toggle-menu" href="javascript:void(0);">Pos Gatur </a>
						<ul class="nav nav-pills flex-column sidebar-tree">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin_control/form_input_pos/'); ?>">Input Pos Gatur</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin_control/view_pos/'); ?>">Lihat Data Pos Gatur</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link toggle-menu" href="javascript:void(0);">Rekap Absen </a>
						<ul class="nav nav-pills flex-column sidebar-tree">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin_control/form_input_absen/'); ?>">Absen Pegawai</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin_control/view_absen/'); ?>">Lihat Data Absen</a>
							</li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo site_url('admin_control/view_user/'); ?>">Pengguna </a>
					</li>

					<li class="nav-item mb-3">
						<a class="nav-link" href="<?php echo site_url('prop_control/index/'); ?>">Laporan </a>
					</li>

					<li class="nav-item">
						<a href="<?php echo site_url('home_control/logout'); ?>" class="nav-link">Logout</a>
					</li>
				</ul>
			</div>
			
			
		</nav>
	</div>
</div>