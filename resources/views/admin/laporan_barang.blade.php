@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
    <h1>Laporan Barang</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Laporan Barang</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
  	<div class="row">
	    <div class="col-lg-8">
	        <div class="card">
	          	<div class="card-body mt-3 text-secondary fw-bold">
          		<form action="{{ url('/laporan_proses') }}" method="post">
          			{{ @csrf_field() }}
	          		<div class="row">
						<div class="col-lg-6">
							<label>Jenis Laporan</label>
							<select class="form-control" name="jenis_laporan" required>
								<option></option>
								<option value="1">Pemasukan</option>
								<option value="2">Pengeluaran</option>
							</select>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<label>Tanggal Awal</label>
							<input type="date" class="form-control" name="tgl_awal" required>
						</div>
						<div class="col-lg-6">
							<label>Tanggal Akhir</label>
							<input type="date" class="form-control" name="tgl_akhir" required>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-lg-6">
							<label>Kategori Anggaran</label>
							<select class="form-control" name="anggaran_id">
								<option></option>
								<option>Laporan Pemasukan</option>
								<option>Laporan Pengeluaran</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label>Kategori Barang</label>
							<select class="form-control" name="kategori_id">
								<option></option>
								<option>Laporan Pemasukan</option>
								<option>Laporan Pengeluaran</option>
							</select>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col-lg-12">
							<input type="submit" class="btn btn-primary float-end" name="" value="Unduh">
						</div>
					</div>
				</form>
				</div>
	        </div>
		</div>
	</div>
</section>

@endsection