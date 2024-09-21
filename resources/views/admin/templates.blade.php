<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  @yield('head')
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/logo/logo-maxipro.png">

  <title>
    @yield('title')
  </title>

  <!--     Fonts & icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- <link href="{{ asset('css/template/font_googleapis_family_roto.css') }}" rel="stylesheet"> -->
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.0.0-beta3/js/all.min.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  
  <!-- <link href="{{ asset('css/template/font_awesome_icon.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/templates/template-fontawesome.js') }}" ></script>
  <link href="{{ asset('css/template/font_googleapis.css') }}" rel="stylesheet"> -->
  <!-- Material Icons -->
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  @yield('link')
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="../assets/js/jquery.3.5.1.min.js"></script>
  @yield('scriptatas')
  <style>
    /* Opsi tambahan jika perlu menyesuaikan ruang antara ikon dan teks */
    .nav-link-text:after {
      content: "\00a0";
      /* Unicode for non-breaking space */
    }

    .rounded-image {
      border-radius: 50%;
      width: 38px;
      /* Ubah ukuran sesuai kebutuhan */
      height: 100px;
      /* Ubah ukuran sesuai kebutuhan */
    }
  </style>
  @yield('style')
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        @if($username['data']['teknisi']['image']=='')
        <img src="https://maxipro.id/images/placeholder/basic.png" class="navbar-brand-img h-100 rounded-image" alt="main_logo">
        @else
        <img src="{{ $username['data']['teknisi']['imagedir'] }}" class="navbar-brand-img h-100" alt="main_logo">
        @endif
        <span class="ms-1 font-weight-bold text-white">{{ $username['data']['teknisi']['name'] }}</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">

          <a class="nav-link text-white {{ Request::is('admin/dashboard') || Request::is('admin/dashboard_filter') ? 'active bg-gradient-primary' : '' }}" href="{{ route('admin.dashboard') }}">



            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('admin/service') || Request::is('admin/datasparepart') ? 'active bg-gradient-primary' : '' }} " style=" display: flex;
            justify-content: space-between;" role="button" data-bs-auto-close="outside" role="button" data-bs-toggle="dropdown" href="">


            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right: 87px;">Services</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link text-white {{ Request::is('admin/service') ? 'active bg-gradient-primary' : '' }} " href="{{ route('admin.service') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Daftar Service</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Laporan Service</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white {{ Request::is('admin/datasparepart') ? 'active bg-gradient-primary' : '' }} " href="{{ route('admin.datasparepart') }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Data Sparepart</span>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item dropdown">

          <a href="" class="nav-link dropdown-toggle" style=" display: flex;
            justify-content: space-between;" role="button" data-bs-auto-close="outside" role="button" data-bs-toggle="dropdown">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div><span class="nav-link-text ms-1" style="margin-right: 95px;">Master</span>
          </a>
          <ul class="dropdown-menu">

            <li class="nav-item dropdown">
              <a style="color:black;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                <div class="text-black text-left me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">person</i>
                </div><span class="nav-link-text ms-1">Master User </span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="" class="dropdown-item">
                    Data User
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Rule User
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Posisi User
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Employee
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a style="color:black;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                <div class="text-black text-left me-2 d-flex align-items-center justify-content-center">
                  <i class='fab fa-accusoft'></i>
                </div><span class="nav-link-text ms-1">Master Item &nbsp;</span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="" class="dropdown-item">
                    Data Item
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Item Rusak
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    MQQ Item
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Product Woocommerce
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class="material-icons opacity-10">view_in_ar</i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Item Group</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class="material-icons opacity-10">view_in_ar</i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Kategori Item</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class="material-icons opacity-10">view_in_ar</i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Sub Kategori Item</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-archway'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Cabang</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fab fa-bitbucket'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Gudang</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fab fa-cc-amex'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Termin</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-comment-dollar'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Mata Uang</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-coins'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Rak</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-comments-dollar'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master PPN</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-comment-dollar'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Convert Mata Uang</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-cloud-download-alt'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Discount</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fab fa-cloudversify'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Ekspedisi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-archway'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Status Order Penjualan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-archway'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Board Penjualan</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a style="color:black;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                <div class="text-black text-left me-2 d-flex align-items-center justify-content-center">
                  <i class='fas fa-tag'></i>
                </div><span class="nav-link-text ms-1">Master Tag &nbsp;</span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="" class="dropdown-item">
                    Master Tag Category Penjualan
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Master Tag Penjualan
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <a style="color:black;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                <div class="text-black text-left me-2 d-flex align-items-center justify-content-center">
                  <i class='fas fa-user-circle'></i>
                </div><span class="nav-link-text ms-1">Master Customer &nbsp;</span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="" class="dropdown-item">
                    Customer
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Leads
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Qontak
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Website
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Google Ads
                  </a>
                </li>

              </ul>
            </li>

            <li class="nav-item dropdown">
              <a style="color:black;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                <div class="text-black text-left me-2 d-flex align-items-center justify-content-center">
                  <i class='fas fa-object-group'></i>
                </div><span class="nav-link-text ms-1">Master Supplier &nbsp;</span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="" class="dropdown-item">
                    Data Supplier
                  </a>
                </li>
                <li><a href="" class="dropdown-item">
                    Bank Supplier
                  </a>
                </li>


              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='far fa-credit-card'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Bank Account</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-check-circle'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master COA / Akun</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='far fa-check-circle'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Klarifikasi COA</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fas fa-quote-right'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Quotes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='fab fa-critical-role'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Landing Page</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/virtual-reality.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black;" class='far fa-object-group'></i>

                </div>
                <span style="color:black;" class="nav-link-text ms-1">Master Flyer</span>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display:flex;justify-content: space-between;" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="#">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:80px;">Penjualan</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/notifications.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Order penjualan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/notifications.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Peminjaman Order Penjualan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/notifications.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Penjualan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white " href="../pages/notifications.html">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                </div>
                <span class="nav-link-text ms-1" style="color:black;">Penjualan Void</span>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('admin/data_restok') || Request::is('admin/data_restok_filter') || Request::is('admin/data_orderpembelian') || Request::is('admin/data_orderpembelian_filter') ? 'active bg-gradient-primary' : '' }}" style="display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="../pages/rtl.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right: 75px;">Pembelian</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="{{ route('admin.pembeliaan_restok') }}" class="nav-link text-white {{ Request::is('admin/data_restok') || Request::is('admin/data_restok_filter') || Request::is('admin/data_getrestok') || Request::is('admin/data_tambahstok') || Request::is('admin/data_editviewrestok') || Request::is('admin/data_editstok') || Request::is('admin/hapus_restok') ? 'active bg-gradient-primary' : '' }}">
             
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Restok</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.pembeliaan_orderpembelian') }}" class="nav-link text-white { Request::is('admin/data_orderpembelian') || Request::is('admin/data_orderpembelian_filter') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Order Pembelian</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('admin.pembelian_comercial_invoice') }}" class="nav-link text-white { Request::is('admin/data_comercialinvoice') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-columns"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Commercial Invoice</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
               <a href="{{ route('admin.pembelian_lcl') }}" class="nav-link text-white { Request::is('admin/data_lclpembelian') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-wallet"></i>
                  <span class="nav-link-text ms-1" style="color:black;">LCL</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pembelian_fcl') }}" class="nav-link text-white { Request::is('admin/data_fclpembelian') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-luggage-cart"></i>
                  <span class="nav-link-text ms-1" style="color:black;">FCL Container</span>
                </div>
              </a>
            </li>


          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-truck"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right: 68px;">Pengiriman</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Penjualan</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-boxes"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Pindah Gudang</span>
                </div>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-money-bill-alt"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right: 60px;">Pembayaran</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Penjualan</span>
                </div>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-people-carry"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right: 65px;">Penerimaan</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
            <a href="{{ route('admin.penerimaan_pembelian') }}" class="nav-link text-white {{ Request::is('admin/data_pembelian_penerimaan')  ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Pembeliaan</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
                   <a href="{{ route('admin.penerimaan_pindahgudang') }}" class="nav-link text-white {{ Request::is('admin/data_penerimaan_pindahgudang')  ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-boxes"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Pindah Gudang</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('admin.penerimaan_barang_lain') }}" class="nav-link text-white {{ Request::is('admin/data_penerimaan_barang_lain')  ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="	fas fa-couch"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Barang Lain</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('admin.penerimaan_document') }}" class="nav-link text-white {{ Request::is('admin/data_penerimaan_document')  ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="	fas fa-file-alt"></i>
                  <span class="nav-link-text ms-1" style="color:black;padding-left:5px">Dokumen Lain</span>
                </div>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
        
          <a class="nav-link text-white {{ Request::is('admin/penawaran') ? 'active bg-gradient-primary' : '' }}" href="{{ route('admin.penawaran') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-clipboard-list" style="padding-left: 3px;"></i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left:5px;">Penawaran</span>
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ Request::is('admin/lihatstok') || Request::is('admin/lihatstokopname') || Request::is('admin/opnamestok')|| Request::is('admin/lihatstokperusahaan')|| Request::is('admin/lihatstokkategory') ? 'active bg-gradient-primary' : '' }}" style=" display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-box" style="padding-left:2px;"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:108px;">Stok</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="{{ route('admin.lihatstok') }}" class="nav-link text-white {{ Request::is('admin/lihatstok') ? 'active bg-gradient-primary' : '' }}">

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Lihat Stok</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.lihatstokopname') }}" class="nav-link text-white {{ Request::is('admin/lihatstokopname') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Opname Stok</span>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle {{ Request::is('admin/kasbanksurabaya') || Request::is('admin/kaspengeluaranpt') || Request::is('admin/kasbankjakarta') || Request::is('admin/kasjakarta') || Request::is('admin/kassurabaya') || Request::is('admin/tambah_kas')  ? 'active bg-gradient-primary' : '' }}" style=" display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="	far fa-money-bill-alt"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:110px;">Kas</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="{{ route('admin.kaspengeluaranpt') }}" class="nav-link text-white {{ Request::is('admin/kasbanksurabaya') || Request::is('admin/kaspengeluaranpt') || Request::is('admin/kasbankjakarta') || Request::is('admin/kasjakarta') || Request::is('admin/kassurabaya') || Request::is('admin/tambah_kas')  ? 'active bg-gradient-primary' : '' }}">

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Kas</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-clipboard-list"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Laporan Kas Keluar</span>
                </div>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a class="nav-link text-white" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-clock"></i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left: 6px;">Daily Activites</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-toolbox"></i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left:7px;">Lowongan Kerja</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fab fa-whatsapp"></i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left: 9px;">WA Qiscus</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content:space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="	fab fa-palfed"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:50px;">WA Pancake</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-comment"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Data Message</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-comments"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Template Message</span>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <!-- <a class="nav-link dropdown-toggle" style="display: flex;justify-content:space-between" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown"> -->

          <a class="nav-link dropdown-toggle {{ Request::is('admin/data_voucher') || Request::is('admin/data_voucher_customer') || Request::is('admin/data_tambah_voucher') ? 'active bg-gradient-primary' : '' }}" style=" display: flex;justify-content: space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-funnel-dollar"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:72px;">Voucher</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="{{ route('admin.voucher') }}" class="nav-link text-white {{ Request::is('admin/data_voucher') ||Request::is('admin/data_tambah_voucher') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-comment"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Data Voucher</span>
                </div>
              </a>
            </li>
            <li class="nav-item">

              <a href="{{ route('admin.voucher_customer') }}" class="nav-link text-white {{ Request::is('admin/data_voucher_customer') ? 'active bg-gradient-primary' : '' }}">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-comments"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Voucher Customer</span>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content:space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:16px;">Laporan & Analisa</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Service</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Order Penjualan</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Penjualan</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Pembelian</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Kas Keluar</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Customer</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Regresi Linear Sederhana</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Website maxipro.co.id</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Mutasi Stok</span>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content:space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="	fas fa-history"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:90px;">Sync</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Sync Order Penjualan</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Sync Penjualan</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="fas fa-tag"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Syn Service / Install</span>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="display: flex;justify-content:space-between;" role="button" data-bs-auto-close="outline" data-bs-toggle="dropdown" href="../pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="		fas fa-star"></i>
            </div>
            <span class="nav-link-text ms-1" style="margin-right:15px;">Review Customer</span>
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="	fas fa-star"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Service</span>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link text-white">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i style="color:black" class="	fas fa-star"></i>
                  <span class="nav-link-text ms-1" style="color:black;">Penjualan</span>
                </div>
              </a>
            </li>

          </ul>
        </li>

        <!-- <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li> -->
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left:8px;">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/sign-in.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-store-alt-slash"></i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left:13px;">QC</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="{{ route('admin.logout') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <span class="nav-link-text ms-1" style="padding-left:12px;">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  
  </aside>

  @yield('content')
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script>
    // Function to add sub-dropdown items
    function addSubDropdown() {
      // Select the dropdown menu
      var dropdownMenu = document.getElementById('masterDropdown');

      // Create a new dropdown item
      var subDropdownItem = document.createElement('li');
      subDropdownItem.innerHTML = '<a class="dropdown-item" href="#">Sub Item 1</a>';

      // Append the new dropdown item to the dropdown menu
      dropdownMenu.appendChild(subDropdownItem);
    }

    // Call the function to add sub-dropdown items
    addSubDropdown();
  </script>
  @yield('script')
</body>

</html>