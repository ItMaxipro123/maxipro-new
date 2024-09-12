@extends('admin.templates')
@section('title')

Dashboard | PT. Maxipro Group Indonesia

@endsection
@section('style')
<style>
    .custom-dropdown .select2-selection__rendered {
        border: 1px solid #ced4da;
        background-color: white;
    }
</style>
@endsection
@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">{{ $username['data']['teknisi']['name'] }}</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        
          </div>
        <ul class="navbar-nav  justify-content-end">
         
         
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
            </a>
          </li>

          <li class="nav-item px-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
            </a>
          </li>
          <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New message</span> from Laur
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New album</span> by Travis Scott
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Payment successfully completed
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

              </ul>

          </li>

          <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-sm-1">
                  <span class="d-sm-inline d-none">{{ $username['data']['teknisi']['name'] }}
                    <i class="fa fa-caret-down"></i>
                  </span>
                </i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from Laur
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New album</span> by Travis Scott
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          1 day
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                          <title>credit-card</title>
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                              <g transform="translate(1716.000000, 291.000000)">
                                <g transform="translate(453.000000, 454.000000)">
                                  <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                  <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                </g>
                              </g>
                            </g>
                          </g>
                        </svg>
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          Payment successfully completed
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          2 days
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
          </li>
        
        </ul>

      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
      <form method="get" action="{{ route('admin.dashboard_filter') }}">
        <div class="row">
      
            <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            </div>

            <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
            </div>


            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" >        
                        <div style="position: relative; width: 60%; margin-left: 90%;">
                            <select class="select select2 bulan-search form-control" name="bulan" style="border: 1px solid #ced4da; width: 90%; background-color: white; margin-left: 30%;">
                                
                                  <option value="01" style="text-align: center;" {{ $Data['tgl_awal']==='01' ? 'selected' : '' }}>Januari</option>
                                  <option value="02" style="text-align: center;" {{ $Data['tgl_awal']==='02' ? 'selected' : '' }}>Februari</option>
                                  <option value="03" style="text-align: center;" {{ $Data['tgl_awal']==='03' ? 'selected' : '' }}>Maret</option>
                                  <option value="04" style="text-align: center;" {{ $Data['tgl_awal']==='04' ? 'selected' : ''  }}>April</option>
                                  <option value="05" style="text-align: center;" {{ $Data['tgl_awal']==='05' ? 'selected' : '' }}>Mei</option>
                                  <option value="06" style="text-align: center;" {{ $Data['tgl_awal']==='06' ? 'selected' : '' }}>Juni</option>
                                  <option value="07" style="text-align: center;" {{ $Data['tgl_awal']==='07' ? 'selected' : '' }}>Juli</option>
                                  <option value="08" style="text-align: center;" {{ $Data['tgl_awal']==='08' ? 'selected' : '' }}>Agustus</option>
                                  <option value="09" style="text-align: center;" {{ $Data['tgl_awal']==='09' ? 'selected' : '' }}>September</option>
                                  <option value="10" style="text-align: center;" {{ $Data['tgl_awal']==='10' ? 'selected' : '' }}>Oktober</option>
                                  <option value="11" style="text-align: center;" {{ $Data['tgl_awal']==='11' ? 'selected' : '' }}>Novomber</option>
                                  <option value="12" style="text-align: center;" {{ $Data['tgl_awal']==='12' ? 'selected' : '' }}>Desember</option>
                            </select>
                            <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 15%; transform: translateY(-50%);">
                            </i>
                        </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

                                  
                                    <div style="position: relative; width: 60%;margin-left:40%;">
                                        <select class="select select2 tahun-search form-control" name="tahun" style="border: 1px solid #ced4da; width: 100%; background-color: white">
                                              @foreach($tahun_start as $tahun)
                                                  <option value="{{ $tahun }}" style="text-align: center;"{{$Data['tgl_akhir'] == $tahun ? 'selected' : ''}} >{{ $tahun }}</option>
                                              @endforeach
                                        </select>
                                        <i class="fas fa-chevron-down" style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);"></i>
                                    </div>
                                    

            </div>
            <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
                
                                    
                                      <div style="position: relative; width: 70%;">
                                          <button type="submit" id="searchButton" class="btn btn-primary" style="height: 35px; width: 60%; margin-left: auto; line-height: 27px; padding-top: 5px;">Select</button>

                                  
                                      </div>
                                      
              
            </div>
        </div>
      </form>
  </div>
<br>
<div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
              <div class="card-header p-2 pt-2">
                      <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                  <i class="material-icons opacity-10">weekend</i>
                      </div>
                      @php
                        $total_sales = ($Data['salebygrouptag']['grandsumsubtotalreimbursement'] ?? 0) + ($Data['salebygrouptag']['grandsumsubtotalpd'] ?? 0);
                        $target_sales = ($Data['oldsalebygrouptag']['grandsumsubtotalpd'] ?? 0) + ($Data['oldsalebygrouptag']['grandsumsubtotalreimbursement'] ?? 0);
                        
                        // Periksa apakah nilai target_sales tidak null sebelum melakukan perhitungan pertumbuhan
                        if ($target_sales != 0) {
                            $growth_percent = round(($total_sales - $target_sales) / $target_sales * 100, 1);
                            $growth_percent = number_format($growth_percent, 2);
                            $growth_color = ($growth_percent > 0) ? 'color: #81d593;' : (($growth_percent < 0) ? 'color: #d58181;' : 'color: #626262;');
                            $growth_icon = ($growth_percent > 0) ? 'material-icons">arrow_upward' : (($growth_percent < 0) ? 'material-icons">arrow_downward' : 'material-icons">arrow_upward');
                        } else {
                            // Jika target_sales null, atur nilai pertumbuhan dan warna menjadi null
                            $growth_percent = null;
                            $growth_color = null;
                            $growth_icon = null;
                        }
                      @endphp

                      <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize"> &nbsp; Pindah gudang & reimbursement</p>
                            <h4 class="mb-0"> {{
                                  number_format(
                                      $Data['salebygrouptag']['grandsumsubtotalreimbursement'] + $Data['salebygrouptag']['grandsumsubtotalpd'], 
                                      0, 
                                      ',', 
                                      '.' 
                                  )
                              }}
                            </h4>
                      </div>
              </div>


              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                  @if($total_sales==0)
                   <p class="mb-0"><span style="{{ $growth_color }}" ><i class="material-icons opacity-10" style="{{ $growth_color }}"></i> </span></p>
                  @elseif($growth_percent<0)
                   <p class="mb-0"><span style="{{ $growth_color }}" ><i class="material-icons opacity-10" style="{{ $growth_color }}">arrow_downward</i>{{ $growth_percent }}% </span></p>
                  @elseif($growth_percent>0)
                   <p class="mb-0"><span style="{{ $growth_color }}" ><i class="material-icons opacity-10" style="{{ $growth_color }}">arrow_upward</i>{{ $growth_percent }}% </span></p>
                
                   @endif
              </div>
          </div>
      </div>

      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-2 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">attach_money</i>
              </div>
              @php
                  $total_sales = $Data['salebygrouptag']['grandsumsubtotal'] ?? 0;
                  $target_sales = $Data['oldsalebygrouptag']['grandsumsubtotal'] ?? 0;
                  
                  // Periksa apakah nilai target_sales tidak null dan tidak sama dengan nol sebelum melakukan perhitungan pertumbuhan
                  if ($target_sales != 0) {
                      $growth_percent = round(($total_sales - $target_sales) / $target_sales * 100, 1);
                      $growth_percent = number_format($growth_percent, 2);
                      $growth_color = ($growth_percent > 0) ? 'color: #81d593;' : (($growth_percent < 0) ? 'color: #d58181;' : 'color: #626262;');
                      $growth_icon = ($growth_percent > 0) ? 'material-icons">arrow_upward' : (($growth_percent < 0) ? 'material-icons">arrow_downward' : 'material-icons">arrow_upward');
                  } else {
                      // Jika target_sales null atau nol, atur nilai pertumbuhan dan warna menjadi null
                      $growth_percent = null;
                      $growth_color = null;
                      $growth_icon = null;
                  }
              @endphp

              <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Omzet bulan ini</p>
                    <h4 class="mb-0">{{

                          number_format(
                              $Data['salebygrouptag']['grandsumsubtotal'], 
                              0, 
                              ',', 
                              '.' 
                          )
                      }}
                    </h4>
              </div>

          </div>

            <hr class="dark horizontal my-0">

            <div class="card-footer p-3">
                @if($Data['salebygrouptag']['grandsumsubtotal']==0)
                    <p class="mb-0"><span style="{{ $growth_color }}" ><i class="material-icons opacity-10" style="{{ $growth_color }}"></i></span></p>
                @elseif($growth_percent<0)
                    <p class="mb-0"><span style="{{ $growth_color }}" ><i class="material-icons opacity-10" style="{{ $growth_color }}">arrow_downward</i>{{ $growth_percent }}% </span></p>
                @elseif($growth_percent>0)
                    <p class="mb-0"><span style="{{ $growth_color }}" ><i class="material-icons opacity-10" style="{{ $growth_color }}">arrow_upward</i>{{ $growth_percent }}% </span></p>
                
                @endif
            </div>

        </div>
      </div>




      <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-2 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">money</i>
            </div>
                  @php
                    $total_sales = $Data['salebygrouptag']['grandsumsubtotal'];
                    $target_sales = 700000000;
                    $growth_percent = $growth_percent = round(($total_sales - $target_sales) / $target_sales * 100, 1);
                    $growth_percent = number_format($growth_percent, 2);
                    $growth_color = ($growth_percent > 0) ? 'color: #81d593;' : (($growth_percent < 0) ? 'color: #d58181;' : 'color: #626262;');
                    
                    $growth_icon = ($growth_percent > 0) ? 'material-icons">arrow_upward' : (($growth_percent < 0) ? 'material-icons">arrow_downward' : 'material-icons">arrow_upward');

                @endphp

              <div class="text-end pt-1">
                  <p class="text-sm mb-0 text-capitalize">Pencapaian target <br>penjualan</p>
                  
                  @if($total_sales > 0)
                      <h4 class="custom-p" title="Rp. {{ number_format($total_sales - $target_sales) }}" style="{{ $growth_color }}">
                          <i class="material-icons opacity-10">arrow_upward</i> {{ $growth_percent }}%
                      </h4>
                  @elseif($total_sales < 0)
                      <h4 class="custom-p" title="Rp. {{ number_format($total_sales - $target_sales) }}" style="{{ $growth_color }}">
                          <i class="material-icons opacity-10">arrow_downward</i> {{ $growth_percent }}%
                      </h4>
                      @else
                        <h4 class="custom-p" title="Rp. {{ number_format($total_sales - $target_sales) }}" >
                          <i class="material-icons opacity-10"></i> 0
                      </h4>
                  @endif
              </div>
          </div>
         
        </div>
      </div>

       <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-2 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">shop</i>
              </div>
            @php
              $totalitem = 0;

              if(isset($Data['salebyproduct']['newdata'])){
                  foreach ($Data['salebyproduct']['newdata'] as $key => $value) {
                      $totalitem = $totalitem + $value['frequency'];
                  }
              }

              $oldtotalitem = 0;

              if(isset($Data['oldsalebyproduct']['newdata'])){
                  foreach ($Data['oldsalebyproduct']['newdata'] as $key => $value) {
                      $oldtotalitem = $oldtotalitem + $value['frequency'];
                  }
              }

              if($totalitem != 0 && $oldtotalitem != 0){
                  $growthitem = round(($totalitem - $oldtotalitem) / $oldtotalitem * 100, 1);
                  
                  if($growthitem > 0){
                      $growthcolor = 'color: #81d593;';
                      $growthicon = 'icon-arrow-up7';
                  }
                  elseif($growthitem < 0){
                      $growthcolor = 'color: #d58181;';
                      $growthicon = 'icon-arrow-down7';
                  }else{
                      $growthcolor = 'color: #626262;';
                      $growthicon = 'icon-arrow-up7';
                  }
              }else{
                  // Jika $totalitem atau $oldtotalitem null, atur nilai pertumbuhan, warna, dan ikon menjadi null
                  $growthitem = null;
                  $growthcolor = null;
                  $growthicon = null;
              }
          @endphp


              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Item sale</p>
                <h4 class="mb-0">{{$totalitem == 0 ? '0' : number_format($totalitem)}}</h4>
              </div>
            </div>

            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               @if($growthitem<0)
            <p class="mb-0"><span style="{{ $growthcolor }}" ><i class="material-icons opacity-10" style="{{ $growthcolor }}">arrow_downward</i>{{ $growthitem }}% </span></p>
            @elseif($growthitem>0)
             <p class="mb-0"><span style="{{ $growthcolor }}" ><i class="material-icons opacity-10" style="{{ $growthcolor }}">arrow_upward</i>{{ $growthitem }}% </span></p>
             @elseif($totalitem==0)
             <p class="mb-0"><span style="{{ $growthcolor }}" ><i class="material-icons opacity-10" style="{{ $growthcolor }}"></i> </span></p>
             @endif
            </div>
          </div>
      </div>

       <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-2 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
              @php
                  $growthcustomer = null;
                  $growthcolor = null;
                  $growthicon = null;

                  if(isset($Data['newcustomer']) && isset($Data['oldnewcustomer']) && $Data['oldnewcustomer'] != 0) {
                      $growthcustomer = round(($Data['newcustomer'] - $Data['oldnewcustomer']) / $Data['oldnewcustomer'] * 100, 1);

                      if($growthcustomer > 0) {
                          $growthcolor = 'color: #81d593;';
                          $growthicon = 'icon-arrow-up7';
                      } elseif($growthcustomer < 0) {
                          $growthcolor = 'color: #d58181;';
                          $growthicon = 'icon-arrow-down7';
                      } else {
                          $growthcolor = 'color: #626262;';
                          $growthicon = 'icon-arrow-up7';
                      }
                  } elseif(isset($Data['newcustomer']) && isset($Data['oldnewcustomer']) && $Data['oldnewcustomer'] == 0) {
                      // Jika oldnewcustomer adalah 0, berarti tidak ada pertumbuhan karena tidak ada data lama
                      $growthcolor = 'color: #626262;';
                      $growthcustomer = 0;
                      $growthicon = 'icon-arrow-up7';
                  } else {
                      // Jika salah satu data tidak tersedia, atau oldnewcustomer null, tampilkan pesan error
                      $growthcolor = 'color: #ff0000;'; // Warna merah untuk pesan error
                      $growthcustomer = 'Data tidak tersedia'; // Pesan error
                      $growthicon = ''; // Tidak ada ikon pada pesan error
                  }
              @endphp
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">New customer</p>
              <h4 class="mb-0">{{$Data['newcustomer']}}
</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
             @if($Data['newcustomer']==0)
             <p class="mb-0"><span style="{{ $growthcolor }}" ><i class="material-icons opacity-10" style="{{ $growthcolor }}"></i> </span></p>
            @elseif($growthcustomer<0)
            <p class="mb-0"><span style="{{ $growthcolor }}" ><i class="material-icons opacity-10" style="{{ $growthcolor }}">arrow_downward</i>{{ $growthcustomer }}% </span></p>
            @elseif($growthcustomer>0)
             <p class="mb-0"><span style="{{ $growthcolor }}" ><i class="material-icons opacity-10" style="{{ $growthcolor }}">arrow_upward</i>{{ $growthcustomer }}% </span></p>
            
             @endif
          </div>
        </div>
      </div>

     
    </div>
    <div class="row mt-4">

      <div class="col-lg-4 col-md-12 mb-md-0 mb-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h5>Berdasarkan Channel Penjualan</h5>
              
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Channel Penjualan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jumlah Transaksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai Transaksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Rata-rata</th>
                  </tr>
                </thead>
                <tbody>

              @php
                $labelNames = $Data['ratiosalebytaggraph']['labelName'];
                $arrFrequency = $Data['ratiosalebytaggraph']['arrfrequency'];

                $grandsum = 'Grand Total';
                $sumtotal = $Data['salebygrouptag']['grandsumtransaction'];
                
                $finsihsum = 'Finish';
                $finishtotal = $Data['salebygrouptag']['transactionfinish'];
                
                $draftsum = 'Draft';
                $drafttotal = $Data['salebygrouptag']['transactiondraft'];
                
                $nilaitransaksi = $Data['ratiosalebytaggraph']['arrmonetary'];
                $nilaigrandsum = $Data['salebygrouptag']['grandsumsubtotal'];
                $nilaisubtotalfinish = $Data['salebygrouptag']['subtotalfinish'];
                $nilaisubtotaldraft = $Data['salebygrouptag']['subtotaldraft'];

                $averages_grandsum =$Data['salebygrouptag']['grandaverage']; 
                $averages = [];

                foreach($Data['salebygrouptag']['newdata'] as $item) {
                    foreach ($Data['ratiosalebytaggraph']['labelName'] as $index => $label) {
                        if ($item['name'] === $label) {
                            $averages[$label] = $item['average'];
                            break;
                        }
                    }
                }
                 

                // Merge the $nilaitransaksi array into $labelNames
                $labelNames = array_merge($labelNames, [$finsihsum, $draftsum, $grandsum]);
                $nilaitransaksi = array_merge($nilaitransaksi, [$nilaisubtotalfinish, $nilaisubtotaldraft, $nilaigrandsum]);

                
            @endphp

           @foreach( $labelNames as $index => $data)
              <tr>
                  <td>{{ $data }}</td>
                  @if($data == $grandsum)
                      <td>{{ $sumtotal }}</td>
                      <td>Rp {{ number_format($nilaigrandsum, 0, '.', ',') }}</td>
                  <td>Rp {{ number_format(isset($averages_grandsum) ? $averages_grandsum : 0, 0, '.', ',') }}</td>
                  @elseif($data == $finsihsum)
                      <td>{{ $finishtotal }}</td>
                      <td>Rp {{ number_format($nilaisubtotalfinish, 0, '.', ',') }}</td>
                    <td>
                        @if($Data['salebygrouptag']['transactionfinish'] != 0)
                            Rp {{ number_format(($Data['salebygrouptag']['subtotalfinish'] / $Data['salebygrouptag']['transactionfinish']), 0, '.', ',') }}
                        @else
                            Rp 0
                        @endif
                    </td>

                  @elseif($data == $draftsum)
                      <td>{{ $drafttotal }}</td>
                      <td>Rp {{ number_format($nilaisubtotaldraft, 0, '.', ',') }}</td>
                      <td>
                      @if($Data['salebygrouptag']['transactiondraft'] != 0)
                      Rp {{ number_format(($Data['salebygrouptag']['subtotaldraft'] / $Data['salebygrouptag']['transactiondraft']) ?? 0, 0, '.', ',') }}
                     @else
                            Rp 0
                        @endif</td>

                  @else
                      <td>{{ isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 0 }}</td>

                      <td>{{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format($nilaitransaksi[$index][0], 0, '.', ',') : 'Rp 0' }}</td>
                      <td>
                        @if ($index === 5)
                       {{ (isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) && $nilaitransaksi[$index][0] != 0 && isset($arrFrequency[$index]) && $arrFrequency[$index][0] != 0) ? 'Rp '.number_format(($nilaitransaksi[$index][0] / $arrFrequency[$index][0]), 0, '.', ',') : 'Rp 0' }}

                        @elseif ($index === 6)
                       {{ (isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) && isset($arrFrequency[$index])) ? 'Rp '.number_format(($nilaitransaksi[$index][0] / ($arrFrequency[$index][0] != 0 ? $arrFrequency[$index][0] : 1)), 0, '.', ',') : 'Rp 0' }}


                       @else
                           Rp {{ number_format(isset($averages[$data]) ? $averages[$data] : 0, 0, '.', ',') }}
                       @endif
                    </td>

                  @endif
              </tr>
          @endforeach

                                
                </tbody>
              </table>
           
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class=" shadow-primary border-radius-lg py-3 pe-1">
                      <div class="card-body ">
                          <h6 class="mb-0">Jumlah Transaksi Berdasarkan Channel Penjualan</h6>
                      
                          <hr class="dark horizontal">
                          <div class="d-flex">
                   
                             
                          </div>
                      </div>
                      <div class="chart">
                          <canvas id="chart-bars2" style="height: 100%; min-height: 200px;"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>

        <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class=" shadow-primary border-radius-lg py-3 pe-1">
                    <div class="card-body ">
                        <h6 class="mb-0">Omzet Penjualan Berdasarkan Channel Penjualan</h6>
              
                        <hr class="dark horizontal">
                        <div class="d-flex">
                          
                        </div>
                    </div>
                      <div class="chart">
                          <canvas id="chart-bars3" style="height: 100%; min-height: 200px;"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>


    </div>

    <!-- Berdasarkan Sales -->
    <div class="row mt-4">
      
      <div class="col-lg-4 col-md-12 mb-md-0 mb-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h5>Berdasarkan Sales</h5>
              
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama Sales</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jumlah Transaksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai Transaksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Rata-rata</th>
                  </tr>
                </thead>
                <tbody>

              @php
                $labelNames = $Data['ratiosalebysalesgraph']['labelName'];
                $arrFrequency = $Data['ratiosalebysalesgraph']['arrfrequency'];

                $grandsum = 'Grand Total';
                $sumtotal = $Data['salebygrouptag']['grandsumtransaction'];
                
                $finsihsum = 'Finish';
                $finishtotal = $Data['salebygrouptag']['transactionfinish'];
                
                $draftsum = 'Draft';
                $drafttotal = $Data['salebygrouptag']['transactiondraft'];
                
                $nilaitransaksi = $Data['ratiosalebysalesgraph']['arrmonetary'];
                $nilaigrandsum = $Data['salebygrouptag']['grandsumsubtotal'];
                $nilaisubtotalfinish = $Data['salebygrouptag']['subtotalfinish'];
                $nilaisubtotaldraft = $Data['salebygrouptag']['subtotaldraft'];

                $averages_grandsum =$Data['salebygrouptag']['grandaverage']; 
                $averages = [];

                foreach($Data['salebysales']['newdata'] as $item) {
                    foreach ($Data['ratiosalebysalesgraph']['labelName'] as $index => $label) {
                        if ($item['name'] === $label) {
                            $averages[$label] = $item['average'];
                            break;
                        }
                    }
                }
                 

                // Merge the $nilaitransaksi array into $labelNames
                $labelNames = array_merge($labelNames, [$grandsum]);
                $nilaitransaksi = array_merge($nilaitransaksi, [$nilaisubtotalfinish, $nilaisubtotaldraft, $nilaigrandsum]);

                
            @endphp

           @foreach( $labelNames as $index => $data)
              <tr>
                  <td>{{ $data }}</td>
                  @if($data == $grandsum)
                      <td>{{ $sumtotal }}</td>
                      <td>Rp {{ number_format($nilaigrandsum, 0, '.', ',') }}</td>
                  <td>Rp {{ number_format(isset($averages_grandsum) ? $averages_grandsum : 0, 0, '.', ',') }}</td>
                  @elseif($data == $finsihsum)
                      <td>{{ $finishtotal }}</td>
                      <td>Rp {{ number_format($nilaisubtotalfinish, 0, '.', ',') }}</td>
                    <td>
                        @if($Data['salebygrouptag']['transactionfinish'] != 0)
                            Rp {{ number_format(($Data['salebygrouptag']['subtotalfinish'] / $Data['salebygrouptag']['transactionfinish']), 0, '.', ',') }}
                        @else
                            Rp 0
                        @endif
                    </td>

                  @elseif($data == $draftsum)
                      <td>{{ $drafttotal }}</td>
                      <td>Rp {{ number_format($nilaisubtotaldraft, 0, '.', ',') }}</td>
                      <td>
                      @if($Data['salebygrouptag']['transactiondraft'] != 0)
                      Rp {{ number_format(($Data['salebygrouptag']['subtotaldraft'] / $Data['salebygrouptag']['transactiondraft']) ?? 0, 0, '.', ',') }}
                     @else
                            Rp 0
                        @endif</td>

                  @else
                      <td>{{ isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 0 }}</td>

                      <td>{{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format($nilaitransaksi[$index][0], 0, '.', ',') : 'Rp 0' }}</td>
                      <td>
                        @if ($index === 5)
                          {{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format(($nilaitransaksi[$index][0] / (isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 1)), 0, '.', ',') : 'Rp 0' }}
                        @elseif ($index === 6)
                          {{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format(($nilaitransaksi[$index][0] / (isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 1)), 0, '.', ',') : 'Rp 0' }}

                       @else
                           Rp {{ number_format(isset($averages[$data]) ? $averages[$data] : 0, 0, '.', ',') }}
                       @endif
                    </td>

                  @endif
              </tr>
          @endforeach

                                
                </tbody>
              </table>
           
            </div>
          </div>
        </div>
      </div>

       <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class=" shadow-primary border-radius-lg py-3 pe-1">
                      <div class="card-body ">
                          <h6 class="mb-0">Jumlah Transaksi Berdasarkan Channel Sales</h6>
                      
                          <hr class="dark horizontal">
                          <div class="d-flex">
                   
                             
                          </div>
                      </div>
                      <div class="chart">
                          <canvas id="chart-bars4" style="height: 100%; min-height: 200px;"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>

       <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class=" shadow-primary border-radius-lg py-3 pe-1">
                      <div class="card-body ">
                          <h6 class="mb-0">Omzet Penjualan Berdasarkan Sales</h6>
                      
                          <hr class="dark horizontal">
                          <div class="d-flex">
                   
                             
                          </div>
                      </div>
                      <div class="chart">
                          <canvas id="chart-bars5" style="height: 100%; min-height: 200px;"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>

    </div>


    <!-- Berdasarkan Perusahaan -->
    <div class="row mt-4">
      
      <div class="col-lg-4 col-md-12 mb-md-0 mb-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="row">
              <div class="col-lg-6 col-7">
                <h5>Berdasarkan Perusahaan</h5>
              
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <div class="dropdown float-lg-end pe-4">
                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-ellipsis-v text-secondary"></i>
                  </a>
                  <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                           <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama Sales</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jumlah Transaksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai Transaksi</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Rata-rata</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                    $labelNames = $Data['ratiosalebycompanygraph']['labelName'];
                    $arrFrequency = $Data['ratiosalebycompanygraph']['arrfrequency'];

                    $grandsum = 'Grand Total';
                    $sumtotal = $Data['salebygrouptag']['grandsumtransaction'];
                    
                    $finsihsum = 'Finish';
                    $finishtotal = $Data['salebygrouptag']['transactionfinish'];
                    
                    $draftsum = 'Draft';
                    $drafttotal = $Data['salebygrouptag']['transactiondraft'];
                    
                    $nilaitransaksi = $Data['ratiosalebycompanygraph']['arrmonetary'];
                    $nilaigrandsum = $Data['salebygrouptag']['grandsumsubtotal'];
                    $nilaisubtotalfinish = $Data['salebygrouptag']['subtotalfinish'];
                    $nilaisubtotaldraft = $Data['salebygrouptag']['subtotaldraft'];

                    $averages_grandsum =$Data['salebygrouptag']['grandaverage']; 
                    $averages = [];

                    foreach($Data['salebycompany']['newdata'] as $item) {
                        foreach ($Data['ratiosalebycompanygraph']['labelName'] as $index => $label) {
                            if ($item['name'] === $label) {
                                $averages[$label] = $item['average'];
                                break;
                            }
                        }
                    }
                     

                    // Merge the $nilaitransaksi array into $labelNames
                    $labelNames = array_merge($labelNames, [$grandsum]);
                    $nilaitransaksi = array_merge($nilaitransaksi, [$nilaisubtotalfinish, $nilaisubtotaldraft, $nilaigrandsum]);

                    
                   @endphp

                   @foreach( $labelNames as $index => $data)
                      <tr>
                          <td>{{ $data }}</td>
                          @if($data == $grandsum)
                              <td>{{ $sumtotal }}</td>
                              <td>Rp {{ number_format($nilaigrandsum, 0, '.', ',') }}</td>
                          <td>Rp {{ number_format(isset($averages_grandsum) ? $averages_grandsum : 0, 0, '.', ',') }}</td>
                          @elseif($data == $finsihsum)
                              <td>{{ $finishtotal }}</td>
                              <td>Rp {{ number_format($nilaisubtotalfinish, 0, '.', ',') }}</td>
                            <td>
                                @if($Data['salebygrouptag']['transactionfinish'] != 0)
                                    Rp {{ number_format(($Data['salebygrouptag']['subtotalfinish'] / $Data['salebygrouptag']['transactionfinish']), 0, '.', ',') }}
                                @else
                                    Rp 0
                                @endif
                            </td>

                          @elseif($data == $draftsum)
                              <td>{{ $drafttotal }}</td>
                              <td>Rp {{ number_format($nilaisubtotaldraft, 0, '.', ',') }}</td>
                              <td>
                              @if($Data['salebygrouptag']['transactiondraft'] != 0)
                              Rp {{ number_format(($Data['salebygrouptag']['subtotaldraft'] / $Data['salebygrouptag']['transactiondraft']) ?? 0, 0, '.', ',') }}
                             @else
                                    Rp 0
                                @endif</td>

                          @else
                              <td>{{ isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 0 }}</td>

                              <td>{{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format($nilaitransaksi[$index][0], 0, '.', ',') : 'Rp 0' }}</td>
                              <td>
                                @if ($index === 5)
                                  {{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format(($nilaitransaksi[$index][0] / (isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 1)), 0, '.', ',') : 'Rp 0' }}
                                @elseif ($index === 6)
                                  {{ isset($nilaitransaksi[$index]) && is_array($nilaitransaksi[$index]) ? 'Rp '.number_format(($nilaitransaksi[$index][0] / (isset($arrFrequency[$index]) ? $arrFrequency[$index][0] : 1)), 0, '.', ',') : 'Rp 0' }}

                               @else
                                   Rp {{ number_format(isset($averages[$data]) ? $averages[$data] : 0, 0, '.', ',') }}
                               @endif
                            </td>

                          @endif
                      </tr>
                  @endforeach

                                
                </tbody>
              </table>
           
            </div>
          </div>
        </div>
      </div>

       <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class=" shadow-primary border-radius-lg py-3 pe-1">
                      <div class="card-body ">
                          <h6 class="mb-0">Jumlah Transaksi Berdasarkan Perusahaan</h6>
                      
                          <hr class="dark horizontal">
                          <div class="d-flex">
                   
                             
                          </div>
                      </div>
                      <div class="chart">
                          <canvas id="chart-bars6" style="height: 100%; min-height: 200px;"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>

       <div class="col-lg-4 col-md-6 mt-4 mb-4">
          <div class="card z-index-2">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                  <div class=" shadow-primary border-radius-lg py-3 pe-1">
                      <div class="card-body ">
                          <h6 class="mb-0">Omzet Penjualan Berdasarkan Perusahaan</h6>
                      
                          <hr class="dark horizontal">
                          <div class="d-flex">
                   
                             
                          </div>
                      </div>
                      <div class="chart">
                          <canvas id="chart-bars7" style="height: 100%; min-height: 200px;"></canvas>
                      </div>
                  </div>
              </div>
              
          </div>
      </div>

    </div>

    <!-- Card Rata - Rata Lama Penyelesaian Masalah (hari) -->
    <div class="row mt-4">
          
          <div class="col-lg-12 col-md-12 mb-md-0 mb-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h5>Rata - Rata Lama Penyelesaian Masalah (hari)</h5>
                  
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                <!--   <table class="table align-items-center mb-0" >
                    <thead>
                      <tr>
                               <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        array_unshift($Data['allteknisi'], [
                                "id"=>0,
                                "id_jabatan"=> 2,
                                "id_position"=> 2,
                                "id_bee"=> 0,
                                "username"=> "elly_teknisi.maxipro",
                                "password"=> "def50200f804ca32315de6188544e4bd554b2656fb5f5bb8c16be0d52ff1ab27ebac2da3fa2276bfe0f05d167ef3d7d4c1573b7df865f4ccc21ee6c1174d4c8fba5981e501845a3587d0bad423a7928c03fef6f589a73b2db78982335dc8",
                                "password_name"=> "Maxipro123",
                                "name"=> "Elly Giatmoko",
                                "code_name"=> "EL",
                                "email"=> "ellymaxipro@gmail.com",
                                "no_tlp"=> "081133330372",
                                "no_tlp2"=> "087711447364",
                                "ekstensi"=> "300",
                                "status"=> "Supervisor",
                                "status_regis"=> 1,
                                "status_profile"=> 1,
                                "image"=> "elly-giatmoko.png",
                                "status_sales"=> "0",
                                "statusbar"=> "0",
                                "created_at"=> "2018-12-11 16:14:49",
                                "updated_at"=> "2022-08-05 21:18:58",
                                "urlupdate"=> "https://maxipro.id/administrator/teknisi/update/28/elly-giatmoko",
                                "urldelete"=> "https://maxipro.id/administrator/teknisi/delete/28",
                                "imagedir"=> "https://maxipro.id.test/images/teknisi/elly-giatmoko.png"
                        ]);
                      @endphp
                      @foreach ($Data['allteknisi'] as $teknisi) 
                        <tr><td>{{ $teknisi['name'] }}</td>
                        <td>  @if ($teknisi['id_jabatan'] == 4)
                    Teknisi
                    @else
                    {{ $teknisi['status'] }}
                    @endif
                     </td>
                        </tr>                 
                      @endforeach
                    </tbody>
                  </table> -->
                  <table class="table align-items-center mb-0" id="teknisi-table">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jabatan</th>
                         <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Nilai</th>
                      </tr>
                    </thead>
                    <tbody id="teknisi-body">
                      <!-- Data akan diisi dengan JavaScript -->
                    </tbody>
                  </table>

               
                </div>
              </div>
            </div>
          </div>
    </div>

    <!-- Card Job Deskripsi -->
     <div class="row mt-4">
          <div class="col-lg-4 col-md-12 mb-md-0 mb-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h5>Job Deskripsi</h5>
                  
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <!-- <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                               <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                  </table> -->
               
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 mb-md-0 mb-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h5>KPI</h5>
                  
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <!-- <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                               <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                  </table> -->
               
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 mb-md-0 mb-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h5>SOP (Standar Operasional Prosedur)</h5>
                  
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <!-- <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                               <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                  </table> -->
               
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-12 mb-md-0 mb-12">
            <div class="card">
              <div class="card-header pb-0">
                <div class="row">
                  <div class="col-lg-6 col-7">
                    <h5>Deskripsi</h5>
                  
                  </div>
                  <div class="col-lg-6 col-5 my-auto text-end">
                    <div class="dropdown float-lg-end pe-4">
                      <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-secondary"></i>
                      </a>
                      <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive">
                  <!-- <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                               <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nama</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-0 text-start">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-3 text-start">Nilai</th>
                   
                      </tr>
                    </thead>
                    <tbody>
                
                    </tbody>
                  </table> -->
               
                </div>
              </div>
            </div>
          </div>
    </div>

    <footer class="footer py-4  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
               by
              <a href="" class="font-weight-bold" target="_blank">PT Maxipro Group Indonesia</a>
             
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <!-- <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
              </li> -->
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</main>
<div class="fixed-plugin">
  <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
    <i class="material-icons py-2">settings</i>
  </a>
  <div class="card shadow-lg">
    <div class="card-header pb-0 pt-3">
      <div class="float-start">
        <h5 class="mt-3 mb-0">Material UI Setting</h5>
        <!-- <p>See our dashboard options.</p> -->
      </div>
      <div class="float-end mt-4">
        <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
          <i class="material-icons">clear</i>
        </button>
      </div>
      <!-- End Toggle Button -->
    </div>
    <hr class="horizontal dark my-1">
    <div class="card-body pt-sm-3 pt-0">
      <!-- Sidebar Backgrounds -->
      <div>
        <h6 class="mb-0">Sidebar Colors</h6>
      </div>
      <a href="javascript:void(0)" class="switch-trigger background-color">
        <div class="badge-colors my-2 text-start">
          <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
          <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
        </div>
      </a>
      <!-- Sidenav Type -->
      <div class="mt-3">
        <h6 class="mb-0">Sidenav Type</h6>
        <p class="text-sm">Choose between 2 different sidenav types.</p>
      </div>
      <div class="d-flex">
        <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
        <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
      </div>
      <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
      <!-- Navbar Fixed -->
      <div class="mt-3 d-flex">
        <h6 class="mb-0">Navbar Fixed</h6>
        <div class="form-check form-switch ps-0 ms-auto my-auto">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
      </div>
      <hr class="horizontal dark my-3">
      <div class="mt-2 d-flex">
        <h6 class="mb-0">Light / Dark</h6>
        <div class="form-check form-switch ps-0 ms-auto my-auto">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
        </div>
      </div>
      <hr class="horizontal dark my-sm-4">
   <!--    <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a> -->
      <!-- <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a> -->
      <div class="w-100 text-center">
        <!-- <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
        <h6 class="mt-3">Thank you for sharing!</h6> -->
        <!-- <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
          <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
        </a> -->
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
$('.bulan-search').select2({
    theme: "bootstrap" // Ganti tema sesuai kebutuhan Anda, misalnya "bootstrap"
}).next('.select2-container').find('.select2-selection').css({
    'background-color': 'white',
    'border': '1px solid #ced4da', // Menambahkan border
    'width': '100%', // Memperbesar ukuran elemen Select2
    'border-radius': '5px',
    'height':'36px',
    'line-height': '33px'
});

$('.tahun-search').select2({
    theme: "bootstrap" // Ganti tema sesuai kebutuhan Anda, misalnya "bootstrap"
}).next('.select2-container').find('.select2-selection').css({
    'background-color': 'white',
    'border': '1px solid #ced4da', // Menambahkan border
    'width': '100%', // Memperbesar ukuran elemen Select2
    'border-radius': '5px',
    'height':'36px',
    'line-height': '33px'
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- chart bar Jumlah Transaksi Berdasarkan Channel Penjualan -->
<script>
    // Data transaksi per tahun
    var tahun = [
    {{ $Data['dateName'][2] }},
    {{ $Data['dateName'][1] }},
    {{ $Data['dateName'][0] }},
    ]; // Tambahkan tahun di sini
    // var jumlahTransaksi = [100, 200, 300]; // Tambahkan jumlah transaksi per tahun di sini
    var jumlahTransaksi = [
    @foreach($Data['ratiosalebytaggraph']['arrfrequency'] as $subarray)
        [
        @foreach($subarray as $element)
            '{{ $element }}', // Ambil setiap elemen dalam subarray
        @endforeach
        ],
    @endforeach
    ];
    //console.log(jumlahTransaksi);
    var judulTransaksi = [
    @foreach($Data['salebygrouptag']['label'] as $data)
            '{{ $Data['salebygrouptag']['label'][$loop->index] }}', // Nama transaksi sebagai label
        @endforeach
        ];
        
    // Inisialisasi chart tanpa responsif
    var ctx = document.getElementById('chart-bars2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tahun,
         datasets: [
    @foreach($Data['ratiosalebytaggraph']['labelName'] as $index => $data)
        {
            label: '{{ $data }}',
            data: [
                @php
                    $arrfrequency = array_reverse($Data['ratiosalebytaggraph']['arrfrequency'][$index]);
                @endphp
                @foreach($arrfrequency as $value)
                    {{ $value }},
                @endforeach
            ],
            backgroundColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1.5)',
            borderColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1)',
            borderWidth: 1
        },
        @endforeach
    ]

        },
        options: {
            animation: {
                duration: 0 // Menonaktifkan animasi
            },
            responsive: false, // Menonaktifkan responsif
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: 'white' // Mengubah warna teks label sumbu y (jumlah transaksi)
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'white' // Mengubah warna teks label sumbu x (tahun)
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: 'white' // Mengubah warna teks label legenda (misalnya 'Jumlah Transaksi')
                }
            }
        }
    });

    // Mengubah warna teks tahun dan jumlah transaksi menjadi putih
    var chartElement = document.getElementById('chart-bars2');
    chartElement.style.color = 'blue'; // Mengubah warna teks
    chartElement.getElementsByClassName('chartjs-y-axis')[0].style.color = 'blue'; // Mengubah warna teks label sumbu y (jumlah transaksi)
</script>

<!-- chart bar Omzet Penjualan Berdasarkan Channel Penjualan -->
<script>
    // Data transaksi per tahun
    var tahun = [
    {{ $Data['dateName'][2] }},
    {{ $Data['dateName'][1] }},
    {{ $Data['dateName'][0] }},
    ]; // Tambahkan tahun di sini
    // var jumlahTransaksi = [100, 200, 300]; // Tambahkan jumlah transaksi per tahun di sini
      var jumlahTransaksi = [
    @foreach($Data['ratiosalebytaggraph']['arrfrequency'] as $subarray)
        [
        @foreach($subarray as $element)
            '{{ $element }}', // Ambil setiap elemen dalam subarray
        @endforeach
        ],
    @endforeach
    ];
        //console.log(jumlahTransaksi);
        var judulTransaksi = [
    @foreach($Data['salebygrouptag']['label'] as $data)
            '{{ $Data['salebygrouptag']['label'][$loop->index] }}', // Nama transaksi sebagai label
        @endforeach
        ];
        
        // Inisialisasi chart tanpa responsif
        var ctx = document.getElementById('chart-bars3').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                  labels: tahun,
                  datasets:[
                  @foreach($Data['ratiosalebytaggraph']['labelName'] as $index => $data)
                      {
                          label: '{{ $data }}',
                          data: [
                              @php
                                  $arrmonetary = array_reverse($Data['ratiosalebytaggraph']['arrmonetary'][$index]);
                              @endphp
                              @foreach($arrmonetary as $value)
                                  {{ $value }},
                              @endforeach
                          ],
                          backgroundColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1.5)',
                          borderColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1)',
                          borderWidth: 1
                      },
                  @endforeach
              ]

            },
            options: {
                animation: {
                    duration: 0 // Menonaktifkan animasi
                },
                responsive: false, // Menonaktifkan responsif
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: 'white' // Mengubah warna teks label sumbu y (jumlah transaksi)
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: 'white' // Mengubah warna teks label sumbu x (tahun)
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: 'white' // Mengubah warna teks label legenda (misalnya 'Jumlah Transaksi')
                    }
                }
            }
        });

        // Mengubah warna teks tahun dan jumlah transaksi menjadi putih
        var chartElement = document.getElementById('chart-bars3');
        chartElement.style.color = 'blue'; // Mengubah warna teks
        chartElement.getElementsByClassName('chartjs-y-axis')[0].style.color = 'blue'; // Mengubah warna teks label sumbu y (jumlah transaksi)
</script>

<!-- chart bar Jumlah Transaksi Berdasarkan Channel Sales -->
<script>
    // Data transaksi per tahun
    var tahun = [
    {{ $Data['dateName'][2] }},
    {{ $Data['dateName'][1] }},
    {{ $Data['dateName'][0] }},
    ]; // Tambahkan tahun di sini
    // var jumlahTransaksi = [100, 200, 300]; // Tambahkan jumlah transaksi per tahun di sini
    var jumlahTransaksi = [
    @foreach($Data['ratiosalebytaggraph']['arrfrequency'] as $subarray)
        [
        @foreach($subarray as $element)
            '{{ $element }}', // Ambil setiap elemen dalam subarray
        @endforeach
        ],
    @endforeach
    ];
    //console.log(jumlahTransaksi);
    var judulTransaksi = [
    @foreach($Data['salebysales']['label'] as $data)
            '{{ $Data['salebysales']['label'][$loop->index] }}', // Nama transaksi sebagai label
        @endforeach
        ];
        
    // Inisialisasi chart tanpa responsif
    var ctx = document.getElementById('chart-bars4').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tahun,
         datasets: [
    @foreach($Data['ratiosalebysalesgraph']['labelName'] as $index => $data)
        {
            label: '{{ $data }}',
            data: [
                @php
                    $arrfrequency = array_reverse($Data['ratiosalebysalesgraph']['arrfrequency'][$index]);
                @endphp
                @foreach($arrfrequency as $value)
                    {{ $value }},
                @endforeach
            ],
            backgroundColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1.5)',
            borderColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1)',
            borderWidth: 1
        },
        @endforeach
    ]

        },
        options: {
            animation: {
                duration: 0 // Menonaktifkan animasi
            },
            responsive: false, // Menonaktifkan responsif
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: 'white' // Mengubah warna teks label sumbu y (jumlah transaksi)
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'white' // Mengubah warna teks label sumbu x (tahun)
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: 'white' // Mengubah warna teks label legenda (misalnya 'Jumlah Transaksi')
                }
            }
        }
    });

    // Mengubah warna teks tahun dan jumlah transaksi menjadi putih
    var chartElement = document.getElementById('chart-bars4');
    chartElement.style.color = 'blue'; // Mengubah warna teks
    chartElement.getElementsByClassName('chartjs-y-axis')[0].style.color = 'blue'; // Mengubah warna teks label sumbu y (jumlah transaksi)
</script>

<!-- chart bar Omzet Penjualan Berdasarkan Channel Sales -->
<script>
    // Data transaksi per tahun
    var tahun = [
    {{ $Data['dateName'][2] }},
    {{ $Data['dateName'][1] }},
    {{ $Data['dateName'][0] }},
    ]; // Tambahkan tahun di sini
    // var jumlahTransaksi = [100, 200, 300]; // Tambahkan jumlah transaksi per tahun di sini
      var jumlahTransaksi = [
    @foreach($Data['ratiosalebysalesgraph']['arrfrequency'] as $subarray)
        [
        @foreach($subarray as $element)
            '{{ $element }}', // Ambil setiap elemen dalam subarray
        @endforeach
        ],
    @endforeach
    ];
        //console.log(jumlahTransaksi);
        var judulTransaksi = [
    @foreach($Data['salebysales']['label'] as $data)
            '{{ $Data['salebysales']['label'][$loop->index] }}', // Nama transaksi sebagai label
        @endforeach
        ];
        
        // Inisialisasi chart tanpa responsif
        var ctx = document.getElementById('chart-bars5').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                  labels: tahun,
                  datasets:[
                  @foreach($Data['ratiosalebysalesgraph']['labelName'] as $index => $data)
                      {
                          label: '{{ $data }}',
                          data: [
                              @php
                                  $arrmonetary = array_reverse($Data['ratiosalebysalesgraph']['arrmonetary'][$index]);
                              @endphp
                              @foreach($arrmonetary as $value)
                                  {{ $value }},
                              @endforeach
                          ],
                          backgroundColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1.5)',
                          borderColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1)',
                          borderWidth: 1
                      },
                  @endforeach
              ]

            },
            options: {
                animation: {
                    duration: 0 // Menonaktifkan animasi
                },
                responsive: false, // Menonaktifkan responsif
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: 'white' // Mengubah warna teks label sumbu y (jumlah transaksi)
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: 'white' // Mengubah warna teks label sumbu x (tahun)
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: 'white' // Mengubah warna teks label legenda (misalnya 'Jumlah Transaksi')
                    }
                }
            }
        });

        // Mengubah warna teks tahun dan jumlah transaksi menjadi putih
        var chartElement = document.getElementById('chart-bars5');
        chartElement.style.color = 'blue'; // Mengubah warna teks
        chartElement.getElementsByClassName('chartjs-y-axis')[0].style.color = 'blue'; // Mengubah warna teks label sumbu y (jumlah transaksi)
</script>

<!-- chart bar Jumlah Transaksi Berdasarkan Channel Perusahaan -->
<script>
    // Data transaksi per tahun
    var tahun = [
    {{ $Data['dateName'][2] }},
    {{ $Data['dateName'][1] }},
    {{ $Data['dateName'][0] }},
    ]; // Tambahkan tahun di sini
    // var jumlahTransaksi = [100, 200, 300]; // Tambahkan jumlah transaksi per tahun di sini
    var jumlahTransaksi = [
    @foreach($Data['ratiosalebycompanygraph']['arrfrequency'] as $subarray)
        [
        @foreach($subarray as $element)
            '{{ $element }}', // Ambil setiap elemen dalam subarray
        @endforeach
        ],
    @endforeach
    ];
    //console.log(jumlahTransaksi);
    var judulTransaksi = [
    @foreach($Data['salebycompany']['label'] as $data)
            '{{ $Data['salebycompany']['label'][$loop->index] }}', // Nama transaksi sebagai label
        @endforeach
        ];
        
    // Inisialisasi chart tanpa responsif
    var ctx = document.getElementById('chart-bars6').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tahun,
         datasets: [
    @foreach($Data['ratiosalebycompanygraph']['labelName'] as $index => $data)
        {
            label: '{{ $data }}',
            data: [
                @php
                    $arrfrequency = array_reverse($Data['ratiosalebycompanygraph']['arrfrequency'][$index]);
                @endphp
                @foreach($arrfrequency as $value)
                    {{ $value }},
                @endforeach
            ],
            backgroundColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1.5)',
            borderColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1)',
            borderWidth: 1
        },
        @endforeach
    ]

        },
        options: {
            animation: {
                duration: 0 // Menonaktifkan animasi
            },
            responsive: false, // Menonaktifkan responsif
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: 'white' // Mengubah warna teks label sumbu y (jumlah transaksi)
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: 'white' // Mengubah warna teks label sumbu x (tahun)
                    }
                }]
            },
            legend: {
                labels: {
                    fontColor: 'white' // Mengubah warna teks label legenda (misalnya 'Jumlah Transaksi')
                }
            }
        }
    });

    // Mengubah warna teks tahun dan jumlah transaksi menjadi putih
    var chartElement = document.getElementById('chart-bars4');
    chartElement.style.color = 'blue'; // Mengubah warna teks
    chartElement.getElementsByClassName('chartjs-y-axis')[0].style.color = 'blue'; // Mengubah warna teks label sumbu y (jumlah transaksi)
</script>

<!-- chart bar Omzet Penjualan Berdasarkan Channel Perusahaan -->
<script>
    // Data transaksi per tahun
    var tahun = [
    {{ $Data['dateName'][2] }},
    {{ $Data['dateName'][1] }},
    {{ $Data['dateName'][0] }},
    ]; // Tambahkan tahun di sini
    // var jumlahTransaksi = [100, 200, 300]; // Tambahkan jumlah transaksi per tahun di sini
      var jumlahTransaksi = [
    @foreach($Data['ratiosalebycompanygraph']['arrfrequency'] as $subarray)
        [
        @foreach($subarray as $element)
            '{{ $element }}', // Ambil setiap elemen dalam subarray
        @endforeach
        ],
    @endforeach
    ];
        //console.log(jumlahTransaksi);
        var judulTransaksi = [
    @foreach($Data['salebycompany']['label'] as $data)
            '{{ $Data['salebycompany']['label'][$loop->index] }}', // Nama transaksi sebagai label
        @endforeach
        ];
        
        // Inisialisasi chart tanpa responsif
        var ctx = document.getElementById('chart-bars7').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                  labels: tahun,
                  datasets:[
                  @foreach($Data['ratiosalebycompanygraph']['labelName'] as $index => $data)
                      {
                          label: '{{ $data }}',
                          data: [
                              @php
                                  $arrmonetary = array_reverse($Data['ratiosalebycompanygraph']['arrmonetary'][$index]);
                              @endphp
                              @foreach($arrmonetary as $value)
                                  {{ $value }},
                              @endforeach
                          ],
                          backgroundColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1.5)',
                          borderColor: 'rgba({{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, {{ mt_rand(0, 255) }}, 1)',
                          borderWidth: 1
                      },
                  @endforeach
              ]

            },
            options: {
                animation: {
                    duration: 0 // Menonaktifkan animasi
                },
                responsive: false, // Menonaktifkan responsif
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: 'white' // Mengubah warna teks label sumbu y (jumlah transaksi)
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: 'white' // Mengubah warna teks label sumbu x (tahun)
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontColor: 'white' // Mengubah warna teks label legenda (misalnya 'Jumlah Transaksi')
                    }
                }
            }
        });

        // Mengubah warna teks tahun dan jumlah transaksi menjadi putih
        var chartElement = document.getElementById('chart-bars5');
        chartElement.style.color = 'blue'; // Mengubah warna teks
        chartElement.getElementsByClassName('chartjs-y-axis')[0].style.color = 'blue'; // Mengubah warna teks label sumbu y (jumlah transaksi)
</script>

<script>
  // Data teknisi dalam bentuk array JavaScript
      var allteknisi = [
        @foreach ($Data['allteknisi'] as $teknisi)
          {
            id: {{ $teknisi['id'] }},
            name: '{{ $teknisi['name'] }}',
            id_jabatan: {{ $teknisi['id_jabatan'] }},
            status: '{{ $teknisi['status'] }}'



          },
        @endforeach
      ];

     var teknisispv = [
        @foreach ($Data['teknisispv'] as $teknisispv)
          {
            id_service: {{ $teknisispv['id_service'] }},
            time_teknisi: {{ $teknisispv['time_teknisi'] }},
          },
        @endforeach
      ];

    var servicespv = [
        @foreach ($Data['servicespv'] as $servicespv)
          {
            id: {{ $servicespv['id'] }},
          },
        @endforeach
      ];

      var countnumber = 0;
      var sumday = 0;

      // Loop melalui semua item dalam servicespv dan melakukan perhitungan
      servicespv.forEach(function(item) {
        countnumber2 = parseFloat(countnumber) + 1;
        sumday = parseFloat(sumday) + parseFloat(item.time);
      });

      // Hitung nilai sumvalue
      var sumvalue = (sumday == 0) ? 0 : parseFloat(sumday) / parseFloat(countnumber2);

      // Tampilkan sumvalue (misalnya ke console)
     
     
      var spkservice = [
        @foreach ($Data['spkservice'] as $spkservice)
          {
            id_teknisi: {{ $spkservice['id_teknisi'] }},
             id_service: {{ $spkservice['id_service'] }},
          },
        @endforeach
      ];
      
      // Mendapatkan referensi ke tbody
      var tbody = document.getElementById("teknisi-body");

      // Loop melalui semua teknisi dan tambahkan baris ke tabel
      allteknisi.forEach(function(datateknisi) {
        var countnumber = 0;
        var sumday = 0;

        teknisispv.forEach(function(teknisispv) {

            spkservice.forEach(function(spkservice) {
                // //console.log("spkservice",spkservice.id_service);
                // //console.log("teknisispv",teknisispv.id_service );
                  if (spkservice.id_service == teknisispv.id_service && spkservice.id_teknisi == datateknisi.id
                    ) {
                           // //console.log("sebelum ditambah 1", countnumber);
                        countnumber = parseFloat(countnumber) + 1;
                                             // //console.log("setelah ditambah 1", countnumber);
                        sumday = parseFloat(sumday) + parseFloat(teknisispv.time_teknisi);
                        // //console.log(sumday);
                        
                      }
             });

        });

         if (sumday == 0) {

                    var sumvalue = 0;

                  } else {

                    var sumvalue = parseFloat(sumday) / parseFloat(countnumber);
                    //console.log(sumvalue);
                  }
        // Buat elemen baris baru
        var row = document.createElement("tr");

        // Buat elemen kolom nama dan isi dengan nama teknisi
        var nameCell = document.createElement("td");
        nameCell.textContent = datateknisi.name;
        row.appendChild(nameCell);

        // Buat elemen kolom jabatan
        var jabatanCell = document.createElement("td");
        // Tentukan isi berdasarkan id_jabatan
        if (datateknisi.id_jabatan == 4) {
          jabatanCell.textContent = "Teknisi";
        } else {
          jabatanCell.textContent = datateknisi.status;
        }
        row.appendChild(jabatanCell);

        // Buat elemen kolom sumvalue dan isi dengan nilai sumvalue
        var sumvalueCell = document.createElement("td");
        sumvalueCell.textContent = sumvalue;
        row.appendChild(sumvalueCell);

        // Tambahkan baris ke tbody
        tbody.appendChild(row);
      });
</script>

<!-- <script>

            var html = '';

            var countnumber = 0;

            var sumday = 0;



            $.each(data.Data.servicespv, function(i, item) {

              countnumber = parseFloat(countnumber) + 1;

              sumday = parseFloat(sumday) + parseFloat(item.time);

            })



            if (sumday == 0) {

              var sumvalue = 0;

            } else {

              var sumvalue = parseFloat(sumday) / parseFloat(countnumber);

            }



            html += parseFloat(sumvalue).toFixed(2) +

              '</td>' +

              '</tr>';



            $.each(data.allteknisi, function(i, datateknisi) {

              var countnumber = 0;

              var sumday = 0;



              $.each(data.teknisispv, function(i, teknisispv) {

                $.each(data.spkservice, function(i, spkservice) {



                  if (spkservice.id_service == teknisispv.id_service && spkservice.id_teknisi == datateknisi.id) {

                    countnumber = parseFloat(countnumber) + 1;

                    sumday = parseFloat(sumday) + parseFloat(teknisispv.time_teknisi);

                  }



                })

              })



              if (sumday == 0) {

                var sumvalue = 0;

              } else {

                var sumvalue = parseFloat(sumday) / parseFloat(countnumber);

              }



              html += '<tr>' +

                '<td>' + datateknisi.name + '</td>' +

                '<td>Teknisi</td>' +

                '<td>' + parseFloat(sumvalue).toFixed(2) + '</td>' +

                '</tr>';



            })
            $('#teknisi-body').html(html);
</script> -->

@endsection