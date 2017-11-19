<?php
//rekanan
if(isset($_POST['add'])){
	$pagu=$_POST['pagu'];
	$pagu=filter_var($pagu, FILTER_SANITIZE_NUMBER_INT);
	$alamat=$_POST['alamat'];
	$telpon=$_POST['telpon'];
	$npwp=$_POST['npwp'];
	$bank=$_POST['bank'];
	$rek=$_POST['rek'];
	$ket=$_POST['ket'];
	$q=mysql_query("insert into ref_rekanan values(null,'$nama','$alamat','$telpon','$npwp','$bank','$rek','$ket')");
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
	?><script>location.href='?page=ref-rekanan';</script><?php
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
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Progres Pekerjaan</h3>
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
									<h4 class="widget-title">Data Progres</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<div id="trigo" style="height: 250px;"></div>
										<!--<form method="post">
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
										</form>-->
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
						$q=mysql_query("select * from ref_rekanan where idrekanan=$id");
						$h=mysql_fetch_array($q);
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Rekanan</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Edit Rekanan</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<label for="form-field-select-3">Nama Rekanan</label>
												<br />
												<input type="text" value="<?php echo $h['nama']; ?>" id="form-field-1" name="nama" placeholder="Nama Rekanan" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Alamat</label>
												<br />
												<input type="text" value="<?php echo $h['alamat']; ?>" id="form-field-1" name="alamat" placeholder="Alamat" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Telpon</label>
												<br />
												<input type="text" value="<?php echo $h['telpon']; ?>" id="form-field-1" name="telpon" placeholder="Telpon" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">NPWP</label>
												<br />
												<input type="text" value="<?php echo $h['npwp']; ?>" id="form-field-1" name="npwp" placeholder="Nomor Pokok Wajib Pajak" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Bank</label>
												<br />
												<input type="text" value="<?php echo $h['bank']; ?>" id="form-field-1" name="bank" placeholder="Nama Bank" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Nomor Rekening</label>
												<br />
												<input type="text" value="<?php echo $h['rek']; ?>" id="form-field-1" name="rek" placeholder="Nomor Rekening" class="form-control" />
											</div>
											<div>
												<label for="form-field-select-3">Keterangan</label>
												<br />
												<input type="text" value="<?php echo $h['ket']; ?>" id="form-field-1" name="ket" placeholder="Keterangan" class="form-control" />
											</div>

											<div class="form-actions center">
												<button class="btn btn-info" name="edit" type="submit">
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