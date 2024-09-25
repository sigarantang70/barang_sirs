@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
    <h1>Barang Masuk</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Barang Masuk</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahBarangMasuk">
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
								<th width="10%">JUMLAH BARANG</th>
								<th width="10%">AKSI</th>
							</tr>
						</thead>
						<tbody>
							@php $no=1 @endphp
							@foreach($barangmasuk as $bm)
							<tr>
								<td  class="text-center">{{ $no++ }}</td>	
								<td>
									{{ $bm->barangsimrs->inventory_nm }}
								</td>							
								<td class="text-center">
									<span class="badge bg-secondary">{{ $bm->jml_masuk }}</span>
								</td>
								<td class="text-center">
									<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ubahBarangMasuk{{ $bm->transaksi_id }}">
										<i class="bi bi-pencil-square"></i>
									</button>
									<button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#detailBarangMasuk{{ $bm->transaksi_id }}">
										<i class="bi bi-search"></i>
									</button>
								</td>

								<!-- Modal -->
								<div class="modal fade modal-lg" id="ubahBarangMasuk{{ $bm->transaksi_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Ubah Barang Masuk</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/barang_masuk_ubah/'.$bm->transaksi_id) }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-4">
														Tanggal Barang
													</label>
													<div class="col-lg-8">
														<input type="date" class="form-control" name="tgl_transaksi" value="{{ $bm->tgl_transaksi }}">
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Asal Barang
													</label>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="as_barang" value="{{ $bm->as_barang }}">
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Nama Barang
													</label>
													<div class="col-lg-8">
														<select class="form-control" name="id_barang" id="ubahBarangSelect2">
															<option value="{{ $bm->barangsimrs->inventory_id }}">{{ $bm->barangsimrs->inventory_nm }}</option>
															<option disabled></option>
															@foreach($persediaan as $p)
															<option value="{{ $p->barangsimrs->inventory_id }}">{{ $p->barangsimrs->inventory_nm }}</option>
															@endforeach
														</select>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Jumlah Barang
													</label>
													<div class="col-lg-8">
														<input type="text" class="form-control" name="jml_barang" value="{{ $bm->jml_barang }}">
													</div>
												</div>		
												<div class="row mt-3">
													<label class="col-lg-4">
														Keterangan
													</label>
													<div class="col-lg-8">
														<textarea class="form-control" name="ket"></textarea>
													</div>
												</div>
											</div>
											<div class="modal-footer">
											    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											    <button type="submit" class="btn btn-primary">Save changes</button>
											</div>
											</form>
										</div>
									</div>
								</div>

								<!-- Modal -->
								<div class="modal fade modal-lg" id="detailBarangMasuk{{ $bm->transaksi_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Ubah Barang Masuk</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/barang_masuk_ubah/'.$bm->transaksi_id) }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-4">
														Tanggal Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ date('d-m-Y', strtotime($bm->tgl_transaksi)) }}</label>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Asal Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $bm->as_barang }}</label>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Nama Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $bm->barangsimrs->inventory_nm }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Jumlah Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $bm->jml_masuk }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Keterangan
													</label>
													<div class="col-lg-8">
														<label>: {{ $bm->ket }}</label>
													</div>
												</div>	
												<div class="row mt-3">
													<label class="col-lg-4">
														User
													</label>
													<div class="col-lg-8">
														<label>: {{ $bm->user }}</label>
													</div>
												</div>	
												<div class="row mt-3">
													<label class="col-lg-4">
														Waktu
													</label>
													<div class="col-lg-8">
														<label>: {{ $bm->created_at }}</label>
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
<div class="modal fade modal-lg" id="tambahBarangMasuk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Barang Masuk</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ url('/barang_masuk_tambah') }}" method="post" enctype="multipart/form-data">
			{{ @csrf_field() }}
			<div class="modal-body">
			    <div class="row mt-3">
					<label class="col-lg-4">
						Tanggal Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="tgl_transaksi" value="{{ date('Y-m-d') }}" readonly >
					</div>
				</div>
			    <div class="row mt-3">
					<label class="col-lg-4">
						Asal Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="as_barang" value="GUDANG INDUK" readonly>
					</div>
				</div>
			    <div class="row mt-3">
					<label class="col-lg-4">
						Nama Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="inventory_id" id="tambahBarangSelect2" required>
							<option></option>
							@foreach($persediaan as $p)
							<option value="{{ $p->barangsimrs->inventory_id }}">{{ $p->barangsimrs->inventory_nm }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-lg-4">
						Jumlah Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<input type="number" class="form-control" name="jml_masuk" required>
					</div>
				</div>		
				<div class="row mt-3">
					<label class="col-lg-4">
						Keterangan 	&nbsp
					</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="ket"></textarea>
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