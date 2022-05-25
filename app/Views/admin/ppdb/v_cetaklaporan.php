<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>/template/dist/css/adminlte.min.css">
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-sm-2">
        <img src="<?= base_url('logo/' . $setting['logo']) ?>" width="150px"> 
        </div>
        <div class="col-10">
          <h2 class="page-header">
           <?= $setting['nama_sekolah'] ?>
          </h2>
          <h5><?= $setting['alamat']?></h5>
        </div>
        <!-- /.col -->
      </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-sm-12">
          <div class="text-center">
            <h5><b> Laporan Kelulusan Siswa Tahun <?= $tahun?></b></h5>
          </div>

        </div>
        <div class="col-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>No Pendaftaran</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Jalur Penerimaan</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($siswa as $key => $value) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $value['no_pendaftaran'] ?></td>
                  <td><?= $value['nisn'] ?></td>
                  <td><?= $value['nama_lengkap'] ?></td>
                  <td><?= $value['tempat_lahir'] ?>/<?= $value['tgl_lahir'] ?></td>
                  <td><?= $value['jalur_masuk'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>

  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    window.addEventListener("load", window.print());
  </script>
</body>

</html>