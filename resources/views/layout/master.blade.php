<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>RSPR</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('public/NiceAdmin/assets/img/communication.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('public/NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
    <link href="{{ asset('public/NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('public/NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('public/NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('public/NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('public/NiceAdmin/assets/css/style.css') }}" rel="stylesheet">

    <style>
        .select2-selection__rendered {
            line-height: 31px !important;
        }
        .select2-container .select2-selection--single {
            height: 35px !important;
        }
        .select2-selection__arrow {
            height: 34px !important;
        }
        th{
            text-align:center!important
        }
    </style>

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Mar 10 2024 with Bootstrap v5.3.3
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
          <a href="#" class="logo d-flex align-items-center">
              <img src="{{ asset('public/NiceAdmin/assets/img/Logo-RSPR-2024.png') }}" alt="">
              &nbsp
              <span class="d-none d-lg-block text-primary fw-bold">

              </span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

      <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="{{ asset('public/NiceAdmin/assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->email }}</span>
              </a><!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li>
                      <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}">
                          <i class="bi bi-box-arrow-right"></i>
                          <span>Log Out</span>
                      </a>
                  </li>

              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

          </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-heading">Persediaan</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Rekap Persediaan</span>
                </a>
            </li><!-- Rekap Persediaan -->

            <li class="nav-heading">Data Barang</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/kategori_anggaran') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Kategori Anggaran</span>
                </a>
            </li><!-- Kategori Anggaran -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/kategori_barang') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Kategori Barang</span>
                </a>
            </li><!-- Kategori Barang -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/daftar_barang') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Nama Barang</span>
                </a>
            </li><!-- Nama Barang -->

            <li class="nav-heading">Transaksi</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/barang_masuk') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Barang Masuk</span>
                </a>
            </li><!-- Barang Masuk -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/barang_keluar') }}">
                    <i class="bi bi-box-seam"></i>
                    <span>Barang Keluar</span>
                </a>
            </li><!-- Barang Keluar -->

            <li class="nav-heading">Laporan</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/laporan_barang') }}">
                    <i class="bi bi-person"></i>
                    <span>Laporan</span>
                </a>
            </li><!-- Laporan -->

            <li class="nav-heading">Printer</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/rekap_printer') }}">
                    <i class="bi bi-person"></i>
                    <span>Rekap Printer</span>
                </a>
            </li><!-- Laporan -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/daftar_printer') }}">
                    <i class="bi bi-person"></i>
                    <span>Daftar Printer</span>
                </a>
            </li><!-- Laporan -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/pemeliharaan_printer') }}">
                    <i class="bi bi-person"></i>
                    <span>Pemeliharaan Printer</span>
                </a>
            </li><!-- Laporan -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

      @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>RSPR</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('public/vendor/jquery/jquery-3.7.1.min.js') }}"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('public/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/echarts/echarts.min.j') }}s"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('public/NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Sweet Alert Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('sweetalert::alert')

    <!-- Template Main JS File -->
    <script src="{{ asset('public/NiceAdmin/assets/js/main.js') }}"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#KatBarangSelect2').select2({
            width: "100%",
            dropdownParent: $('#tambahBarang')
        });
        $('#NamaBarangSirsSelect2').select2({
            width: "100%",
            dropdownParent: $('#tambahBarang')
        });
        $('#tambahBarangSelect2').select2({
            width: "100%",
            dropdownParent: $('#tambahBarangMasuk')
        });
        $('#BarangMasukSelect2').select2({
            width: "100%",
            dropdownParent: $('#tambahBarangKeluar')
        });
        $('#UnitKerjaSelect2').select2({
            width: "100%",
            dropdownParent: $('#tambahBarangKeluar')
        });
    });
    </script>

</body>

</html>