<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title ?></title>
  <!-- Favicon-->
  <link rel="shortcut icon" href="assets/img/mybus.png">

  <!-- css -->
  <?php $this->load->view('backend/include/base_css'); ?>

</head>

<body id="page-top">

  <!-- navbar -->
  <?php $this->load->view('backend/include/base_nav'); ?>
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
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('backend/konfirmasi_mybus') ?>">Total Penjualan</a></div>
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
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?php echo base_url('backend/konfirmasi_mybus') ?>">List Konfirmasi Individu</a></div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $konfirmasi[0]['count(kd_konfirmasi)']; ?></div>
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
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('backend/tiket_mybus') ?>">Total Tiket terjual</a></div>
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
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?php echo base_url('backend/konfirmasi_mybus') ?>">List Konfirmasi Institusi</a></div>
                          <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $konfirmasi[0]['count(kd_konfirmasi)']; ?></div>
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
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?php echo base_url('backend/tiket_mybus') ?>">Total Bus Disewa</a></div>
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
