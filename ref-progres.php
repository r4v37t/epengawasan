<?php
if(isset($_POST['savetsreal'])){
	$id=$_POST['id'];
	$realisasi=implode(';',$_POST['tsreal']);
	$q=mysql_query("select * from dt_schedule where idkontrak=$id");
	if(mysql_num_rows($q)>0){
		$q=mysql_query("update dt_schedule set realisasi='$realisasi' where idkontrak=$id");
	}else{
		?><script>alert("Gagal!\n\nMasukkan data schedule rencana terlebih dahulu."); location.href='?page=ref-paket&daftar';</script><?php
	}
	if($q){
		?><script>alert("Sukses!");</script><?php
	}else{
		?><script>alert("Gagal!");</script><?php
	}
}
if(isset($_POST['uploadfoto'])){
	$id=$_POST['id'];
	$now=date('d-m-Y H:i:s');
	$file=explode('.',$_FILES['foto']['name']);
	$foto=$_FILES['foto']['name'];
	$foto=md5($foto.$now);
	$foto=$foto.'.'.end($file);
	$ket=$_POST['ket'];
	$lokasi='uploads/'.$foto;
	if(move_uploaded_file($_FILES["foto"]["tmp_name"], $lokasi)){
		$q=mysql_query("insert into dt_foto values(null,$id,'$lokasi','$ket')");
		if($q){
			?><script>alert("Sukses!");</script><?php
		}else{
			?><script>alert("Gagal!");</script><?php
		}
	}else{
		?><script>alert("Gagal!\n\nData gagal di upload.");</script><?php
	}
	?><script>location.href='?page=ref-progres&paket=<?php echo $id; ?>&foto';</script><?php
}
if(isset($_GET['delfoto'])){
	$id=$_GET['foto'];
	$paket=$_GET['paket'];
	$q=mysql_query("select * from dt_foto where idfoto=$id");
	$h=mysql_fetch_array($q);
	if(unlink($h['foto'])){
		$q=mysql_query("delete from dt_foto where idfoto=$id");
		if($q){
			?><script>alert("Sukses!");</script><?php
		}else{
			?><script>alert("Gagal!");</script><?php
		}
	}else{
		?><script>alert("Gagal!\n\nFile tidak dapat dihapus.");</script><?php
	}
	?><script>location.href='?page=ref-progres&paket=<?php echo $paket; ?>&foto';</script><?php
}
if(isset($_POST['uploadvideo'])){
	$id=$_POST['id'];
	$now=date('d-m-Y H:i:s');
	$file=explode('.',$_FILES['video']['name']);
	$video=$_FILES['video']['name'];
	$video=md5($video.$now);
	$video=$video.'.'.end($file);
	$ket=$_POST['ket'];
	$lokasi='uploads/'.$video;
	if(move_uploaded_file($_FILES["video"]["tmp_name"], $lokasi)){
		$q=mysql_query("insert into dt_video values(null,$id,'$lokasi','$ket')");
		if($q){
			?><script>alert("Sukses!");</script><?php
		}else{
			?><script>alert("Gagal!");</script><?php
		}
	}else{
		?><script>alert("Gagal!\n\nData gagal di upload.");</script><?php
	}
	?><script>location.href='?page=ref-progres&paket=<?php echo $id; ?>&video';</script><?php
}
if(isset($_GET['delvideo'])){
	$id=$_GET['video'];
	$paket=$_GET['paket'];
	$q=mysql_query("select * from dt_video where idvideo=$id");
	$h=mysql_fetch_array($q);
	if(unlink($h['video'])){
		$q=mysql_query("delete from dt_video where idvideo=$id");
		if($q){
			?><script>alert("Sukses!");</script><?php
		}else{
			?><script>alert("Gagal!");</script><?php
		}
	}else{
		?><script>alert("Gagal!\n\nFile tidak dapat dihapus.");</script><?php
	}
	?><script>location.href='?page=ref-progres&paket=<?php echo $paket; ?>&video';</script><?php
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
					if(isset($_GET['paket'])){
						$id=$_GET['paket'];
							$q=mysql_query("select * from dt_kontrak where idkontrak=$id");
							$h=mysql_fetch_array($q);
							$q=mysql_query("select * from dt_schedule where idkontrak=$id");
							$sch=mysql_fetch_array($q);
							
							$rencana=explode(';',$sch['rencana']);
							$realisasi=explode(';',$sch['realisasi']);
							
							$awal=strtotime($h['ttdkontrak']);
							$akhir=strtotime("+".($h['pelaksanaan']-1)." days", $awal);
							
							$awal1=date('Y-m',strtotime($h['ttdkontrak']));
							$akhir1=date('Y-m',$akhir);
							$awal1=strtotime($awal1);
							$akhir1=strtotime($akhir1);
							
							$thawal=date('Y',$awal);
							$thakhir=date('Y',$akhir);
							$blnawal=date('m',$awal);
							$blnakhir=date('m',$akhir);
							$bulan=(($thakhir-$thawal)*12)+($blnakhir-$blnawal);
							
							
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan - <?php echo "[ $h[nmpaket] ]"; ?></h3>
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
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Mulai Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$awal); ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo "$h[pelaksanaan] Hari Kalender"; ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Akhir Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$akhir); ?>" class="form-control" readonly />
											</div>
											<div class="clearfix"></div>
										</form>
										<hr />
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Time Schedule Realisasi</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
										<form method="post">
											<input type="hidden" name="id" value="<?php echo $id; ?>" />
											<div>
												<div id="tsreal" style="height: 550px;"></div>
											</div>
											
											<?php
											$y=0;
											while($awal1 <= $akhir1){
											?>
											<div class="col-sm-2">
												<label for="form-field-select-3"><?php echo bulanindo(date('n',$awal1)); ?></label>
												<br />
												<input type="text" value="<?php echo $realisasi[$y]; ?>" name="tsreal[]" class="form-control" />
											</div>
											<?php
												$y++;
												$awal1 = strtotime("+1 months", $awal1);
											}
											?>
											
											<div class="clearfix"></div>
											<div class="form-actions center">
												<button class="btn btn-info" name="savetsreal" type="submit">
													<i class="ace-icon fa fa-check bigger-110"></i>
													Submit
												</button>

												&nbsp; &nbsp; &nbsp;
												<button class="btn btn-success" type="button" onclick="location.href='?page=ref-progres&data'">
													<i class="ace-icon fa fa-close bigger-110"></i>
													Finish
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
						<h3 class="header smaller lighter blue">Daftar Paket</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
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
							<input type="hidden" name="daftar" value="" />
						</form>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-paket" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Paket</th>
									<th>No. Kontrak</th>
									<th>Tanggal Mulai</th>
									<th>Waktu Pelaksanaan</th>
									<th>Tanggal Berakhir</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if($_SESSION['bidang']==0){
									$q=mysql_query("select * from dt_kontrak");
								}else{
									$q=mysql_query("select * from dt_kontrak where idbidang=$_SESSION[bidang]");
								}
								while($h=mysql_fetch_array($q)){
									$akhir=strtotime("+".($h['pelaksanaan']-1)." days", strtotime($h['ttdkontrak']));
								?>
								<tr>
									<td><?php echo $h['nmpaket']; ?></td>
									<td><?php echo $h['nokontrak']; ?></td>
									<td><?php echo date('d-m-Y',strtotime($h['ttdkontrak'])); ?></td>
									<td><?php echo $h['pelaksanaan']; ?> Hari Kalender</td>
									<td><?php echo date('d-m-Y',$akhir); ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-progres&paket=<?php echo $h['idkontrak']; ?>&data'" type="button">
												<i class="ace-icon fa fa-search bigger-120"></i>
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
				}else if(isset($_GET['foto'])){
					if(isset($_GET['paket'])){
						$id=$_GET['paket'];
							$q=mysql_query("select * from dt_kontrak where idkontrak=$id");
							$h=mysql_fetch_array($q);
							$q=mysql_query("select * from dt_schedule where idkontrak=$id");
							$sch=mysql_fetch_array($q);
							
							$rencana=explode(';',$sch['rencana']);
							$realisasi=explode(';',$sch['realisasi']);
							
							$awal=strtotime($h['ttdkontrak']);
							$akhir=strtotime("+".($h['pelaksanaan']-1)." days", $awal);
							
							$awal1=date('Y-m',strtotime($h['ttdkontrak']));
							$akhir1=date('Y-m',$akhir);
							$awal1=strtotime($awal1);
							$akhir1=strtotime($akhir1);
							
							$thawal=date('Y',$awal);
							$thakhir=date('Y',$akhir);
							$blnawal=date('m',$awal);
							$blnakhir=date('m',$akhir);
							$bulan=(($thakhir-$thawal)*12)+($blnakhir-$blnawal);
							
							
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan - <?php echo "[ $h[nmpaket] ]"; ?></h3>
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
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Mulai Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$awal); ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo "$h[pelaksanaan] Hari Kalender"; ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Akhir Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$akhir); ?>" class="form-control" readonly />
											</div>
											<div class="clearfix"></div>
										</form>
										<hr />
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Upload Data Foto</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<form method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id; ?>" />
										<div class="form-group">
											<div>
												<label for="form-field-select-3">File Foto:</label>
												<br />
												<input type="file" name="foto" id="id-input-file-2" />
											</div>
											<div>
												<label for="form-field-select-3">Keterangan:</label>
												<br />
												<input type="text" name="ket" class="form-control" />
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="form-actions center">
											<button class="btn btn-info" name="uploadfoto" type="submit">
												<i class="ace-icon fa fa-cloud-upload bigger-110"></i>
												Upload
											</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Data Foto Progres</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<div>
										<ul class="ace-thumbnails clearfix">
											<?php
											$q=mysql_query("select * from dt_foto where idkontrak=$id");
											while($h=mysql_fetch_array($q)){
											?>
											<li>
												<a href="<?php echo $h['foto']; ?>" data-rel="colorbox">
													<img width="150" height="150" alt="150x150" src="<?php echo $h['foto']; ?>" />
													<div class="text">
														<div class="inner"><?php echo $h['ket']; ?></div>
													</div>
												</a>

												<div class="tools tools-bottom">
													<a href="?page=ref-progres&paket=<?php echo $id; ?>&paket=<?php echo $id; ?>&foto=<?php echo $h['idfoto']; ?>&delfoto">
														<i class="ace-icon fa fa-times red"></i>
													</a>
												</div>
											</li>
											<?php
											}
											?>
										</ul>
									</div>
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
						<h3 class="header smaller lighter blue">Daftar Paket</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
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
							<input type="hidden" name="daftar" value="" />
						</form>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-paket" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Paket</th>
									<th>No. Kontrak</th>
									<th>Tanggal Mulai</th>
									<th>Waktu Pelaksanaan</th>
									<th>Tanggal Berakhir</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if($_SESSION['bidang']==0){
									$q=mysql_query("select * from dt_kontrak");
								}else{
									$q=mysql_query("select * from dt_kontrak where idbidang=$_SESSION[bidang]");
								}
								while($h=mysql_fetch_array($q)){
									$akhir=strtotime("+".($h['pelaksanaan']-1)." days", strtotime($h['ttdkontrak']));
								?>
								<tr>
									<td><?php echo $h['nmpaket']; ?></td>
									<td><?php echo $h['nokontrak']; ?></td>
									<td><?php echo date('d-m-Y',strtotime($h['ttdkontrak'])); ?></td>
									<td><?php echo $h['pelaksanaan']; ?> Hari Kalender</td>
									<td><?php echo date('d-m-Y',$akhir); ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-progres&paket=<?php echo $h['idkontrak']; ?>&foto'" type="button">
												<i class="ace-icon fa fa-search bigger-120"></i>
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
				}else if(isset($_GET['video'])){
					if(isset($_GET['paket'])){
						$id=$_GET['paket'];
							$q=mysql_query("select * from dt_kontrak where idkontrak=$id");
							$h=mysql_fetch_array($q);
							$q=mysql_query("select * from dt_schedule where idkontrak=$id");
							$sch=mysql_fetch_array($q);
							
							$rencana=explode(';',$sch['rencana']);
							$realisasi=explode(';',$sch['realisasi']);
							
							$awal=strtotime($h['ttdkontrak']);
							$akhir=strtotime("+".($h['pelaksanaan']-1)." days", $awal);
							
							$awal1=date('Y-m',strtotime($h['ttdkontrak']));
							$akhir1=date('Y-m',$akhir);
							$awal1=strtotime($awal1);
							$akhir1=strtotime($akhir1);
							
							$thawal=date('Y',$awal);
							$thakhir=date('Y',$akhir);
							$blnawal=date('m',$awal);
							$blnakhir=date('m',$akhir);
							$bulan=(($thakhir-$thawal)*12)+($blnakhir-$blnawal);
							
							
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan - <?php echo "[ $h[nmpaket] ]"; ?></h3>
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
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Mulai Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$awal); ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo "$h[pelaksanaan] Hari Kalender"; ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Akhir Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$akhir); ?>" class="form-control" readonly />
											</div>
											<div class="clearfix"></div>
										</form>
										<hr />
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Upload Data Video</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<form method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id; ?>" />
										<div class="form-group">
											<div>
												<label for="form-field-select-3">File Video:</label>
												<br />
												<input type="file" name="video" id="id-input-file-2" />
											</div>
											<div>
												<label for="form-field-select-3">Keterangan:</label>
												<br />
												<input type="text" name="ket" class="form-control" />
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="form-actions center">
											<button class="btn btn-info" name="uploadvideo" type="submit">
												<i class="ace-icon fa fa-cloud-upload bigger-110"></i>
												Upload
											</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Data Video Progres</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<div>
										<?php
										$q=mysql_query("select * from dt_video where idkontrak=$id");
										while($h=mysql_fetch_array($q)){
										?>
										<div class="flowplayer" data-ratio="0.4167">
											<video type="video/mp4" src="<?php echo $h['video']; ?>"></video>
										</div>
										<div><?php echo $h['ket']; ?></div>
										<div class="tools tools-bottom">
											<a href="?page=ref-progres&paket=<?php echo $id; ?>&paket=<?php echo $id; ?>&video=<?php echo $h['idvideo']; ?>&delvideo">
												<i class="ace-icon fa fa-times red"></i>
											</a>
										</div>
										<?php
										}
										?>
									</div>
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
						<h3 class="header smaller lighter blue">Daftar Paket</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
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
							<input type="hidden" name="daftar" value="" />
						</form>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-paket" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Paket</th>
									<th>No. Kontrak</th>
									<th>Tanggal Mulai</th>
									<th>Waktu Pelaksanaan</th>
									<th>Tanggal Berakhir</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if($_SESSION['bidang']==0){
									$q=mysql_query("select * from dt_kontrak");
								}else{
									$q=mysql_query("select * from dt_kontrak where idbidang=$_SESSION[bidang]");
								}
								while($h=mysql_fetch_array($q)){
									$akhir=strtotime("+".($h['pelaksanaan']-1)." days", strtotime($h['ttdkontrak']));
								?>
								<tr>
									<td><?php echo $h['nmpaket']; ?></td>
									<td><?php echo $h['nokontrak']; ?></td>
									<td><?php echo date('d-m-Y',strtotime($h['ttdkontrak'])); ?></td>
									<td><?php echo $h['pelaksanaan']; ?> Hari Kalender</td>
									<td><?php echo date('d-m-Y',$akhir); ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-progres&paket=<?php echo $h['idkontrak']; ?>&video'" type="button">
												<i class="ace-icon fa fa-search bigger-120"></i>
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
				}else if(isset($_GET['peta'])){
					if(isset($_GET['paket'])){
						$id=$_GET['paket'];
							$q=mysql_query("select * from dt_kontrak where idkontrak=$id");
							$h=mysql_fetch_array($q);
							$q=mysql_query("select * from dt_schedule where idkontrak=$id");
							$sch=mysql_fetch_array($q);
							
							$rencana=explode(';',$sch['rencana']);
							$realisasi=explode(';',$sch['realisasi']);
							
							$awal=strtotime($h['ttdkontrak']);
							$akhir=strtotime("+".($h['pelaksanaan']-1)." days", $awal);
							
							$awal1=date('Y-m',strtotime($h['ttdkontrak']));
							$akhir1=date('Y-m',$akhir);
							$awal1=strtotime($awal1);
							$akhir1=strtotime($akhir1);
							
							$thawal=date('Y',$awal);
							$thakhir=date('Y',$akhir);
							$blnawal=date('m',$awal);
							$blnakhir=date('m',$akhir);
							$bulan=(($thakhir-$thawal)*12)+($blnakhir-$blnawal);
							
							
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-12">
						<h3 class="header smaller lighter blue">Paket Pekerjaan - <?php echo "[ $h[nmpaket] ]"; ?></h3>
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
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Mulai Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$awal); ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Masa Pelaksanaan</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo "$h[pelaksanaan] Hari Kalender"; ?>" class="form-control" readonly />
											</div>
											<div class="col-sm-4">
												<label for="form-field-select-3">Tanggal Akhir Kontrak</label>
												<br />
												<input type="text" id="form-field-1" value="<?php echo date('d-m-Y',$akhir); ?>" class="form-control" readonly />
											</div>
											<div class="clearfix"></div>
										</form>
										<hr />
									</div>
								</div>
							</div>
						</div>
						<!--
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Upload Data Video</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<form method="post" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $id; ?>" />
										<div class="form-group">
											<div>
												<label for="form-field-select-3">File Video:</label>
												<br />
												<input type="file" name="video" id="id-input-file-2" />
											</div>
											<div>
												<label for="form-field-select-3">Keterangan:</label>
												<br />
												<input type="text" name="ket" class="form-control" />
											</div>
										</div>

										<div class="clearfix"></div>
										<div class="form-actions center">
											<button class="btn btn-info" name="uploadvideo" type="submit">
												<i class="ace-icon fa fa-cloud-upload bigger-110"></i>
												Upload
											</button>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
						-->
						<div class="col-md-12">
							<div class="widget-box">
								<div class="widget-header">
									<h4 class="widget-title">Data Peta</h4>
								</div>

								<div class="widget-body">
									<div class="widget-main">
									<div>
										<div id="googlemap1" class="gmap_inner"></div>
									</div>
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
						<h3 class="header smaller lighter blue">Daftar Paket</h3>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
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
							<input type="hidden" name="daftar" value="" />
						</form>
						<div class="clearfix">
							<div class="pull-right tableTools-container"></div>
						</div>
						<table id="table-paket" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Nama Paket</th>
									<th>No. Kontrak</th>
									<th>Tanggal Mulai</th>
									<th>Waktu Pelaksanaan</th>
									<th>Tanggal Berakhir</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<?php
								if($_SESSION['bidang']==0){
									$q=mysql_query("select * from dt_kontrak");
								}else{
									$q=mysql_query("select * from dt_kontrak where idbidang=$_SESSION[bidang]");
								}
								while($h=mysql_fetch_array($q)){
									$akhir=strtotime("+".($h['pelaksanaan']-1)." days", strtotime($h['ttdkontrak']));
								?>
								<tr>
									<td><?php echo $h['nmpaket']; ?></td>
									<td><?php echo $h['nokontrak']; ?></td>
									<td><?php echo date('d-m-Y',strtotime($h['ttdkontrak'])); ?></td>
									<td><?php echo $h['pelaksanaan']; ?> Hari Kalender</td>
									<td><?php echo date('d-m-Y',$akhir); ?></td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info" onclick="location.href='?page=ref-progres&paket=<?php echo $h['idkontrak']; ?>&peta'" type="button">
												<i class="ace-icon fa fa-search bigger-120"></i>
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
				}
				?>
				<!-- /.row -->

				<!-- PAGE CONTENT ENDS -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.page-content -->
</div>