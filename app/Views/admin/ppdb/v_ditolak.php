<?= $this->extend('templet/template_backend_admin') ?>
<?= $this->section('content') ?>

<div class="col sm-12">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= $subtitle ?></h3>
        </div>

        <div class="card-body p-0">
            <table id="example1" class="table table-bordered table-striped">
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
                            <td> <img width="120px" height="180px" src="<?= base_url('foto/' . $value['foto']) ?>"></td>
                            <td><?= $value['no_pendaftaran'] ?></td>
                            <td><label class="badge badge-success"><?= $value['tahun'] ?></label></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['nama_lengkap'] ?></td>
                            <td><label class="badge badge-warning"><?= $value['jalur_masuk'] ?></label></td>
                            <td>
                                <a href="<?= base_url('Ppdb/detailData/' . $value['id_siswa']) ?>" class="btn btn-flat btn-xs btn-primary"><i class="fas fa-eye">View</i></a>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>