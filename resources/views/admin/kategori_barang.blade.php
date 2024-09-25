@extends('layout.master')

@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
    <h1>Kategori Barang</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Kategori Barang</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahKategoriBarang">
	<i class="bi bi-plus-circle"></i>&nbsp
	Tambah
</button>	

<div class="row">
    <div class="col-lg-12">
        <div class="card">
          	<div class="card-body">
				<div class="table-responsive mt-4">
					<table class="table table-bordered table-hover table-striped datatable">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th>KATEGORI BARANG</th>
								<th width="10%">AKSI</th>
							</tr>
						</thead>
						<tbody>
							@php $no=1 @endphp
							@foreach($barang_kategori as $bk)
							<tr>
								<td  class="text-center">{{ $no++ }}</td>
								<td>{{ $bk->kategori_nama }}</td>
								<td class="text-center">
									<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahBarangKategori{{ $bk->kategori_id }}">
										<i class="bi bi-pencil-square"></i>
									</button>
									<button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#detailBarangKategori{{ $bk->kategori_id }}">
										<i class="bi bi-search"></i>
									</button>
								</td>

								<!-- Modal -->
								<div class="modal fade" id="ubahBarangKategori{{ $bk->kategori_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Ubah Kategori Barang</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/kategori_barang_ubah/'.$bk->kategori_id) }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-5">
														Nama Kategori Barang
													</label>
													<div class="col-lg-7">
														<input type="text" class="form-control" name="kategori_nama" value="{{ $bk->kategori_nama }}">
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
								<div class="modal fade" id="detailBarangKategori{{ $bk->kategori_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Ubah Kategori Barang</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/kategori_barang_ubah/'.$bk->kategori_id) }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-5">
														Nama Kategori Barang
													</label>
													<div class="col-lg-7">
														<label>
															: {{ $bk->kategori_nama }}
														</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-5">
														Akun
													</label>
													<div class="col-lg-7">
														<label>
															: {{ $bk->user }}
														</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-5">
														Waktu
													</label>
													<div class="col-lg-7">
														<label>
															: {{ date('d-m-Y H:i:s', strtotime($bk->updated_at)) }}
														</label>
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
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahKategoriBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Kategori Barang</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ url('/kategori_barang_tambah') }}" method="post" enctype="multipart/form-data">
			{{ @csrf_field() }}
			<div class="modal-body">
			    <div class="row mt-3">
					<label class="col-lg-5">
						Nama Kategori Barang
					</label>
					<div class="col-lg-7">
						<input type="text" class="form-control" name="kategori_nama">
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