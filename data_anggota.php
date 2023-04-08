<?php 
include_once('dayat.php'); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Title</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
           <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">Tambah</a>
           <div class="modal fade" id="modal-primary">
            <div class="modal-dialog">
              <div class="modal-content bg-primary">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Data</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  </div>
                  <form action="insert.php" method="post">
                    <div class="modal-body">
                      <label>Nama</label>
                      <input type="text" name="nama" required ><br><br>
                      <label>Id Angggota</label>
                      <input type="number" name="id_anggota" required ><br><br>
                      <label>Jabatan</label>
                      <input type="text" name="jabatan" required ><br><br>
                      <label>Bidang</label>
                      <input type="text" name="bidang" required ><br><br>
                      <label>Kamar</label>
                      <input type="text" name="kamar"  ><br><br>
                      <label>Kelas</label>
                      <input type="text" name="kelas" required ><br><br>
                      <label>TTL</label>
                      <input type="text" name="ttl" required ><br><br>
                      <label>Asal</label>
                      <input type="text" name="asal" required ><br><br>
                      <label>Email</label>
                      <input type="text" name="Email"  ><br><br>
                      <label>Whatsapp</label>
                      <input type="text" name="Whatsapp"  ><br><br>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <button type="submit" name="tambah" class="btn btn-success">Save changes</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            &nbsp;
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Id Anggota</td>
                  <td>Nama</td>
                  <td>Jabatan</td>
                  <td>Bidang</td>
                  <td>kamar</td>
                  <td>Kelas</td>
                  <td>TTL</td>
                  <td>Asal</td>
                  <td>Email</td>
                  <td>Whatsapp</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no=0;
                $result = mysqli_query($config, "SELECT * FROM data_anggota ORDER BY id ASC ");
                while($data = mysqli_fetch_array($result)){
                  $no++;
                  ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data['id_anggota'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['jabatan'] ?></td>
                    <td><?= $data['bidang'] ?></td>
                    <td><?= $data['kamar'] ?></td>
                    <td><?= $data['kelas'] ?></td>
                    <td><?= $data['ttl'] ?></td>
                    <td><?= $data['asal'] ?></td>
                    <td><?= $data['Email'] ?></td>
                    <td><?= $data['Whatsapp'] ?></td>
                    <td><a href="insert.php?delete1&id=<?= $data['id'] ?>" class="btn btn-warning">Hapus</a><a href="data_siswa.php" class="btn btn-primary" data-toggle="modal" data-target="#edit<?= $data['id'] ?>">edit</a></td>
                  </tr>
                  <div class="modal fade" id="edit<?= $data['id'] ?>">
                    <div class="modal-dialog">
                      <div class="modal-content bg-primary">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          </div>
                          <form action="insert.php" method="post">
                            <div class="modal-body">
                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                              <label>Id_anggota</label>
                              <input type="text" name="id_anggota" value="<?= $data['id_anggota'] ?>" required ><br><br>
                              <label>Nama</label>
                              <input type="text" name="nama" value="<?= $data['nama'] ?>" required ><br><br>
                              <label>Jabatan</label>
                              <input type="text" name="jabatan" value="<?= $data['jabatan'] ?>" required ><br><br>
                              <label>Bidang</label>
                              <input type="text" name="bidang" value="<?= $data['bidang'] ?>" required ><br><br>
                              <label>Kamar</label>
                              <input type="text" name="kamar" value="<?= $data['kamar'] ?>"  ><br><br>
                              <label>Kelas</label>
                              <input type="text" name="kelas" value="<?= $data['kelas'] ?>" required ><br><br>
                              <label>TTL</label>
                              <input type="text" name="ttl" value="<?= $data['ttl'] ?>" required ><br><br>
                              <label>Asal</label>
                              <input type="text" name="asal" value="<?= $data['asal'] ?>" required ><br><br>
                              <label>Email</label>
                              <input type="text" name="Email" value="<?= $data['Email'] ?>"  ><br><br>
                              <label>Whatsapp</label>
                              <input type="text" name="Whatsapp" value="<?= $data['Whatsapp'] ?>"  ><br><br>
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" name="edit" class="btn btn-success">Save changes</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.4
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>
