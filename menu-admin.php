<ul class="nav nav-list">
	<li class="<?php echo (!isset($_GET['page']))?'active':''; ?>">
		<a href="?">
			<i class="menu-icon fa fa-tachometer"></i>
			<span class="menu-text"> Dashboard </span>
		</a>

		<b class="arrow"></b>
	</li>
	
	<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-paket'||$_GET['page']=='ref-progres'))?'active open':''; ?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-book"></i>
			<span class="menu-text">
				Data Pekerjaan
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">

			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-paket'))?'active open':''; ?>">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Paket Pekerjaan
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-paket')&&(isset($_GET['daftar'])))?'active':''; ?>">
						<a href="?page=ref-paket&daftar">
							<i class="menu-icon fa fa-list-alt green"></i>
							Daftar Paket
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-paket')&&(isset($_GET['data'])))?'active':''; ?>">
						<a href="?page=ref-paket&data">
							<i class="menu-icon fa fa-file-text green"></i>
							Data Kontrak
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			
			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-progres'))?'active open':''; ?>">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Progres Pekerjaan
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-progres')&&(isset($_GET['data'])))?'active':''; ?>">
						<a href="?page=ref-progres&data">
							<i class="menu-icon fa fa-line-chart green"></i>
							Data Progres
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-progres')&&(isset($_GET['foto'])))?'active':''; ?>">
						<a href="?page=ref-progres&foto">
							<i class="menu-icon fa fa-photo green"></i>
							Data Foto
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-progres')&&(isset($_GET['foto'])))?'active':''; ?>">
						<a href="?page=ref-progres&film">
							<i class="menu-icon fa fa-film green"></i>
							Data Video
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-progres')&&(isset($_GET['foto'])))?'active':''; ?>">
						<a href="?page=ref-progres&map">
							<i class="menu-icon fa fa-map green"></i>
							Peta
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
		</ul>
	</li>
	
	<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-bidang'||$_GET['page']=='ref-desa'||$_GET['page']=='ref-rekanan'))?'active open':''; ?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-cogs"></i>
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
			
			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-desa'))?'active open':''; ?>">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Kecamatan dan Kelurahan/Desa
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-desa'))?'active':''; ?>">
						<a href="?page=ref-desa">
							<i class="menu-icon fa fa-eye pink"></i>
							Lihat
						</a>

						<b class="arrow"></b>
					</li>
				</ul>
			</li>
			
			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-rekanan'))?'active open':''; ?>">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-caret-right"></i>
					Rekanan
					<b class="arrow fa fa-angle-down"></b>
				</a>

				<b class="arrow"></b>
				<ul class="submenu">
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-rekanan')&&(isset($_GET['add'])||isset($_GET['edit'])))?'active':''; ?>">
						<a href="?page=ref-rekanan&add">
							<i class="menu-icon fa fa-plus purple"></i>
							Tambah
						</a>

						<b class="arrow"></b>
					</li>
					<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='ref-rekanan')&&((!isset($_GET['add'])&&!isset($_GET['edit']))))?'active':''; ?>">
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
	
	<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='pengguna'))?'active open':''; ?>">
		<a href="#" class="dropdown-toggle">
			<i class="menu-icon fa fa-users"></i>
			<span class="menu-text">
				Pengguna
			</span>

			<b class="arrow fa fa-angle-down"></b>
		</a>

		<b class="arrow"></b>

		<ul class="submenu">
			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='pengguna')&&(isset($_GET['add'])||isset($_GET['edit'])))?'active':''; ?>">
				<a href="?page=pengguna&add">
					<i class="menu-icon fa fa-caret-right"></i>
					Tambah
				</a>

				<b class="arrow"></b>
			</li>

			<li class="<?php echo (isset($_GET['page'])&&($_GET['page']=='pengguna')&&((!isset($_GET['add'])&&!isset($_GET['edit']))))?'active':''; ?>">
				<a href="?page=pengguna">
					<i class="menu-icon fa fa-caret-right"></i>
					Lihat
				</a>

				<b class="arrow"></b>
			</li>
		</ul>
	</li>	
</ul><!-- /.nav-list -->