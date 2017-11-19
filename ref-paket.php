<?php
//rekanan
if(isset($_POST['add'])){
	$pagu=$_POST['pagu'];
	$pagu=filter_var($pagu, FILTER_SANITIZE_NUMBER_INT);
	$pelaksanaan=$_POST['pelaksanaan'];
	$pelaksanaan=filter_var($pelaksanaan, FILTER_SANITIZE_NUMBER_INT);
	$pemeliharaan=$_POST['pemeliharaan'];
	$pemeliharaan=filter_var($pemeliharaan, FILTER_SANITIZE_NUMBER_INT);
	$bidang=$_POST['bidang'];
	$nama=$_POST['nama'];
	$kontrak=mysql_real_escape_string($_POST['kontrak']);
	$rekanan=$_POST['rekanan'];
	$ttd=date('Y-m-d',strtotime($_POST['ttd']));
	$spmk=date('Y-m-d',strtotime($_POST['spmk']));
	$q=mysql_query("insert into dt_kontrak values(null,$bidang,'$nama',$pagu,'$kontrak',$rekanan,'$ttd','$spmk',$pelaksanaan,$pemeliharaan)");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-paket&data';</script><?php
}
if(isset($_POST['edit'])){
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$telpon=$_POST['telpon'];
	$npwp=$_POST['npwp'];
	$bank=$_POST['bank'];
	$rek=$_POST['rek'];
	$ket=$_POST['ket'];
	$q=mysql_query("update ref_rekanan set nama='$nama',alamat='$alamat',telpon='$telpon',npwp='$npwp',bank='$bank',rek='$rek',ket='$ket' where idrekanan=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-rekanan';</script><?php
}
if(isset($_GET['del'])){
	$id=$_GET['id'];
	$q=mysql_query("delete from ref_rekanan where idrekanan=$id");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-rekanan';</script><?php
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
				if(isset($_GET['data'])){
					if(isset($_GET['aksi'])){
						if($_GET['aksi']=='tambah'){
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Tambah Data Kontrak</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
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
											<div>
												<label for="form-field-select-3">Nama Paket</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Paket" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Pagu</label>
												<br />
												<input type="text" id="uang" data-thousands="." data-decimal="," data-prefix="Rp. " name="pagu" placeholder="Rp." class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Nomor Kontrak</label>
												<br />
												<input type="text" id="form-field-1" name="kontrak" placeholder="Nomor Kontrak" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Nama Rekanan</label>
												<br />
												<select name="rekanan" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Rekanan ...">
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
											<div>
												<label for="form-field-select-3">Tanda Tangan Kontrak</label>
												<br />
												<input class="form-control date-picker" name="ttd" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
											</div>
											<div>
												<label for="form-field-select-3">SPMK</label>
												<br />
												<input class="form-control date-picker" name="spmk" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" id="hari1" data-thousands="." name="pelaksanaan" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pemeliharaan</label>
												<br />
												<input type="text" id="hari2" data-thousands="." name="pemeliharaan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-paket&data'">
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
						}else if($_GET['aksi']=='edit'){
							$id=$_GET['id'];
							$q=mysql_query("select * from ref_rekanan where idrekanan=$id");
							$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-paket&aksi=tambah&data'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Data Kontrak</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
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
											<div>
												<label for="form-field-select-3">Nama Paket</label>
												<br />
												<input type="text" id="form-field-1" name="nama" placeholder="Nama Paket" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Pagu</label>
												<br />
												<input type="text" id="uang" data-thousands="." data-decimal="," data-prefix="Rp. " name="pagu" placeholder="Rp." class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Nomor Kontrak</label>
												<br />
												<input type="text" id="form-field-1" name="kontrak" placeholder="Nomor Kontrak" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Nama Rekanan</label>
												<br />
												<select name="rekanan" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Rekanan ...">
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
											<div>
												<label for="form-field-select-3">Tanda Tangan Kontrak</label>
												<br />
												<input class="form-control date-picker" name="ttd" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
											</div>
											<div>
												<label for="form-field-select-3">SPMK</label>
												<br />
												<input class="form-control date-picker" name="spmk" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" id="hari1" data-thousands="." name="pelaksanaan" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pemeliharaan</label>
												<br />
												<input type="text" id="hari2" data-thousands="." name="pemeliharaan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="add" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-rekanan'">
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
						if(isset($_GET['bidang'])){
							if($_SESSION['bidang']==0){
								$bidang=$_GET['bidang'];
							}else{
								$bidang=$_SESSION['bidang'];
							}
						}else{
							if($_SESSION['bidang']==0){
								$bidang='';
							}else{
								$bidang=$_SESSION['bidang'];
							}
						}
						if(isset($_GET['nama'])){
							$nama=$_GET['nama'];
						}else{
							$nama='';
						}
						if(!empty($nama)){
							$qq=mysql_query("select * from dt_kontrak where idkontrak=$nama");
							$hh=mysql_fetch_array($qq);
							$qq=mysql_query("select * from ref_rekanan where idrekanan=$hh[idrekanan]");
							$rekanan=mysql_fetch_array($qq);
						}
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan</h3>
						<button class="btn btn-xs btn-success" onclick="location.href='?page=ref-paket&aksi=tambah&data'">
							<i class="ace-icon fa fa-plus bigger-120"></i>
							Tambah
						</button>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Data Kontrak</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="get">
											<input type="hidden" name="page" value="ref-paket" />
											<div>
												<label for="form-field-select-3">Sub Bidang</label>
												<br />
												<select name="bidang" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Sub Bidang ..." onchange="this.form.submit()">
													<?php
													if($_SESSION['bidang']==0){
														?><option value="">  </option><?php
														$q=mysql_query("select * from ref_bidang");
														while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idbidang']; ?>" <?php echo ($h['idbidang']==$bidang)?'selected':''; ?> ><?php echo $h['nmbidang']; ?></option>
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
											<div>
												<label for="form-field-select-3">Nama Paket</label>
												<br />
												<select name="nama" class="chosen-select form-control" id="form-field-select-3" data-placeholder="Pilih Nama Paket ..." onchange="this.form.submit()">
													<option value="">  </option>
													<?php
													$q=mysql_query("select * from dt_kontrak where idbidang=$bidang");
													while($h=mysql_fetch_array($q)){
													?>
													<option value="<?php echo $h['idkontrak']; ?>" <?php echo ($h['idkontrak']==$nama)?'selected':''; ?> ><?php echo $h['nmpaket']; ?></option>
													<?php
													}
													?>
												</select>
											</div>
											<input type="hidden" name="data" value="" />
											<?php
											if(!empty($nama)){
											?>
											<div>
												<label for="form-field-select-3">Pagu</label>
												<br />
												<input type="text" class="form-control" value="Rp. <?php echo number_format($hh['pagu'],0,',','.'); ?>" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Nomor Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo $hh['nokontrak']; ?>" class="form-control" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Nama Rekanan</label>
												<br />
												<input type="text" class="form-control" value="<?php echo $rekanan['nama']; ?>" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Tanda Tangan Kontrak</label>
												<br />
												<input class="form-control" type="text" value="<?php echo date('d-m-Y',strtotime($hh['ttdkontrak'])); ?>" readonly />
											</div>
											<div>
												<label for="form-field-select-3">SPMK</label>
												<br />
												<input class="form-control" type="text" value="<?php echo date('d-m-Y',strtotime($hh['spmk'])); ?>" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" class="form-control" value="<?php echo $hh['pelaksanaan']; ?> Hari Kalender" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pemeliharaan</label>
												<br />
												<input type="text" class="form-control" value="<?php echo $hh['pemeliharaan']; ?> Hari Kalender" readonly />
											</div>
											<?php
											}else{
											?>
											<div>
												<label for="form-field-select-3">Pagu</label>
												<br />
												<input type="text" class="form-control" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Nomor Kontrak</label>
												<br />
												<input type="text" id="form-field-1" class="form-control" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Nama Rekanan</label>
												<br />
												<input type="text" class="form-control" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Tanda Tangan Kontrak</label>
												<br />
												<input class="form-control" type="text" readonly />
											</div>
											<div>
												<label for="form-field-select-3">SPMK</label>
												<br />
												<input class="form-control" type="text"  readonly />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" class="form-control" readonly />
											</div>
											<div>
												<label for="form-field-select-3">Masa Pemeliharaan</label>
												<br />
												<input type="text" class="form-control" readonly />
											</div>
											<?php
											}
											if(!empty($nama)){
											?>

											<div class="form-actions center">
												<button class="btn btn-success" type="button" onclick="location.href='?page=ref-rekanan'">
													<i class="ace-icon fa fa-pencil bigger-110"></i>
													Edit
												</button>
												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-warning" type="button" onclick="location.href='?page=ref-rekanan'">
													<i class="ace-icon fa fa-paste bigger-110"></i>
													Addendum
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-danger" type="button" onclick="location.href='?page=ref-rekanan'">
													<i class="ace-icon fa fa-close bigger-110"></i>
													Delete
												</button>
											</div>
											<?php
											}
											?>
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
						<h3 class="header smaller lighter blue">Rekanan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-rekanan" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Rekanan</th>
									<th>Alamat</th>
									<th>Telpon</th>
									<th>NPWP</th>
									<th>Bank</th>
									<th>No. Rekening</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								$q=mysql_query("select * from ref_rekanan");
								while($h=mysql_fetch_array($q)){
								?>
								<tr>
									<td><?php echo $h['nama']; ?></td>
									<td><?php echo $h['alamat']; ?></td>
									<td><?php echo $h['telpon']; ?></td>
									<td><?php echo $h['npwp']; ?></td>
									<td><?php echo $h['bank']; ?></td>
									<td><?php echo $h['rek']; ?></td>
									<td><?php echo $h['ket']; ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-rekanan&id=<?php echo $h['idrekanan']; ?>&edit'" type="button">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-rekanan&id=<?php echo $h['idrekanan']; ?>&del'" type="button">
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