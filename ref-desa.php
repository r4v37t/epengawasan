<?php
//kecamatan
if(isset($_POST['add-kecamatan'])){
	$nama=$_POST['nama'];
	$q=mysql_query("insert into ref_kecamatan values(null,'$nama')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-desa';</script><?php
}
if(isset($_POST['edit-kecamatan'])){
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$q=mysql_query("update ref_kecamatan set nmkecamatan='$nama' where idkecamatan=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-desa';</script><?php
}
if(isset($_GET['del-kecamatan'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from ref_kecamatan where idkecamatan=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-desa';</script><?php
}

//desa
if(isset($_POST['add-desa'])){
	$idkecamatan=$_POST['kecamatan'];
	$nama=$_POST['nama'];
	$q=mysql_query("insert into ref_desa values(null,$idkecamatan,'$nama')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-desa';</script><?php
}
if(isset($_POST['edit-desa'])){
	$id=$_POST['id'];
	$idkecamatan=$_POST['kecamatan'];
	$nama=$_POST['nama'];
	$q=mysql_query("update ref_desa set nmdesa='$nama',idkecamatan=$idkecamatan where iddesa=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-desa';</script><?php
}
if(isset($_GET['del-desa'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from ref_desa where iddesa=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-desa';</script><?php
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
				if(isset($_GET['aksi'])){
					$aksi=$_GET['aksi'];
					if($aksi=='add-kecamatan'){
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Kecamatan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Kecamatan</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<div>
												<label for="form-field-select-3">Nama Kecamatan</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Kecamatan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add-kecamatan" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-desa'">
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
					}else if($aksi=='edit-kecamatan'){
						$id=$_GET['id'];
						$q=mysql_query("select * from ref_kecamatan where idkecamatan=$id");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Kecamatan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Kecamatan</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Nama Kecamatan</label>
												<br />
												<input type="text" value="<?php echo $h['nmkecamatan']; ?>" id="form-field-1" name="nama" placeholder="Nama Kecamatan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit-kecamatan" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-desa'">
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
					}else if($aksi=='add-desa'){
						$id=$_GET['id'];
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Desa</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Desa</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Kecamatan</label>
												<br />
												<select name="kecamatan" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Kecamatan ...">
													<option value="">  </option>
													<?php
													$q=mysql_query("select * from ref_kecamatan");
													while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idkecamatan']; ?>"><?php echo $h['nmkecamatan']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div>
												<label for="form-field-select-3">Nama Desa</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Desa" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add-desa" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-desa'">
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
					}else if($aksi=='edit-desa'){
						$id=$_GET['id'];
						$q=mysql_query("select * from ref_desa where iddesa=$id");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Desa</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Desa</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Kecamatan</label>
												<br />
												<select name="kecamatan" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Kecamatan ...">
													<option value="">  </option>
													<?php
													$qq=mysql_query("select * from ref_kecamatan");
													while($hh=mysql_fetch_array($qq)){
													?>
													<option value="<?php echo $hh['idkecamatan']; ?>" <?php echo ($h['idkecamatan']==$hh['idkecamatan'])?"selected":""; ?> ><?php echo $hh['nmkecamatan']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div>
												<label for="form-field-select-3">Nama Desa</label>
												<br />
												<input type="text" value="<?php echo $h['nmdesa']; ?>" id="form-field-1" name="nama" placeholder="Nama Desa" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit-desa" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-desa'">
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
					}else if($aksi=='add-kegiatan'){
						$id=$_GET['id'];
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Kegiatan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Kegiatan</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Program</label>
												<br />
												<select name="program" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Program ...">
													<option value="">  </option>
													<?php
													$q=mysql_query("select * from ref_program");
													while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idprogram']; ?>"><?php echo $h['nmprogram']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div>
												<label for="form-field-select-3">Nama Kegiatan</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Kegiatan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add-kegiatan" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-bidang'">
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
					}else if($aksi=='edit-kegiatan'){
						$id=$_GET['id'];
						$q=mysql_query("select * from ref_kegiatan where idkegiatan=$id");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Kegiatan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Kegiatan</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Program</label>
												<br />
												<select name="program" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Bidang ...">
													<option value="">  </option>
													<?php
													$qq=mysql_query("select * from ref_program");
													while($hh=mysql_fetch_array($qq)){
													?>
													<option value="<?php echo $hh['idprogram']; ?>" <?php echo ($h['idprogram']==$hh['idprogram'])?"selected":""; ?> ><?php echo $hh['nmprogram']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div>
												<label for="form-field-select-3">Nama Kegiatan</label>
												<br />
												<input type="text" value="<?php echo $h['nmkegiatan']; ?>" id="form-field-1" name="nama" placeholder="Nama Kegiatan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit-kegiatan" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-bidang'">
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
					}
				}else{
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Kecamatan</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-desa&aksi=add-kecamatan'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah Kecamatan
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama Kecamatan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$q=mysql_query("select * from ref_kecamatan order by idkecamatan asc");
								while($h=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?php echo $h['idkecamatan']; ?></td>
									<td><?php echo $h['nmkecamatan']; ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-desa&id=<?php echo $h['idkecamatan']; ?>&aksi=edit-kecamatan'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-desa&id=<?php echo $h['idkecamatan']; ?>&del-kecamatan'" type="button">
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
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Desa</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-desa&aksi=add-desa'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah Desa
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-desa" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama Kecamatan</th>
									<th>Nama Kelurahan/Desa</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$q=mysql_query("select iddesa,d.idkecamatan,nmdesa,nmkecamatan from ref_desa as p inner join ref_kecamatan as d on p.idkecamatan=d.idkecamatan order by d.idkecamatan,iddesa asc");
								while($h=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?php echo "$h[idkecamatan].$h[iddesa]"; ?></td>
									<td><?php echo $h['nmkecamatan']; ?></td>
									<td><?php echo $h['nmdesa']; ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-desa&id=<?php echo $h['iddesa']; ?>&aksi=edit-desa'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-desa&id=<?php echo $h['iddesa']; ?>&del-desa'" type="button">
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