<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-lg-6">
				<div class="card border-primary">
					<div class="card-header bg-primary text-white">
						<h5>
							Pengajuan Helpdesk
						</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<label class="col-lg-4">
								Nama Pegawai
							</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="">
							</div>
						</div>
						<div class="row mt-3">
							<label class="col-lg-4">
								Unit
							</label>
							<div class="col-lg-8">
								<input type="text" class="form-control" name="">
							</div>
						</div>
						<div class="row mt-3">
							<label class="col-lg-4">
								Kategori
							</label>
							<div class="col-lg-8">
								<select class="form-control">
									<option></option>
									<option>Hardware</option>
									<option>Software</option>
									<option>Network</option>
								</select>
							</div>
						</div>
						<div class="row mt-3">
							<label class="col-lg-4">
								Uraian
							</label>
							<div class="col-lg-8">
								<textarea class="form-control" name=""></textarea>
							</div>
						</div>						
						<div class="row mt-3">
							<div class="col-lg-4">
								
							</div>
							<div class="col-lg-8">
								<input type="submit" class="btn btn-primary" name="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="row mt-4 fw-bold">
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-4">
								
							</div>
							<div class="col-lg-8">
								<h3>2</h3>
								<p class="text-primary">Pengajuan</p>
							</div>
						</div>								
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card border-warning">
					<div class="card-body">
						<h3>1</h3>
						<p class="text-right">Open</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card border-success">
					<div class="card-body">
						<h3>1</h3>
						<p class="text-right">Approve</p>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card border-danger">
					<div class="card-body">
						<h3>0</h3>
						<p class="text-right">Close</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-lg-12">
				<div class="card border-primary">
					<div class="card-header bg-primary text-white">
						<h5>
							Daftar Pengajuan
						</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-striped table-hover">
								<thead class="text-center">
									<tr>
										<th>#</th>
										<th>Tanggal</th>
										<th>User</th>
										<th>Kategori - Uraian</th>
										<th>Petugas</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="text-center">1</th>
										<td width="10%">06 Mar 2023</td>
										<td>Winny</td>
										<td>
											<strong>
												Network
											</strong>
											<br>
											Jaringan tidak terhubung ke internet
										</td>
										<td width="10%">
											<div class="text-danger font-italic">
												<strong>
													(belum)
												</strong>	
											</div>
										</td>
										<td width="10%">
											<button class="btn btn-warning btn-sm text-white">open</button>
										</td>
									</tr>
									<tr>
										<th class="text-center">2</th>
										<td width="10%">06 Mar 2023</td>
										<td>Mety</td>
										<td>
											<strong>
												Hardware
											</strong>
											<br>
											Komputer tidak menyala
										</td>
										<td width="10%">
											<div>
												<strong>
													Faishal													
												</strong>	
											</div>
										</td>
										<td width="10%">
											<button class="btn btn-success btn-sm text-white">approve</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>