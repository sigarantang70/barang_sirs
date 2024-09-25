@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
	<h1>Daftar Printer</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">Home</li>
			<hi class="breadcrumb-item active">Daftar Printer</hi>
		</ol>
	</nav>
</div>

<a href="{{ url('/form_create_printer') }}" class="btn btn-primary mb-3">
	<i class="bi bi-plus-circle"></i>&nbsp
	Tambah
</a>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped datatable">
							<thead>
								<tr>
									<th width="8%">No</th>
									<th>Printer</th>
									<th width="10%">Tahun</th>
									<th>Unit</th>
									<th width="10%">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@php $no = 1 @endphp
								@foreach($printer as $p)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $p->merk." ".$p->tipe }}</td>
									<td>{{ $p->tahun }}</td>
									<td>{{ $p->unitkerja->unit_nama }}</td>
									<td>
										<a href="{{ url('/form_edit_printer', $p->printer_id) }}" class="btn btn-success btn-sm">Edit</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="TambahPrinter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Printer</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form>
			<div class="modal-body">
				<div class="row mt-3">
					<label class="col-5">
						Merk Printer
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="merk_printer">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						Tipe Printer
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="tipe_printer">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						Tahun Perolehan
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="tahun_perolehan">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						Nomor BMN
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="no_bmn">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						Foto Nomor BMN
					</label>
					<div class="col-7">
						<input type="file" class="form-control" name="file_no_bmn">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						MAC Address
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="mac_address">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						IP Address
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="ip_address">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						Foto Printer
					</label>
					<div class="col-7">
						<input type="file" class="form-control" name="file_printer">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-5">
						Unit
					</label>
					<div class="col-7">
						<select class="form-control" name="unit_id">
							<option></option>
							<option></option>
						</select>
					</div>
				</div>				
				<div class="row mt-3">
					<label class="col-5">
						Lokasi
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="ip_address">
					</div>
				</div>				
				<div class="row mt-3">
					<label class="col-5">
						Status
					</label>
					<div class="col-7">
						<input type="text" class="form-control" name="ip_address">
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
</div>

@endsection