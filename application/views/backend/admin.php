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
      <h1 class="h3 mb-2 text-gray-800">List User</h1>
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
      <div class="card-header py-3">
          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#ModalAdmin">
          Tambah Admin
          </button>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode User</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($admin as $row) { ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['kd_admin']; ?></td>
                    <td><?php echo $row['nama_admin']; ?></td>
                    <td><?php echo $row['username_admin']; ?></td>
                    <td><?php echo $row['email_admin']; ?></td>
                    <td><?php if ($row['level_admin'] == '1') { ?>
                      <p>Supervisor</p>
                    <?php }else{ ?>
                      <p>Admin</p>
                    <?php } ?>
                    </td>

                    <td>
                      <?php if ($row['level_admin'] == '1') { ?>
                        
                      <?php }else{ ?>
                        <a href="<?php echo base_url('backend/admin_mybus/deleteadmin/'.$row['kd_admin']) ?>" class="btn btn-danger">DELETE</a></td>
                      <?php } ?>
                    </td>

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

<!-- Modal -->
<div class="modal fade" id="ModalAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="<?php echo base_url() ?>backend/admin_mybus/tambahadmin" method="post" >
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="kode" name="kode" class="form-control" placeholder="Kode Admin" required="required" autofocus="autofocus">
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Admin" required="required" autofocus="autofocus">
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
          </div>
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

</body>
</html>