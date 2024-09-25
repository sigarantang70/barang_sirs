@extends('layout.master')
@section('content')

<div class="pagetitle">
    <h1>Rekap Persediaan</h1>
    <nav>
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="#">Home</a></li>
	        <li class="breadcrumb-item active">Rekap Persediaan</li>
	    </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
<div class="row">
    <!-- Left side columns -->
    <div class="col-lg-8">
        <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
	            <div class="card info-card sales-card">
	                <div class="card-body">
		                <div class="d-flex align-items-center mt-4">
		                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
		                    	<i class="bi bi-cart"></i>
		                    </div>
		                    <div class="ps-3">
		                    	<h6>{{ $barang }}</h6>
		                    	<span class="text-muted small">Data Barang</span>
		                    </div>
		                </div>
	                </div>
				</div>
            </div>
            <!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
	            <div class="card info-card revenue-card">
	                <div class="card-body">
		                <div class="d-flex align-items-center mt-4">
		                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
		                    	<i class="bi bi-currency-dollar"></i>
		                    </div>
		                    <div class="ps-3">
		                    	<h6>{{ $barangmasuk }}</h6>
		                    	<span class="text-muted small">Barang Masuk</span>
		                    </div>
		                </div>
	                </div>
				</div>
            </div>
            <!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">
	            <div class="card info-card customers-card">
	                <div class="card-body">
		                <div class="d-flex align-items-center mt-4">
		                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
		                    	<i class="bi bi-people"></i>
		                    </div>
		                    <div class="ps-3">
		                    	<h6>{{ $barangkeluar }}</h6>
		                    	<span class="text-muted small">Barang Keluar</span>
		                    </div>
		                </div>
	                </div>
				</div>
            </div>
            <!-- End Customers Card -->
        </div>

        <div class="row">  
		    <div class="col-lg-12">
		        <div class="card">
		          	<div class="card-body">
						<div class="table-responsive mt-4">
							<table class="table table-bordered table-hover table-striped datatable">
								<thead>
									<tr>
										<th width="5%">#</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th width="10%">Masuk</th>
										<th width="10%">Keluar</th>
										<th width="10%">Saldo</th>
									</tr>
								</thead>
								<tbody>
									@php $no=1 @endphp
									@foreach($persediaan as $p)
									<tr>
										<td  class="text-center">{{ $no++ }}</td>
										<td>
											{{ $p->inventory_nm }}
										</td>
										<td>
											{{ $p->inventory_harga_beli }}
										</td>
										<td  class="text-center"><span class="badge bg-primary">{{ $p->barang_masuk }}</span></td>
										<td  class="text-center"><span class="badge bg-danger">{{ $p->barang_keluar }}</span></td>
										<td  class="text-center"><span class="badge bg-info">{{ $p->selisih }}</span></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
		        </div>
		    </div>
	    </div>
    </div><!-- End Left side columns -->

    <div class="col-lg-4">
    	<div class="card">
    		<div class="card-body">
    			{!! $KategoriBarangChart->container() !!}
		    	<script src="{{ $KategoriBarangChart->cdn() }}"></script>
				{{ $KategoriBarangChart->script() }}
    		</div>
    	</div>  	
    </div>

</div>
</section>

@endsection