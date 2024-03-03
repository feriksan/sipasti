<body>
	<!-- BEGIN #loader -->
	{{-- <div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div> --}}
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed ">
		<!-- BEGIN #header -->
		<div id="header" class="app-header">
			<!-- BEGIN navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"><ion-icon name="cloud"></ion-icon></span> <b class="me-1">e-SIPASTI</b></a>
				<button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- END navbar-header -->

			<!-- BEGIN header-nav -->
			<div class="navbar-nav">
				<div class="navbar-item navbar-user dropdown">
					<a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
						<img src="{{ asset('uploads') }}/foto_user/{{ Auth::user()?->foto_user }}" alt="" /> 
						<span>
							<span class="d-none d-md-inline">{{ Auth::user()?->nama }}</span>
							<b class="caret"></b>
						</span>
					</a>
					<div class="dropdown-menu dropdown-menu-end me-1">
					<a href="http://127.0.0.1:8181/monitoring" class="dropdown-item">Accounting</a>
						<a href="/profil/{{ Auth::user()?->kode_user }}" class="dropdown-item">Lihat Profil</a>
						<a href="/password/{{ Auth::user()?->kode_user }}" class="dropdown-item">Ubah Password</a>
						<a href="/logout" class="dropdown-item">Keluar</a>
					</div>
				</div>
			</div>
			<!-- END header-nav -->
		</div>
		<!-- END #header -->