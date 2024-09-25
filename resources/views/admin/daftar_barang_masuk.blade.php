@extends('admin.layout.master')

@section('content')

<div class="pagetitle">
    <h1>Daftar Barang</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	        <li class="breadcrumb-item active">Daftar Barang</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

@if(session()->has('notif'))
<div class="alert alert-{{ session('notif') }} alert-dismissible fade show mt-3" role="alert">
	{{ session('pesan') }}
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
	<i class="bi bi-pencil-square"></i>&nbsp
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
								<table class="table table-hover table-striped datatable">
									<thead>
										<tr>
											<th width="5%">#</th>
											<th width="10%">Tanggal</th>
											<th>Nama Barang</th>
											<th>Jumlah Barang</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										@foreach($barangmasuk as $bm)
										<tr>
											<td></td>
											<td>{{ $bm->tgl_masuk }}</td>
											<td>
												{{ $bm->kat_barang." ".$bm->merk_barang." ".$bm->nm_barang." ".$bm->ket_barang." ".$bm->ur_barang }}
											</td>
											<td>{{ $bm->jml_barang }}</td>
											<td>{{ $bm->id_barang }}</td>
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
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <h5 class="modal-title fw-bold" id="exampleModalLabel">Buat Pengajuan Helpdesk</h5>
			    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ url('/barang_masuk_tambah') }}" method="post" enctype="multipart/form-data">
			{{ @csrf_field() }}
			<div class="modal-body">
			    <div class="row mt-3">
					<label class="col-lg-4">
						Tanggal Barang
					</label>
					<div class="col-lg-8">
						<input type="date" class="form-control" name="tgl_masuk" value="{{ date('Y-m-d') }}">
					</div>
				</div>
			    <div class="row mt-3">
					<label class="col-lg-4">
						Nama Barang
					</label>
					<div class="col-lg-8">
						<select class="form-control" name="id_barang">
							<option></option>
							@foreach($persediaan as $p)
							<option value="{{ $p->id }}">{{ $p->kat_barang." ".$p->merk_barang." ".$p->nm_barang." ".$p->ket_barang." ".$p->ur_barang }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row mt-3">
					<label class="col-lg-4">
						Jumlah Barang
					</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="jml_barang">
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

@endsection