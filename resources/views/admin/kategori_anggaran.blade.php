@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
    <h1>Kategori Anggaran</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Kategori Anggaran</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKategoriAnggaran">
	<i class="bi bi-plus-circle"></i>&nbsp
	Tambah
</button>	

<section class="section daftar helpdesk">
  	<div class="row">
	    <!-- Content -->
	    <div class="col-lg-12">
		    <div class="row">
			    <div class="col-lg-12">
			        <div class="card">
			          	<div class="card-body">
							<div class="table-responsive mt-4">
								<table class="table table-bordered table-hover table-striped datatable">
									<thead>
										<tr>
											<th width="5%">#</th>
											<th>KATEGORI ANGGARAN</th>
											<th width="10%">AKSI</th>
										</tr>
									</thead>
									<tbody>
										@php $no = 1 @endphp
										@foreach($kategori_anggaran as $ka)
										<tr>
											<td>{{ $no++ }}</td>
											<td>{{ $ka->anggaran_nama }}</td>
											<td class="text-center">
												<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahAnggaranKategori{{ $ka->anggaran_id }}">
													<i class="bi bi-pencil-square"></i>
												</button>
												<button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#detailAnggaranKategori{{ $ka->anggaran_id }}">
													<i class="bi bi-search"></i>
												</button>
											</td>

											<!-- Modal -->
											<div class="modal fade" id="ubahAnggaranKategori{{ $ka->anggaran_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														    <h5 class="modal-title fw-bold" id="exampleModalLabel">Ubah Kategori Anggaran</h5>
														    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="{{ url('/kategori_anggaran_ubah/'.$ka->anggaran_id) }}" method="post" enctype="multipart/form-data">
														{{ @csrf_field() }}
														<div class="modal-body">
														    <div class="row mt-3">
																<label class="col-lg-6">
																	Nama Kategori Anggaran
																</label>
																<div class="col-lg-6">
																	<input type="text" class="form-control" name="anggaran_nama" value="{{ $ka->anggaran_nama }}">
																</div>
															</div>			
														</div>
														<div class="modal-footer">
														    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
														    <button type="submit" class="btn btn-primary">Simpan</button>
														</div>
														</form>
													</div>
												</div>
											</div>

											<!-- Modal -->
											<div class="modal fade" id="detailAnggaranKategori{{ $ka->anggaran_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
														    <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Kategori Anggaran</h5>
														    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="{{ url('/kategori_anggaran_ubah/'.$ka->anggaran_id) }}" method="post" enctype="multipart/form-data">
														{{ @csrf_field() }}
														<div class="modal-body">
														    <div class="row mt-3">
																<label class="col-lg-6">
																	Nama Kategori Anggaran
																</label>
																<div class="col-lg-6">
																	<label>
																		: {{ $ka->anggaran_nama }}
																	</label>
																</div>
															</div>
														    <div class="row mt-3">
																<label class="col-lg-6">
																	Akun
																</label>
																<div class="col-lg-6">
																	<label>
																		: {{ $ka->user }}
																	</label>
																</div>
															</div>
														    <div class="row mt-3">
																<label class="col-lg-6">
																	Waktu
																</label>
																<div class="col-lg-6">
																	<label>
																		: {{ date('d-m-Y H:i:s', strtotime($ka->updated_at)) }}
																	</label>
																</div>
															</div>
														</div>
														<div class="modal-footer">
														    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
														</div>
														</form>
													</div>
												</div>
											</div>

										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
			        </div>
			    </div>
		    </div>
	    </div><!-- End Content -->
 	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="tambahKategoriAnggaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Kategori Anggaran</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ url('/kategori_anggaran_tambah') }}" method="post" enctype="multipart/form-data">
			{{ @csrf_field() }}
			<div class="modal-body">
			    <div class="row mt-3">
					<label class="col-lg-6">
						Nama Kategori Anggaran
					</label>
					<div class="col-lg-6">
						<input type="text" class="form-control" name="anggaran_nama">
					</div>
				</div>			
			</div>
			<div class="modal-footer">
			    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
			    <button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
</div>

@endsection