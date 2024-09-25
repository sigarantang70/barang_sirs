@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
	<h1>Tambah Printer</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">Home</li>
			<hi class="breadcrumb-item active">Tambah Printer</hi>
		</ol>
	</nav>
</div>

<section class="section">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<form action="{{ url('/simpan_printer') }}" method="post">
				{{ @csrf_field() }}
				<div class="card-body fw-bold">
					<div class="row mt-5">
						<label class="col-3 text-end">
							Merk Printer <span class="text-danger">*</span>
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="merk">
						</div>
					</div><div class="row mt-4">
						<label class="col-3 text-end">
							Tipe Printer <span class="text-danger">*</span>
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="tipe">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							Tahun Perolehan
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="tahun">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							Nomor BMN
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="bmn_no">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							Foto Nomor BMN
						</label>
						<div class="col-9">
							<input type="file" class="form-control" name="bmn_file">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							MAC Address
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="mac">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							IP Address
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="ip">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							Foto Printer
						</label>
						<div class="col-9">
							<input type="file" class="form-control" name="printer_file">
						</div>
					</div>
					<div class="row mt-4">
						<label class="col-3 text-end">
							Unit <span class="text-danger">*</span>
						</label>
						<div class="col-9">
							<select class="form-control" name="unit_id">
								<option></option>
								@foreach($unit_kerja as $uk)
								<option value="{{ $uk->unit_id }}">{{ $uk->unit_nama }}</option>
								@endforeach
							</select>
						</div>
					</div>				
					<div class="row mt-4">
						<label class="col-3 text-end">
							Lokasi <span class="text-danger">*</span>
						</label>
						<div class="col-9">
							<input type="text" class="form-control" name="lokasi">
						</div>
					</div>				
					<div class="row mt-4">
						<label class="col-3 text-end">
							Status <span class="text-danger">*</span>
						</label>
						<div class="col-9">
							<select class="form-control" name="status">
								<option></option>
								<option value="1">Digunakan</option>
								<option value="0">Tidak Digunakan</option>
							</select>
						</div>
					</div>
				</div>
				<div class="card-footer text-end">
					<a href="" class="btn btn-warning text-white">Kembali</a>
					<input type="submit" class="btn btn-primary" name="">
				</div>
				</form>
			</div>
		</div>	
	</div>
</section>

@endsection