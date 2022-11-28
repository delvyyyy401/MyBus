<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title ?></title>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">      
      <h1 class="h3 mb-2 text-gray-800">List Order & Pending</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Order</th>
                  <th>Kode Jadwal</th>
                  <th>Tanggal Berangkat</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal Beli</th>
                  <th>Jumlah Tiket</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($order as $row) { ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['kd_order']; ?></td>
                    <td><?php echo $row['kd_jadwal']; ?></td>
                    <td><?php echo hari_indo(date('N',strtotime($row['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_berangkat_order'].'')));?></td>
                    <td><?php echo $row['nama_order']; ?></td>
                    <td><?php echo $row['tgl_beli_order']; ?></td>
                    <?php $sqlcek = $this->db->query("SELECT * FROM tbl_order_mybus WHERE kd_order LIKE '".$row['kd_order']."'")->result_array(); ?>
                    <td><?php echo count($sqlcek); ?></td>
                    <?php if ($row['status_order'] == '1') { ?>
                          <td class="btn-danger"> Menunggu Konformasi </td> 
                          <?php } elseif($row['status_order'] == '2') { ?>
                          <td class="btn-success">Terbayar</td>
                        <?php } ?>
                    <td>
                    <?php if ($row['status_order'] == '1') { ?>
                      <a href="<?php echo base_url('backend/order_mybus/vieworder/'.$row['kd_order']) ?>" class="btn btn btn-warning">View</a>
                    <?php } elseif($row['status_order'] == '2') { ?>
                      <a href="<?php echo base_url('backend/order_mybus/vieworder/'.$row['kd_order']) ?>" class="btn btn btn-warning">View</a>
                      <a href="<?php echo base_url('backend/konfirmasi_mybus/viewkonfirmasi/'.$row['kd_order']) ?>" class="btn btn btn-danger">Bukti</a></td>
                    <?php } ?>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
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