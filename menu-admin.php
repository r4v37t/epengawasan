<ul class="nav nav-list">
	<li class="<?php echo (!isset($_GET['page']))?'active':''; ?>">
		<a href="?">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>

	<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-bidang'||$_GET['page']=='ref-desa'||$_GET['page']=='ref-rekanan'))?'active open':''; ?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-book"></i>
			<span class="menu-text">
				Referensi
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">

			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-bidang'))?'active open':''; ?>">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Bidang/Program/Kegiatan
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-bidang'))?'active':''; ?>">
						<a href="?page=ref-bidang">
							<i class="menu-icon fa fa-eye pink"></i>
							Lihat
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			
			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Kecamatan dan Kelurahan/Desa
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="?page=ref-desa&aksi=tambah">
							<i class="menu-icon fa fa-plus purple"></i>
							Tambah
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="?page=ref-desa">
							<i class="menu-icon fa fa-eye pink"></i>
							Lihat
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			
			<li class="">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Rekanan
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="">
						<a href="?page=ref-rekanan&aksi=tambah">
							<i class="menu-icon fa fa-plus purple"></i>
							Tambah
						</a>

						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="?page=ref-rekanan">
							<i class="menu-icon fa fa-eye pink"></i>
							Lihat
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	
	<li class="">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-users"></i>
			<span class="menu-text">
				Pengguna
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="">
				<a href="?page=pengguna&aksi=tambah">
					<i class="menu-icon fa fa-caret-right"></i>
					Tambah
				</a>

				<b class="arrow"></b>
			</li>

			<li class="">
				<a href="?page=pengguna">
					<i class="menu-icon fa fa-caret-right"></i>
					Lihat
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>	
</ul><!-- /.nav-list -->