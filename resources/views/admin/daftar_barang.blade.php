@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
    <h1>Daftar Barang</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Daftar Barang</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahBarang">
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
								<th>NAMA BARANG</th>
								<th width="15%">ANGGARAN</th>
								<th width="10%">KATEGORI</th>
								<th width="10%">HARGA</th>
								<th width="10%">AKSI</th>
							</tr>
						</thead>
						<tbody>
							@php $no = 1 @endphp
							@foreach($persediaan as $p)
							<tr>
								<td  class="text-center">{{ $no++ }}</td>
								<td>
									{{ $p->barangsimrs->inventory_nm }}
								</td>
								<td>
									{{ $p->anggarankategori->anggaran_nama }}
								</td>
								<td>
									{{ $p->barangkategori->kategori_nama }}
								</td>
								</td>
								<td>
									{{ number_format($p->barangsimrs->inventory_harga_beli, 0)  }}
								</td>
								<td class="text-center">
									<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editBarang{{ $p->barang_id }}">
										<i class="bi bi-pencil-square"></i>
									</button>
									<button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#detailBarang{{ $p->barang_id }}">
										<i class="bi bi-search"></i>
									</button>
								</td>

								<!-- Modal -->
								<div class="modal fade modal-lg" id="editBarang{{ $p->barang_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Data Barang</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/daftar_barang_ubah/'.$p->barang_id) }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-4">
														Tanggal Barang
													</label>
													<div class="col-lg-8">
														<input type="date" class="form-control" name="tgl_barang" value="{{ $p->tgl_barang }}">
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Kategori Anggaran
													</label>
													<div class="col-lg-8">
														<select class="form-control" name="anggaran_id">
															<option value="{{ $p->anggarankategori->anggaran_id }}">{{ $p->anggarankategori->anggaran_nama }}</option>
															<option></option>
															@foreach($kategori_anggaran as $ka)
															<option value="{{ $ka->anggaran_id }}">{{ $ka->anggaran_nama }}</option>
															@endforeach
														</select>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Kategori Barang
													</label>
													<div class="col-lg-8">
														<select class="form-control" name="kategori_id">
															<option value="{{ $p->barangkategori->kategori_id }}">
																{{ $p->barangkategori->kategori_nama }}
															</option>
															<option></option>
															@foreach($barang_kategori as $bk)
															<option value="{{ $bk->kategori_id }}">{{ $bk->kategori_nama }}</option>
															@endforeach
														</select>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Nama Barang
													</label>
													<div class="col-lg-8">
														<select class="form-control" name="inventory_id">
															<option value="{{ $p->barangsimrs->inventory_id }}">{{ $p->barangsimrs->inventory_nm }}</option>
															<option></option>
														</select>
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
								<div class="modal fade modal-lg" id="detailBarang{{ $p->barang_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Data Barang</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/daftar_barang_ubah/'.$p->barang_id) }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-4">
														Tanggal Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ date('d-m-Y', strtotime($p->tgl_barang)) }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Kategori Anggaran
													</label>
													<div class="col-lg-8">
														<label>: {{ $p->anggarankategori->anggaran_nama }}</label>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Kategori Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $p->barangkategori->kategori_nama }}</label>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Nama Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $p->barangsimrs->inventory_nm }}</label>
													</div>
												</div>	
											    <div class="row mt-3">
													<label class="col-lg-4">
														User
													</label>
													<div class="col-lg-8">
														<label>: {{ $p->user }}</label>
													</div>
												</div>	
											    <div class="row mt-3">
													<label class="col-lg-4">
														Waktu
													</label>
													<div class="col-lg-8">
														<label>: {{ date('d-m-Y H:i:s', strtotime($p->updated_at)) }}</label>
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

<!-- Modal -->
<div class="modal fade modal-lg" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Data Barang</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ url('/daftar_barang_tambah') }}" method="post" enctype="multipart/form-data">
			{{ @csrf_field() }}
			<div class="modal-body">
			    <div class="row mt-3">
					<label class="col-lg-4">
						Tanggal Barang
					</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="tgl_barang" value="{{ date('Y-m-d') }}">
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-lg-4">
						Kategori Anggaran
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="anggaran_id">
							<option></option>
							@foreach($kategori_anggaran as $ka)
							<option value="{{ $ka->anggaran_id }}">{{ $ka->anggaran_nama }}</option>
							@endforeach
						</select>
					</div>
				</div>	
			    <div class="row mt-3">
					<label class="col-lg-4">
						Kategori Barang
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="kategori_id" id="KatBarangSelect2">
							<option></option>
							@foreach($barang_kategori as $bk)
							<option value="{{ $bk->kategori_id }}">{{ $bk->kategori_nama }}</option>
							@endforeach
						</select>
					</div>
				</div>
			    <div class="row mt-3">
					<label class="col-lg-4">
						Nama Barang
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="inventory_id" id="NamaBarangSirsSelect2">
							<option></option>
							@foreach($barang_nama as $bn)
							<option value="{{ $bn->inventory_id }}">{{ $bn->inventory_nm }}</option>
							@endforeach
						</select>
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