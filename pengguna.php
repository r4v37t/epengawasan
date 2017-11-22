<?php
//rekanan
if(isset($_POST['add'])){
	$idbidang=$_POST['bidang'];
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$akses=$_POST['akses'];
	$q=mysql_query("insert into user values('$username',$idbidang,'$nama','$password','$akses')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=pengguna';</script><?php
}
if(isset($_POST['edit'])){
	$idbidang=$_POST['bidang'];
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$akses=$_POST['akses'];
	$q=mysql_query("update user set nama='$nama',password='$password' where username='$username'");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=pengguna';</script><?php
}
if(isset($_GET['del'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from user where username='$id'");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=pengguna';</script><?php
}

?>
<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>
			<li class="active">Dashboard</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<?php
				if(isset($_GET['add'])){
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Pengguna</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Pengguna</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<?php
									if(!isset($_GET['next'])){
									?>
										<form method="get">
											<input type="hidden" name="page" value="pengguna" />
											<div>
												<label for="form-field-select-3">Nama Pengguna</label>
												<br />
												<input type="text" id="form-field-1" name="nama" value="<?php echo (isset($_GET['nama']))?$_GET['nama']:''; ?>" placeholder="Nama Pengguna" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Username</label>
												<br />
												<input type="text" id="form-field-1" name="username" value="<?php echo (isset($_GET['username']))?$_GET['username']:''; ?>" placeholder="Username" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Hak Akses</label>
												<br />
												<select name="akses" class="chosen-select form-control" onchange="this.form.submit()" id="form-field-select-3" data-placeholder="Pilih Akses ...">
													<option value="">  </option>
													<option value="kpa">KPA</option>
													<option value="pptk">PPTK</option>
													<option value="pengawas">Pengawas</option>
													<option value="rekanan">Rekanan</option>
													<option value="admin">Administrator</option>
												</select>
											</div>
											<input type="hidden" name="add" />
											<input type="hidden" name="next" />
										</form>
									<?php
									}else{
										$nama=$_GET['nama'];
										$username=$_GET['username'];
										$akses=$_GET['akses'];
									?>
										<form method="post">
											<div>
												<label for="form-field-select-3">Nama Pengguna</label>
												<br />
												<input type="text" id="form-field-1" name="nama" value="<?php echo $nama; ?>" readonly class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Username</label>
												<br />
												<input type="text" id="form-field-1" name="username" value="<?php echo $username; ?>" readonly class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Hak Akses</label>
												<br />
												<input type="text" id="form-field-1" name="akses" value="<?php echo $akses; ?>" readonly class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Password</label>
												<br />
												<input type="password" id="form-field-1" name="password" placeholder="Password" class="form-control" />
											</div>
											<?php
											if($akses=='kpa'||$akses=='admin'){
											?>
											<div>
												<label for="form-field-select-3">Sub Bidang</label>
												<br />
												<select name="bidang" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Sub Bidang ...">
													<?php
													if($_SESSION['bidang']==0){
														?><option value="">  </option><?php
														$q=mysql_query("select * from ref_bidang");
														while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idbidang']; ?>"><?php echo $h['nmbidang']; ?></option>
													<?php
														}
													}else{
														$q=mysql_query("select * from ref_bidang where idbidang=$_SESSION[bidang]");
														$h=mysql_fetch_array($q);
														?>
														<option value="<?php echo $h['idbidang']; ?>"><?php echo $h['nmbidang']; ?></option>
														<?php
													}
													?>
												</select>
											</div>
											<?php
											}else if($akses=='pptk'||$akses=='pengawas'){
											?>
											<div>
												<label for="form-field-select-3">Data Pekerjaan</label>
												<br />
												<select name="bidang" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Data Pekerjaan ...">
													<?php
													if($_SESSION['bidang']==0){
														?><option value="">  </option><?php
														$q=mysql_query("select * from dt_kontrak");
														while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idkontrak']; ?>"><?php echo $h['nmpaket']; ?></option>
													<?php
														}
													}else{
														$q=mysql_query("select * from dt_kontrak where idbidang=$_SESSION[bidang]");
														$h=mysql_fetch_array($q);
														?>
														<option value="<?php echo $h['idkontrak']; ?>"><?php echo $h['nmpaket']; ?></option>
														<?php
													}
													?>
												</select>
											</div>
											<?php
											}else if($akses=='rekanan'){
											?>
											<div>
												<label for="form-field-select-3">Data Rekanan</label>
												<br />
												<select name="bidang" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Data Rekanan ...">
													<option value="">  </option>
													<?php
														$q=mysql_query("select * from ref_rekanan");
														while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idrekanan']; ?>"><?php echo $h['nama']; ?></option>
													<?php
														}
													?>
												</select>
											</div>
											<?php
											}
											?>

											<div class="form-actions center">
												<button class="btn btn-info" name="add" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-warning" type="button" onclick="location.href='?page=pengguna&nama=<?php echo $nama; ?>&username=<?php echo $username; ?>&add'">
													<i class="ace-icon fa fa-undo bigger-110"></i>
													Back
												</button>
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=pengguna'">
													<i class="ace-icon fa fa-close bigger-110"></i>
													Cancel
												</button>
											</div>
										</form>
									<?php
									}
									?>
										<hr />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				}else if(isset($_GET['edit'])){
						$id=$_GET['id'];
						$q=mysql_query("select * from user where username='$id'");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Pengguna</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Pengguna</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											
											<div>
												<label for="form-field-select-3">Nama Pengguna</label>
												<br />
												<input type="text" value="<?php echo $h['nama']; ?>" id="form-field-1" name="nama" placeholder="Nama Pengguna" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Username</label>
												<br />
												<input type="text" value="<?php echo $h['username']; ?>" id="form-field-1" name="username" placeholder="Username" class="form-control" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Password</label>
												<br />
												<input type="password" id="form-field-1" name="password" placeholder="Password" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Hak Akses</label>
												<br />
												<input type="text" value="<?php echo $h['akses']; ?>" id="form-field-1" name="akses" class="form-control" readonly />
											</div>
											<?php
											if($h['akses']=='kpa'||$h['akses']=='admin'){
												$qq=mysql_query("select * from ref_bidang where idbidang=$h[idbidang]");
												$hh=mysql_fetch_array($qq);
											?>
											<div>
												<label for="form-field-select-3">Sub Bidang</label>
												<br />
												<input type="text" value="<?php echo $hh['nmbidang']; ?>" id="form-field-1" name="akses" class="form-control" readonly />
											</div>
											<?php
											}else if($h['akses']=='pptk'||$h['akses']=='pengawas'){
												$qq=mysql_query("select * from dt_kontrak where idkontrak=$h[idbidang]");
												$hh=mysql_fetch_array($qq);
											?>
											<div>
												<label for="form-field-select-3">Data Pekerjaan</label>
												<br />
												<input type="text" value="<?php echo $hh['nmpaket']; ?>" id="form-field-1" name="akses" class="form-control" readonly />
											</div>
											<?php
											}else if($h['akses']=='rekanan'){
												$qq=mysql_query("select * from ref_rekanan where idrekanan=$h[idbidang]");
												$hh=mysql_fetch_array($qq);
											?>
											<div>
												<label for="form-field-select-3">Data Rekanan</label>
												<br />
												<input type="text" value="<?php echo $hh['nama']; ?>" id="form-field-1" name="akses" class="form-control" readonly />
											</div>
											<?php
											}
											?>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=pengguna'">
													<i class="ace-icon fa fa-close bigger-110"></i>
													Cancel
												</button>
											</div>
										</form>
										<hr />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				}else{
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Pengguna</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-pengguna" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Pengguna</th>
									<th>Detail</th>
									<th>Username</th>
									<th>Akses</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if($_SESSION['bidang']==0){
									$q=mysql_query("select * from user");
								}else{
									$q=mysql_query("select * from user where idbidang=$_SESSION[bidang] and username<>'$_SESSION[id]'");
								}
								while($h=mysql_fetch_array($q)){
									if($h['akses']=='kpa'||$h['akses']=='admin'){
										$qq=mysql_query("select * from ref_bidang where idbidang=$h[idbidang]");
										$hh=mysql_fetch_array($qq);
										$nama='Sub Bidang '.$hh['nmbidang'];
									}else if($h['akses']=='pptk'||$h['akses']=='pengawas'){
										$qq=mysql_query("select * from dt_kontrak where idkontrak=$h[idbidang]");
										$hh=mysql_fetch_array($qq);
										$nama='Pekerjaan '.$hh['nmpaket'];
									}else if($h['akses']=='rekanan'){
										$qq=mysql_query("select * from ref_rekanan where idrekanan=$h[idbidang]");
										$hh=mysql_fetch_array($qq);
										$nama=$hh['nama'];
									}
									
								?>
								<tr>
									<td><?php echo $h['nama']; ?></td>
									<td><?php echo $nama; ?></td>
									<td><?php echo $h['username']; ?></td>
									<td><strong><?php echo strtoupper($h['akses']); ?></strong></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=pengguna&id=<?php echo $h['username']; ?>&edit'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=pengguna&id=<?php echo $h['username']; ?>&del'" type="button">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>
										</div>
									</td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<?php
				}
				?>
				<!-- /.row -->

				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>