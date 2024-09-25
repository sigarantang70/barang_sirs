@extends('layout.master')
@section('content')

<div class="pagetitle">
	<i class="bi bi-box-seam bx-md float-start pe-3"></i>
    <h1>Barang Keluar</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Barang Keluar</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahBarangKeluar">
		<i class="bi bi-plus-circle"></i>&nbsp
		Tambah
	</button>

<div class="row">  
    <div class="col-lg-12">
        <div class="card">
          	<div class="card-body">
				<div class="table-responsive mt-4">
					<table class="table table-bordered table-hover table-striped datatable table-sm">
						<thead>
							<tr>
								<th width="5%">#</th>
								<th>NAMA BARANG</th>
								<th width="30%">UNIT</th>
								<th width="10%">JUMLAH BARANG</th>
								<th width="5%">AKSI</th>
							</tr>
						</thead>
						<tbody>
							@php $no=1 @endphp
							@foreach($barangkeluar as $bk)
							<tr>
								<td  class="text-center">{{ $no++ }}</td>
								<td>
									{{ $bk->barangsimrs->inventory_nm }}
								</td>
								<td>{{ $bk->unitkerja->unit_nama }}</td>
								<td class="text-center">
									<span class="badge bg-secondary">{{ $bk->jml_keluar }}</span>
								</td>
								<td class="text-center">
									<button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#detailBarangKeluar{{ $bk->transaksi_id }}">
										<i class="bi bi-search"></i>
									</button>
								</td>

								<!-- Modal -->
								<div class="modal fade modal-lg" id="detailBarangKeluar{{ $bk->transaksi_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											    <h5 class="modal-title fw-bold" id="exampleModalLabel">Detail Barang Keluar</h5>
											    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<form action="{{ url('/barang_keluar_tambah') }}" method="post" enctype="multipart/form-data">
											{{ @csrf_field() }}
											<div class="modal-body">
											    <div class="row mt-3">
													<label class="col-lg-4">
														Tanggal Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ date('d-m-Y', strtotime($bk->tgl_transaksi)) }}</label>
													</div>
												</div>
											    <div class="row mt-3">
													<label class="col-lg-4">
														Nama Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $bk->barangsimrs->inventory_nm }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Jumlah Barang
													</label>
													<div class="col-lg-8">
														<label>: {{ $bk->jml_keluar }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Unit Kerja
													</label>
													<div class="col-lg-8">
														<label>: {{ $bk->unitkerja->unit_nama }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Keterangan &nbsp
													</label>
													<div class="col-lg-8">
														<label>: {{ $bk->ket }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														User &nbsp
													</label>
													<div class="col-lg-8">
														<label>: {{ $bk->user }}</label>
													</div>
												</div>
												<div class="row mt-3">
													<label class="col-lg-4">
														Waktu &nbsp
													</label>
													<div class="col-lg-8">
														<label>: {{ $bk->created_at }}</label>
													</div>
												</div>
											</div>
											<div class="modal-footer">
											    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
<div class="modal fade modal-lg" id="tambahBarangKeluar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title fw-bold" id="exampleModalLabel">Tambah Barang Keluar</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ url('/barang_keluar_tambah') }}" method="post" enctype="multipart/form-data">
			{{ @csrf_field() }}
			<div class="modal-body">
			    <div class="row mt-3">
					<label class="col-lg-4">
						Tanggal Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="tgl_keluar" value="{{ date('Y-m-d') }}" required>
					</div>
				</div>
			    <div class="row mt-3">
					<label class="col-lg-4">
						Nama Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="inventory_id" id="BarangMasukSelect2" required>
							<option disabled></option>
							@foreach($barangmasuk as $bm)
								@if($bm->tes === 0)
								<option value="{{ $bm->id_barang_sirs }}" disabled>{{ $bm->inventory_nm." - (".$bm->tes.")" }}</option>
								@else
								<option value="{{ $bm->id_barang_sirs }}">{{ $bm->inventory_nm." - (".$bm->tes.")" }}</option>
								@endif								
							@endforeach
						</select>
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-lg-4">
						Jumlah Barang <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="jml_keluar" required>
					</div>
				</div>		
				<div class="row mt-3">
					<label class="col-lg-4">
						Unit Kerja <span class="text-danger fw-bold">*</span>
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="unit_id" id="UnitKerjaSelect2" required>
							<option disabled></option>
							@foreach($unitkerja as $uk)
							<option value="{{ $uk->unit_id }}">{{ $uk->unit_nama }}</option>
							@endforeach
						</select>
					</div>
				</div>	
				<div class="row mt-3">
					<label class="col-lg-4">
						Keterangan &nbsp
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