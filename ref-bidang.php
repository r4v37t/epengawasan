<?php
//sub bidang
if(isset($_POST['add-bidang'])){
	$nama=$_POST['nama'];
	$q=mysql_query("insert into ref_bidang values(null,'$nama')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}
if(isset($_POST['edit-bidang'])){
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$q=mysql_query("update ref_bidang set nmbidang='$nama' where idbidang=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}
if(isset($_GET['del-bidang'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from ref_bidang where idbidang=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}

//program
if(isset($_POST['add-program'])){
	$idbidang=$_POST['bidang'];
	$nama=$_POST['nama'];
	$q=mysql_query("insert into ref_program values(null,$idbidang,'$nama')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}
if(isset($_POST['edit-program'])){
	$id=$_POST['id'];
	$idbidang=$_POST['bidang'];
	$nama=$_POST['nama'];
	$q=mysql_query("update ref_program set nmprogram='$nama',idbidang=$idbidang where idprogram=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}
if(isset($_GET['del-program'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from ref_program where idprogram=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}

//kegiatan
if(isset($_POST['add-kegiatan'])){
	$idprogram=$_POST['program'];
	$nama=$_POST['nama'];
	$q=mysql_query("insert into ref_kegiatan values(null,$idprogram,'$nama')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}
if(isset($_POST['edit-kegiatan'])){
	$id=$_POST['id'];
	$idprogram=$_POST['program'];
	$nama=$_POST['nama'];
	$q=mysql_query("update ref_kegiatan set nmkegiatan='$nama',idprogram=$idprogram where idkegiatan=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
}
if(isset($_GET['del-kegiatan'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from ref_kegiatan where idkegiatan=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-bidang';</script><?php
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
					if($aksi=='add-bidang'){
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Bidang</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Sub Bidang</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<div>
												<label for="form-field-select-3">Nama Sub Bidang</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Sub Bidang" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add-bidang" type="submit">
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
					}else if($aksi=='edit-bidang'){
						$id=$_GET['id'];
						$q=mysql_query("select * from ref_bidang where idbidang=$id");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Bidang</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Sub Bidang</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Nama Sub Bidang</label>
												<br />
												<input type="text" value="<?php echo $h['nmbidang']; ?>" id="form-field-1" name="nama" placeholder="Nama Sub Bidang" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit-bidang" type="submit">
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
					}else if($aksi=='add-program'){
						$id=$_GET['id'];
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Program</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Program</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Bidang</label>
												<br />
												<select name="bidang" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Bidang ...">
													<option value="">  </option>
													<?php
													$q=mysql_query("select * from ref_bidang");
													while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idbidang']; ?>"><?php echo $h['nmbidang']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div>
												<label for="form-field-select-3">Nama Program</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Program" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add-program" type="submit">
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
					}else if($aksi=='edit-program'){
						$id=$_GET['id'];
						$q=mysql_query("select * from ref_program where idprogram=$id");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Program</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Program</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Bidang</label>
												<br />
												<select name="bidang" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Bidang ...">
													<option value="">  </option>
													<?php
													$qq=mysql_query("select * from ref_bidang");
													while($hh=mysql_fetch_array($qq)){
													?>
													<option value="<?php echo $hh['idbidang']; ?>" <?php echo ($h['idbidang']==$hh['idbidang'])?"selected":""; ?> ><?php echo $hh['nmbidang']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<div>
												<label for="form-field-select-3">Nama Program</label>
												<br />
												<input type="text" value="<?php echo $h['nmprogram']; ?>" id="form-field-1" name="nama" placeholder="Nama Program" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit-program" type="submit">
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
						<h3 class="header smaller lighter blue">Bidang</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-bidang&aksi=add-bidang'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah Sub Bidang
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama Sub Bidang</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$q=mysql_query("select * from ref_bidang order by idbidang asc");
								while($h=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?php echo $h['idbidang']; ?></td>
									<td><?php echo $h['nmbidang']; ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idbidang']; ?>&aksi=edit-bidang'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idbidang']; ?>&del-bidang'" type="button">
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
						<h3 class="header smaller lighter blue">Program</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-bidang&aksi=add-program'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah Program
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama Bidang</th>
									<th>Nama Program</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$q=mysql_query("select p.idbidang,idprogram,nmbidang,nmprogram from ref_program as p inner join ref_bidang as b on b.idbidang=p.idbidang order by p.idbidang,idprogram asc");
								while($h=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?php echo "$h[idbidang].$h[idprogram]"; ?></td>
									<td><?php echo $h['nmbidang']; ?></td>
									<td><?php echo $h['nmprogram']; ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idprogram']; ?>&aksi=edit-program'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idprogram']; ?>&del-program'" type="button">
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
						<h3 class="header smaller lighter blue">Kegiatan</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-bidang&aksi=add-kegiatan'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah Kegiatan
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="simple-table" class="table  table-bordered table-hover">
							<thead>
								<tr>
									<th>Kode</th>
									<th>Nama Bidang</th>
									<th>Nama Program</th>
									<th>Nama Kegiatan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$q=mysql_query("select q.idbidang,p.idprogram,idkegiatan,nmbidang,nmprogram,nmkegiatan from ref_kegiatan as p inner join ref_program as b on b.idprogram=p.idprogram inner join ref_bidang as q on q.idbidang=b.idbidang order by q.idbidang,p.idprogram,idkegiatan asc");
								while($h=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?php echo "$h[0].$h[1].$h[2]"; ?></td>
									<td><?php echo $h['nmbidang']; ?></td>
									<td><?php echo $h['nmprogram']; ?></td>
									<td><?php echo $h['nmkegiatan']; ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idkegiatan']; ?>&aksi=edit-kegiatan'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idkegiatan']; ?>&del-kegiatan'" type="button">
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