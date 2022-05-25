<?= $this->extend('templet/template_backend_admin') ?>
<?= $this->section('content') ?>

<div class="col sm-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>
        </div>

        <div class="card-body p-0">
            <?php
            if (session()->getFlashdata('terima')) {
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('terima');
                echo '</h5></div>';
            }

            if (session()->getFlashdata('edit')) {
                echo '<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('edit');
                echo '</h5></div>';
            }

            if (session()->getFlashdata('ditolak')) {
                echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('ditolak');
                echo '</h5></div>';
            }
            ?>

            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th width="70px">#</th>
                        <th>Foto</th>
                        <th>No Pendaftaran</th>
                        <th>Tahun</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Jalur Masuk</th>
                        <th width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($ppdb as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td> <img alt="Avatar" class="table-avatar" src="<?= base_url('foto/' . $value['foto']) ?>"></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><label class="badge badge-success"><?= $value['tahun'] ?></label></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_lengkap'] ?></td>
                            <td><label class="badge badge-warning"><?= $value['jalur_masuk'] ?></label></td>
                            <td>
                                <a href="<?= base_url('Ppdb/detailData/' . $value['id_siswa']) ?>" class="btn btn-flat btn-xs btn-primary"><i class="fas fa-eye">View</i></a>
                                <a href="<?= base_url('Ppdb/diterima/' . $value['id_siswa'])?>" class="btn btn-flat btn-xs btn-success"><i class="fas fa-check">Terima</i></a>
                                <a href="<?= base_url('Ppdb/ditolak/' . $value['id_siswa'])?>" class="btn btn-flat btn-xs btn-danger"><i class="fas fa-times"></i>Tolak</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>