<?php
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
					if($aksi=='add-program'){
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
										<form>
											<div>
												<label for="form-field-select-3">Chosen</label>
												<br />
												<select class="chosen-select form-control" id="form-field-select-3" data-placeholder="Choose a State...">
													<option value="">  </option>
													<option value="AL">Alabama</option>
													<option value="AK">Alaska</option>
												</select>
											</div>

											<div class="form-actions center">
												<button type="button" class="btn btn-sm btn-success">
													Submit
													<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
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
					}else if($aksi=='add-bidang'){
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
					}
				}else{
				?>
				<div class="row">
					<div class="space-6"></div>
					<div class="col-md-4">
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
											<button class="btn btn-xs btn-danger" onclick="location.href='?page=ref-bidang&id=<?php echo $h['idbidang']; ?>&aksi=del-bidang'" type="button">
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
					<div class="col-md-4">
						<h3 class="header smaller lighter blue">Program</h3>
						<button class="btn btn-xs btn-success">
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
									<th>Nama Program</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>$45</td>
									<td>Feb 12</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-4">
						<h3 class="header smaller lighter blue">Kegiatan</h3>
						<button class="btn btn-xs btn-success">
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
									<th>Nama Kegiatan</th>
									<th>Aksi</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>$45</td>
									<td>Feb 12</td>
									<td>
										<div class="btn-group">
											<button class="btn btn-xs btn-info">
												<i class="ace-icon fa fa-pencil bigger-120"></i>
											</button>
											<button class="btn btn-xs btn-danger">
												<i class="ace-icon fa fa-trash-o bigger-120"></i>
											</button>
										</div>
									</td>
								</tr>
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