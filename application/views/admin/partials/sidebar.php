<?php
$segment2 = $this->uri->segment(2);
?>

<div class="main-panel">
<div class="sidebar" data-background-color="dark">
	<div class="sidebar-logo">
		<!-- Logo Header -->
		<div class="logo-header" data-background-color="white">
			<a href="index.html" class="logo">
				<img src="<?= base_url('assets/backend/') ?>img/logo.png" alt="navbar brand" class="navbar-brand" height="50" />
			</a>
			<div class="nav-toggle">
				<button class="btn btn-toggle toggle-sidebar">
					<i class="gg-menu-right"></i>
				</button>
				<button class="btn btn-toggle sidenav-toggler">
					<i class="gg-menu-left"></i>
				</button>
			</div>
			<button class="topbar-toggler more">
				<i class="gg-more-vertical-alt"></i>
			</button>
		</div>
		<!-- End Logo Header -->
	</div>
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<ul class="nav nav-secondary">
				<!-- menu dashboard -->
				<li class="nav-item <?= $segment2 == '' ? 'active' : '' ?>">
					<a href="<?= site_url('dashboard') ?>" class="nav-item">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<!-- menu Master -->
				<li class="nav-item <?= $segment2 == 'master' ? 'active' : '' ?>">
					<a data-bs-toggle="collapse" href="#master">
					<i class="	fas fa-bars"></i>
						<p>Master</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="master">
						<ul class="nav nav-collapse">
							<li>
								<a href="<?= site_url('admin/master/users') ?>">
									<span class="sub-item">User</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/master/student') ?>" class="nav-item">
								<span class="sub-item">Siswa</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/master/class') ?>" class="nav-item">
								<span class="sub-item">Kelas</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/master/major') ?>" class="nav-item">
								<span class="sub-item">Jurusan</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/master/file_type') ?>" class="nav-item">
								<span class="sub-item">Jenis File</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/master/exam_type') ?>" class="nav-item">
								<span class="sub-item">Jenis Ujian</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<!-- menu File Siswa -->
				<li class="nav-item <?= $segment2 == 'student_file' ? 'active' : '' ?>">
					<a href="<?= site_url('admin/student_file') ?>" class="nav-item">
						<i class="fas fa-book"></i>
						<p>File Siswa</p>
					</a>
				</li>

				<!-- menu Galeri -->
				<li class="nav-item <?= $segment2 == 'gallery' ? 'active' : '' ?>">
					<a href="<?= site_url('admin/gallery') ?>" class="nav-item">
						<i class="fas fa-images"></i>
						<p>Galeri</p>
					</a>
				</li>

				<!-- menu news -->
				<li class="nav-item <?= $segment2 == 'news' ? 'active' : '' ?>">
					<a href="<?= site_url('admin/news') ?>" class="nav-item">
						<i class="fas fa-newspaper"></i>
						<p>Berita</p>
					</a>
				</li>

				<!-- menu pengumuman -->
				<li class="nav-item <?= $segment2 == 'announcement' ? 'active' : '' ?>">
					<a data-bs-toggle="collapse" href="#announcement">
					<i class="	fas fa-bullhorn"></i>
						<p>Pengumuman</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="announcement">
						<ul class="nav nav-collapse">
							<li>
								<a href="<?= site_url('admin/announcement?type=private') ?>">
									<span class="sub-item">Channel Private</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/announcement?type=public') ?>">
									<span class="sub-item">Channel Public</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<!-- menu roles -->
				<li class="nav-item <?= $segment2 == 'roles' ? 'active' : '' ?>">
					<a data-bs-toggle="collapse" href="#roles">
						<i class="fas fa-lock"></i>
						<p>Hak Akses</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="roles">
						<ul class="nav nav-collapse">
							<li>
								<a href="<?= site_url('admin/roles') ?>">
									<span class="sub-item">Role</span>
								</a>
							</li>
							<li>
								<a href="<?= site_url('admin/permissions') ?>">
									<span class="sub-item">Permission</span>
								</a>
							</li>
						</ul>
					</div>
				</li>

				<!-- menu settings -->
				<li class="nav-item">
					<a data-bs-toggle="collapse" href="#submenu">
						<i class="fas fa-bars"></i>
						<p>Menu Levels</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-bs-toggle="collapse" href="#subnav1">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav1">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a data-bs-toggle="collapse" href="#subnav2">
									<span class="sub-item">Level 1</span>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li>
											<a href="#">
												<span class="sub-item">Level 2</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li>
								<a href="#">
									<span class="sub-item">Level 1</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>