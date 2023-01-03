<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <title><?php echo $title ?></title>
  <!-- Favicon-->
  <link rel="shortcut icon" href="assets/img/mybus.png">

  <!-- css -->
  <?php $this->load->view('backend/include/base_css'); ?>
</head>

<body id="page-top">


<?php 
$koneksi = mysqli_connect("localhost", "root","", "db-sistem-informasi-keuangan-master");
$koneksi2 = mysqli_connect("localhost", "root","", "db_mybus");

$pemasukan=mysqli_query($koneksi,"SELECT * FROM pemasukan");
while ($masuk=mysqli_fetch_array($pemasukan)){
$arraymasuk[] = $masuk['jumlah'];
}
$jumlahmasuk = array_sum($arraymasuk);


$pengeluaran=mysqli_query($koneksi,"SELECT * FROM pengeluaran");
while ($keluar=mysqli_fetch_array($pengeluaran)){
$arraykeluar[] = $keluar['jumlah'];
}
$jumlahkeluar = array_sum($arraykeluar);

$uang = $jumlahmasuk - $jumlahkeluar;

//untuk data chart area
$sekarang =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE()");
$sekarang = mysqli_fetch_array($sekarang);

$satuhari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 1 DAY");
$satuhari= mysqli_fetch_array($satuhari);

$duahari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 2 DAY");
$duahari= mysqli_fetch_array($duahari);

$tigahari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 3 DAY");
$tigahari= mysqli_fetch_array($tigahari);

$empathari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 4 DAY");
$empathari= mysqli_fetch_array($empathari);

$limahari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 5 DAY");
$limahari= mysqli_fetch_array($limahari);

$enamhari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 6 DAY");
$enamhari= mysqli_fetch_array($enamhari);

$tujuhhari =mysqli_query($koneksi, "SELECT jumlah FROM pemasukan
WHERE tgl_pemasukan = CURDATE() - INTERVAL 7 DAY");
$tujuhhari= mysqli_fetch_array($tujuhhari);
?>

  <!-- navbar -->
  <?php $this->load->view('backend/include/base_nav'); ?>
  <!-- Main Content -->
  <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">DashBoard</h1>
          <!-- Content Column -->
          <div class="column">
          
          <!-- Content Row -->
          <div class="row col-lg-12">
            <!-- Total Penjualan -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a href="<?php echo base_url('backend/konfirmasi_mybus') ?>">Total Penjualan</a></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?php echo number_format((float)($total[0]['sum(total_konfirmasi)']),0,",","."); ?>,-</div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <h4 class="h4 mb-1 text-gray-800">Individu</h4>
              <div class="row col-lg-12">
                <!-- Pending Order Individu -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a href="<?php echo base_url('backend/pending_mybus') ?>">Pending Order Individu</a></div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_individu[0]['count(kd_order)']; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- List Konfirmasi -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-uppercase mb-1"><a href="<?php echo base_url('backend/konfirmasi_mybus') ?>">List Konfirmasi Individu</a></div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $konfirmasi_individu[0]['count(kd_konfirmasi)']; ?></div>
                            </div>
                            <div class="col">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Total Tiket Terjual -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-uppercase mb-1"><a href="<?php echo base_url('backend/tiket_mybus') ?>">Total Tiket terjual</a></div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tiket_terjual[0]['count(kd_tiket)']; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-qrcode fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <h4 class="h4 mb-1 text-gray-800">Institusi</h4>
              <div class="row col-lg-12">
                <!-- Pending Order Instansi -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a href="<?php echo base_url('backend/pending_mybus/index2') ?>">Pending Order Instansi</a></div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending_institusi[0]['count(kd_order)']; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-clock fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- List Konfirmasi -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?php echo base_url('backend/konfirmasi_mybus/index2') ?>">List Konfirmasi Institusi</a></div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $konfirmasi_institusi[0]['count(kd_konfirmasi)']; ?></div>
                            </div>
                            <div class="col">
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Total Bus Disewa -->
                <div class="col-xl-3 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('backend/tiket_mybus/index2') ?>">Total Bus Disewa</a></div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $bus_disewa[0]['count(kd_tiket)']; ?></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-qrcode fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>

                  <div class="col-lg-">
                    <!-- Collapsable Card Example -->
                    <div class="card shadow mb-4">
                      <!-- Card Header - Accordion -->
                      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">Transaksi Institusi Per Area</h6>
                      </a>
                      <!-- Card Content - Collapse -->
                      <div class="collapse show" id="collapseCardExample">
                        <div class="card-body"> 
                          <?php
                            $namasumber1 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 1 ");
                            $sumbern1= mysqli_fetch_assoc($namasumber1);
                            
                            $namasumber2 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 2 ");
                            $sumbern2= mysqli_fetch_assoc($namasumber2);
                            
                            $namasumber3 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 3 ");
                            $sumbern3= mysqli_fetch_assoc($namasumber3);
                            
                            $namasumber4 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 4 ");
                            $sumbern4= mysqli_fetch_assoc($namasumber4);
                            
                            $namasumber5 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 5 ");
                            $sumbern5= mysqli_fetch_assoc($namasumber5);

                            $namasumber6 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 6 ");
                            $sumbern6= mysqli_fetch_assoc($namasumber6);

                            $namasumber7 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 7 ");
                            $sumbern7= mysqli_fetch_assoc($namasumber7);

                            $namasumber8 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 8 ");
                            $sumbern8= mysqli_fetch_assoc($namasumber8);
          
                            $hasil1=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 1");
                            while ($jumlah1=mysqli_fetch_array($hasil1)){
                            $arrayhasil1[] = $jumlah1['total_konfirmasi'];
                            }
                            $jumlahhasil1 = array_sum($arrayhasil1);
                            
                            $hasil2=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 2");
                            while ($jumlah2=mysqli_fetch_array($hasil2)){
                            $arrayhasil2[] = $jumlah2['total_konfirmasi'];
                            }
                            $jumlahhasil2 = array_sum($arrayhasil2);
                            
                            $hasil3=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 3");
                            while ($jumlah3=mysqli_fetch_array($hasil3)){
                            $arrayhasil3[] = $jumlah3['total_konfirmasi'];
                            }
                            $jumlahhasil3 = array_sum($arrayhasil3);
                            
                            $hasil4=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 4");
                            while ($jumlah4=mysqli_fetch_array($hasil4)){
                            $arrayhasil4[] = $jumlah4['total_konfirmasi'];
                            }
                            $jumlahhasil4 = array_sum($arrayhasil4);
                            
                            $hasil5=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 5");
                            while ($jumlah5=mysqli_fetch_array($hasil5)){
                            $arrayhasil5[] = $jumlah5['total_konfirmasi'];
                            }
                            $jumlahhasil5 = array_sum($arrayhasil5);

                            $hasil6=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 6");
                            while ($jumlah6=mysqli_fetch_array($hasil6)){
                            $arrayhasil6[] = $jumlah6['total_konfirmasi'];
                            }
                            $jumlahhasil6 = array_sum($arrayhasil6);

                            $hasil7=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 7");
                            while ($jumlah7=mysqli_fetch_array($hasil7)){
                            $arrayhasil7[] = $jumlah7['total_konfirmasi'];
                            }
                            $jumlahhasil7 = array_sum($arrayhasil7);

                            $hasil8=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi > 1000000 AND o.asal_order = 8");
                            while ($jumlah8=mysqli_fetch_array($hasil8)){
                            $arrayhasil8[] = $jumlah8['total_konfirmasi'];
                            }
                            $jumlahhasil8 = array_sum($arrayhasil8);
                            
                            $sumber1 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 1 AND nama_institusi != '' AND status_order = 2");
                            $sumber1text = mysqli_num_rows($sumber1);
                            $sumber1 = mysqli_num_rows($sumber1);
                            $sumber1 = $sumber1 * 10;
                            
                            $sumber2 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 2 AND nama_institusi != '' AND status_order = 2");
                            $sumber2text = mysqli_num_rows($sumber2);
                            $sumber2 = mysqli_num_rows($sumber2);
                            $sumber2 = $sumber2 * 10;
                            
                            $sumber3 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 3 AND nama_institusi != '' AND status_order = 2");
                            $sumber3text = mysqli_num_rows($sumber3);
                            $sumber3 = mysqli_num_rows($sumber3);
                            $sumber3 = $sumber3 * 10;
                            
                            $sumber4 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 4 AND nama_institusi != '' AND status_order = 2");
                            $sumber4text = mysqli_num_rows($sumber4);
                            $sumber4 = mysqli_num_rows($sumber4);
                            $sumber4 = $sumber4 * 10;
                            
                            $sumber5 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 5 AND nama_institusi != '' AND status_order = 2");
                            $sumber5text = mysqli_num_rows($sumber5);
                            $sumber5 = mysqli_num_rows($sumber5);
                            $sumber5 = $sumber5 * 10;

                            $sumber6 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 6 AND nama_institusi != '' AND status_order = 2");
                            $sumber6text = mysqli_num_rows($sumber6);
                            $sumber6 = mysqli_num_rows($sumber6);
                            $sumber6 = $sumber6 * 10;

                            $sumber7 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 7 AND nama_institusi != '' AND status_order = 2");
                            $sumber7text = mysqli_num_rows($sumber7);
                            $sumber7 = mysqli_num_rows($sumber7);
                            $sumber7 = $sumber7 * 10;

                            $sumber8 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 8 AND nama_institusi != '' AND status_order = 2");
                            $sumber8text = mysqli_num_rows($sumber8);
                            $sumber8 = mysqli_num_rows($sumber8);
                            $sumber8 = $sumber8 * 10;
                            
                            $no=1;
                            echo '
                              <h4 class="small font-weight-bold">'.$sumbern1['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil1,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumber1.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber1text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern2['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil2,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumber2.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber2text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern3['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil3,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:'.$sumber3.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber3text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern4['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil4,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width:'.$sumber4.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber4text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern5['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil5,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width:'.$sumber5.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber5text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern6['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil6,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumber6.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber6text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern7['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil7,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumber7.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber7text.' Transaksi</div>
                                      </div>
                              <h4 class="small font-weight-bold">'.$sumbern8['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasil8,2,',','.').'</span></h4>
                                      <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:'.$sumber8.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumber8text.' Transaksi</div>
                                      </div>';
                          ?>
                      </div>
                    </div>
                    </div>
                    
                    <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                      <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                        <h6 class="m-0 font-weight-bold text-primary">Transaksi Individu Per Area</h6>
                      </a>
                      <!-- Card Content - Collapse -->
                      <div class="collapse show" id="collapseCardExample2">
                        <div class="card-body">
                          <?php
                              $namasumberi1 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 1 ");
                              $sumberni1= mysqli_fetch_assoc($namasumberi1);
                              
                              $namasumberi2 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 2 ");
                              $sumberni2= mysqli_fetch_assoc($namasumberi2);
                              
                              $namasumberi3 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 3 ");
                              $sumberni3= mysqli_fetch_assoc($namasumberi3);
                              
                              $namasumberi4 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 4 ");
                              $sumberni4= mysqli_fetch_assoc($namasumberi4);
                              
                              $namasumberi5 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 5 ");
                              $sumberni5= mysqli_fetch_assoc($namasumberi5);

                              $namasumberi6 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 6 ");
                              $sumberni6= mysqli_fetch_assoc($namasumberi6);

                              $namasumberi7 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 7 ");
                              $sumberni7= mysqli_fetch_assoc($namasumberi7);

                              $namasumberi8 = mysqli_query($koneksi2,"SELECT * FROM `tbl_tujuan_mybus` where kd_tujuan= 8 ");
                              $sumberni8= mysqli_fetch_assoc($namasumberi8);
            
                              $hasili1=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 1");
                              while ($jumlahi1=mysqli_fetch_array($hasili1)){
                              $arrayhasili1[] = $jumlahi1['total_konfirmasi'];
                              }
                              $jumlahhasili1 = array_sum($arrayhasili1);
                              
                              $hasili2=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 2");
                              while ($jumlahi2=mysqli_fetch_array($hasili2)){
                              $arrayhasili2[] = $jumlahi2['total_konfirmasi'];
                              }
                              $jumlahhasili2 = array_sum($arrayhasili2);
                              
                              $hasili3=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 3");
                              while ($jumlahi3=mysqli_fetch_array($hasili3)){
                              $arrayhasili3[] = $jumlahi3['total_konfirmasi'];
                              }
                              $jumlahhasili3 = array_sum($arrayhasili3);
                              
                              $hasili4=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 4");
                              while ($jumlahi4=mysqli_fetch_array($hasili4)){
                              $arrayhasili4[] = $jumlahi4['total_konfirmasi'];
                              }
                              $jumlahhasili4 = array_sum($arrayhasili4);
                              
                              $hasili5=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 5");
                              while ($jumlahi5=mysqli_fetch_array($hasili5)){
                              $arrayhasili5[] = $jumlahi5['total_konfirmasi'];
                              }
                              $jumlahhasili5 = array_sum($arrayhasili5);

                              $hasili6=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 6");
                              while ($jumlahi6=mysqli_fetch_array($hasili6)){
                              $arrayhasili6[] = $jumlahi6['total_konfirmasi'];
                              }
                              $jumlahhasili6 = array_sum($arrayhasili6);

                              $hasili7=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 7");
                              while ($jumlahi7=mysqli_fetch_array($hasili7)){
                              $arrayhasili7[] = $jumlahi7['total_konfirmasi'];
                              }
                              $jumlahhasili7 = array_sum($arrayhasili7);

                              $hasili8=mysqli_query($koneksi2,"SELECT * FROM tbl_konfirmasi_mybus k, tbl_order_mybus o WHERE k.kd_order = o.kd_order AND total_konfirmasi < 1000000 AND o.asal_order = 8");
                              while ($jumlahi8=mysqli_fetch_array($hasili8)){
                              $arrayhasili8[] = $jumlahi8['total_konfirmasi'];
                              }
                              $jumlahhasili8 = array_sum($arrayhasili8);
                              
                              $sumberi1 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 1 AND nama_kursi_order != '' AND status_order = 2 ");
                              $sumberi1text = mysqli_num_rows($sumberi1);
                              $sumberi1 = mysqli_num_rows($sumberi1);
                              $sumberi1 = $sumberi1 * 10;
                              
                              $sumberi2 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 2 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi2text = mysqli_num_rows($sumberi2);
                              $sumberi2 = mysqli_num_rows($sumberi2);
                              $sumberi2 = $sumberi2 * 10;
                              
                              $sumberi3 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 3 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi3text = mysqli_num_rows($sumberi3);
                              $sumberi3 = mysqli_num_rows($sumberi3);
                              $sumberi3 = $sumberi3 * 10;
                              
                              $sumberi4 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 4 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi4text = mysqli_num_rows($sumberi4);
                              $sumberi4 = mysqli_num_rows($sumberi4);
                              $sumberi4 = $sumberi4 * 10;
                              
                              $sumberi5 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 5 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi5text = mysqli_num_rows($sumberi5);
                              $sumberi5 = mysqli_num_rows($sumberi5);
                              $sumberi5 = $sumberi5 * 10;

                              $sumberi6 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 6 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi6text = mysqli_num_rows($sumberi6);
                              $sumberi6 = mysqli_num_rows($sumberi6);
                              $sumberi6 = $sumberi6 * 10;

                              $sumberi7 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 7 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi7text = mysqli_num_rows($sumberi7);
                              $sumberi7 = mysqli_num_rows($sumberi7);
                              $sumberi7 = $sumberi7 * 10;

                              $sumberi8 = mysqli_query($koneksi2,"SELECT asal_order FROM tbl_order_mybus WHERE asal_order = 8 AND nama_kursi_order != '' AND status_order = 2");
                              $sumberi8text = mysqli_num_rows($sumberi8);
                              $sumberi8 = mysqli_num_rows($sumberi8);
                              $sumberi8 = $sumberi8 * 10;
                              
                              $no=1;
                              echo '
                                <h4 class="small font-weight-bold">'.$sumberni1['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili1,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumberi1.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi1text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni2['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili2,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumberi2.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi2text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni3['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili3,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width:'.$sumberi3.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi3text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni4['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili4,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width:'.$sumberi4.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi4text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni5['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili5,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-success" role="progressbar" style="width:'.$sumberi5.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi5text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni6['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili6,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width:'.$sumberi6.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi6text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni7['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili7,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width:'.$sumberi7.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi7text.' Transaksi</div>
                                        </div>
                                <h4 class="small font-weight-bold">'.$sumberni8['kota_tujuan'].'<span class="float-right">Rp. '.number_format($jumlahhasili8,2,',','.').'</span></h4>
                                        <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:'.$sumberi8.'%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">'.$sumberi8text.' Transaksi</div>
                                        </div>';
                            ?>
                        </div>
                      </div>
                    </div>
                  </div>

              
                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                  <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Perbandingan Pemesanan</h6>
                      <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                          <div class="dropdown-header">Dropdown Header:</div>
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                      <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                      </div>
                      <div class="mt-4 text-center small">
                        <span class="mr-2">
                          <i class="fas fa-circle text-primary"></i> Pendapatan
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle text-danger"></i> Pengeluaran
                        </span>
                        <span class="mr-2">
                          <i class="fas fa-circle text-info"></i> Sisa
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Pendapatan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>         
            
      </div>
      <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      </div>
      <!-- End of Content Wrapper -->

      <!-- Footer -->
      <?php $this->load->view('backend/include/base_footer'); ?>
      <!-- End of Footer -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  
  <!-- Page level custom scripts -->
  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
      // *     example: number_format(1234.56, 2, ',', ' ');
      // *     return: '1 234,56'
      number = (number + '').replace(',', '').replace(' ', '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(dec);
    }

    // Area Chart Example
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["7 hari lalu","6 hari lalu", "5 hari lalu", "4 hari lalu", "3 hari lalu", "2 hari lalu", "1 hari lalu"],
        datasets: [{
          label: "Pendapatan",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [<?php echo $tujuhhari['0']?>, <?php echo $enamhari['0'] ?>, <?php echo $limahari['0'] ?>, <?php echo $empathari['0'] ?>, <?php echo $tigahari['0'] ?>, <?php echo $duahari['0'] ?>, <?php echo $satuhari['0'] ?>],
        }],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false,
              drawBorder: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return 'Rp.' + number_format(value);
              }
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2]
            }
          }],
        },
        legend: {
          display: false
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: '#6e707e',
          titleFontSize: 14,
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: 'index',
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
              return datasetLabel + ': Rp.' + number_format(tooltipItem.yLabel);
            }
          }
        }
      }
    });
  </script>
  
  <script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Pendapatan", "Pengeluaran", "Sisa"],
        datasets: [{
          data: [<?php echo $jumlahmasuk/1000000 ?>, <?php echo $jumlahkeluar/1000000 ?>, <?php echo $uang/1000000 ?>],
          backgroundColor: ['#4e73df', '#e74a3b', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#e74a3b', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- js -->
  <?php $this->load->view('backend/include/base_js'); ?>

</body>

</html>
