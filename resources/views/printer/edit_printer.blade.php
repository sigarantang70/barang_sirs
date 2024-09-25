@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
	<h1>Edit Data Printer</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">Home</li>
			<hi class="breadcrumb-item active">Edit Data Printer</hi>
		</ol>
	</nav>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<form action="{{ url('/update_printer') }}" method="post">
			{{ @csrf_field() }}
			<div class="card-body fw-bold">
				<div class="row mt-5">
					<label class="col-3 text-end">
						Merk Printer <span class="text-danger">*</span>
					</label>
					<div class="col-9">
						<input type="text" class="form-control" name="merk" value="{{ $editprinter->merk  }}">
						<input type="hidden" name="printer_id" value="{{ $editprinter->printer_id }}">
					</div>
				</div><div class="row mt-4">
					<label class="col-3 text-end">
						Tipe Printer <span class="text-danger">*</span>
					</label>
					<div class="col-9">
						<input type="text" class="form-control" name="tipe" value="{{ $editprinter->tipe }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						Tahun Perolehan
					</label>
					<div class="col-9">
						<input type="text" class="form-control" name="tahun" value="{{ $editprinter->tahun }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						Nomor BMN
					</label>
					<div class="col-9">
						<input type="text" class="form-control" name="bmn_no" value="{{ $editprinter->bmn_no }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						Foto Nomor BMN
					</label>
					<div class="col-9">
						<input type="file" class="form-control" name="bmn_file" value="{{ $editprinter->bmn_file }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						MAC Address
					</label>
					<div class="col-9">
						<input type="text" class="form-control" name="mac" value="{{ $editprinter->mac }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						IP Address
					</label>
					<div class="col-9">
						<input type="text" class="form-control" name="ip" value="{{ $editprinter->ip }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						Foto Printer
					</label>
					<div class="col-9">
						<input type="file" class="form-control" name="printer_file" value="{{ $editprinter->printer_file }}">
					</div>
				</div>
				<div class="row mt-4">
					<label class="col-3 text-end">
						Unit <span class="text-danger">*</span>
					</label>
					<div class="col-9">
						<select class="form-control" name="unit_id">
							<option value="{{ $editprinter->unitkerja->unit_id }}">{{ $editprinter->unitkerja->unit_nama }}</option>
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
						<input type="text" class="form-control" name="lokasi" value="{{ $editprinter->lokasi }}">
					</div>
				</div>				
				<div class="row mt-4">
					<label class="col-3 text-end">
						Status <span class="text-danger">*</span>
					</label>
					<div class="col-9">
						<select class="form-control" name="status">
							<option value="{{ $editprinter->status}}">{{ $editprinter->status === 1 ? 'Digunakan' : 'Tidak Digunakan' }}</option>
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

@endsection