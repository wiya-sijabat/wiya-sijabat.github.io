<?= $this->extend('templet/template_backend_admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">

    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><b>Formulir Pendaftaran Peserta Didik Baru</b></h3>
            <div class="card-tools">
                <a href="<?= base_url('Ppdb')?>" type="button" class="btn btn-flat btn-primary"><i class="fas fa-forward">Kembali</i></a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-align-justify"></i><b> Pendaftaran</b></h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- data pendaftaran -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-book mr-1"></i> NISN</strong>
                                    <p class="text-muted"><?= $siswa['nisn'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-table mr-1"></i> No Pendaftaran/Jurusan</strong>
                                    <p class="text-muted"><?= $siswa['no_pendaftaran'] ?>/<?= $siswa['jurusan'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-calendar mr-1"></i> Tanggal Pendaftaran</strong>
                                    <p class="text-muted"><?= $siswa['tgl_pendaftaran'] ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <strong><i class="fas fa-file alt mr-1"></i> Jalur Masuk</strong>
                                    <?= ($siswa['jalur_masuk'] == null) ? '<p class="text-danger">Wajib Di isi</p>' : '<p>' . $siswa['jalur_masuk'] . '</p>' ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- foto -->
                <div class="col-sm-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-image"></i><b> Foto</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#foto"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="text-center">
                                <?php if ($siswa['foto'] == null) { ?>
                                    <img src="<?= base_url('foto/foto_blank.jpg') ?>" width="200px" height="235px">
                                <?php } else { ?>
                                    <img src="<?= base_url('foto/' . $siswa['foto']) ?>" width="200px" height="235px">
                                <?php } ?>
                                <br>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- identitas siswa -->
                <div class="col-sm-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-graduation-cap"></i><b> Identitas Siswa</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#siswa"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> Nama Lengkap</strong>
                                    <?= ($siswa['nama_lengkap'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_lengkap'] . '</p>' ?>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                                    <?= ($siswa['tempat_lahir'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['tempat_lahir'] . '</p>' ?>

                                    <strong><i class="fas fa-pencil-alt mr-1"></i> NIK</strong>
                                    <?= ($siswa['nik'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nik'] . '</p>' ?>

                                    <strong><i class="fas fa-mosque mr-1"></i> Agama</strong>
                                    <?= ($siswa['agama'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['agama'] . '</p>' ?>
                                </div>

                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> Nama Panggilan</strong>
                                    <?= ($siswa['nama_panggilan'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_panggilan'] . '</p>' ?>

                                    <strong><i class="fas fa-calendar mr-1"></i> Tanggal Lahir</strong>
                                    <?= ($siswa['tgl_lahir'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['tgl_lahir'] . '</p>' ?>

                                    <strong><i class="fas fa-neuter mr-1"></i> Jenis Kelamin</strong>
                                    <?php if ($siswa['jenis_kelamin'] == 'P') {
                                        $jenis_kelamin = 'Perempuan';
                                    } elseif ($siswa['jenis_kelamin'] == 'L') {
                                        $jenis_kelamin = 'Laki-Laki';
                                    } ?>
                                    <?= ($siswa['jenis_kelamin'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $jenis_kelamin . '</p>' ?>

                                    <strong><i class="fas fa-phone mr-1"></i> No Telpon</strong>
                                    <?= ($siswa['no_telpon'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['no_telpon'] . '</p>' ?>
                                </div>

                                <div class="col-sm-4">
                                    <strong><i class="fas fa-neuter mr-1"></i> Tinggi Badan</strong>
                                    <?= ($siswa['tinggi'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['tinggi'] . ' cm</p>' ?>

                                    <strong><i class="fas fa-table mr-1"></i> Berat Badan</strong>
                                    <?= ($siswa['berat'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['berat'] . ' kg</p>' ?>

                                    <strong><i class="fas fa-neuter mr-1"></i> Jumlah Bersaudara</strong>
                                    <?= ($siswa['jml_saudara'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['jml_saudara'] . '</p>' ?>


                                    <strong><i class="fas fa-neuter mr-1"></i> Anak Ke</strong>
                                    <?= ($siswa['anak_ke'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['anak_ke'] . '</p>' ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- Data Orang Tua -->
                <!-- ayah -->
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-male"></i> <b>Data Ayah</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#ayah"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> NIK Ayah</strong>
                                    <?= ($siswa['nik_ayah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nik_ayah'] . '</p>' ?>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Nama Ayah</strong>
                                    <?= ($siswa['nama_ayah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_ayah'] . '</p>' ?>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-building mr-1"></i> Pekerjaan</strong>
                                    <?= ($siswa['pekerjaan_ayah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['pekerjaan_ayah'] . '</p>' ?>
                                    <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan</strong>
                                    <?= ($siswa['pendidikan_ayah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['pendidikan_ayah'] . '</p>' ?>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> Penghasilan/Bulan</strong>
                                    <?= ($siswa['penghasilan_ayah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['penghasilan_ayah'] . '</p>' ?>
                                    <strong><i class="fas fa-phone mr-1"></i> No Telpon</strong>
                                    <?= ($siswa['no_telpon_ayah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['no_telpon_ayah'] . '</p>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ibu -->
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-female"></i><b> Data Ibu</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#ibu"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> NIK Ibu</strong>
                                    <?= ($siswa['nik_ibu'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nik_ibu'] . '</p>' ?>
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Nama Ibu</strong>
                                    <?= ($siswa['nama_ibu'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_ibu'] . '</p>' ?>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-building mr-1"></i> Pekerjaan</strong>
                                    <?= ($siswa['pekerjaan_ibu'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['pekerjaan_ibu'] . '</p>' ?>
                                    <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan</strong>
                                    <?= ($siswa['pendidikan_ibu'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['pendidikan_ibu'] . '</p>' ?>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-book mr-1"></i> Penghasilan/Bulan</strong>
                                    <?= ($siswa['penghasilan_ibu'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['penghasilan_ibu'] . '</p>' ?>
                                    <strong><i class="fas fa-phone mr-1"></i> No Telpon</strong>
                                    <?= ($siswa['no_telpon_ibu'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['no_telpon_ibu'] . '</p>' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Alamat -->
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-male"></i> <b>Alamat Lengkap</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#alamat"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-book mr-1"></i> Provinsi</strong>
                                    <?= ($siswa['nama_provinsi'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_provinsi'] . '</p>' ?>
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Kabupaten</strong>
                                    <?= ($siswa['nama_kabupaten'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_kabupaten'] . '</p>' ?>
                                </div>
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Kecamatan</strong>
                                    <?= ($siswa['nama_kecamatan'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_kecamatan'] . '</p>' ?>
                                    <strong><i class="far fa-file-alt mr-1"></i> Kelurahan/Desa</strong>
                                    <?= ($siswa['desa'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['desa'] . '</p>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sekolah -->
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-home"></i><b> Sekolah Asal</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#sekolah"><i class="fas fa-pencil-alt text-info"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Nama Sekolah</strong>
                                    <?= ($siswa['nama_sekolah_asal'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['nama_sekolah_asal'] . '</p>' ?>
                                    <strong><i class="fas fa-book mr-1"></i> Tahun Lulus</strong>
                                    <?= ($siswa['tahun_lulus'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['tahun_lulus'] . '</p>' ?>
                                </div>
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> No Ijazah</strong>
                                    <?= ($siswa['no_ijazah'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['no_ijazah'] . '</p>' ?>
                                    <strong><i class="far fa-file-alt mr-1"></i> No SKHUN</strong>
                                    <?= ($siswa['no_skhun'] == null) ? '<p class="text-danger">Wajib DI Isi</p>' : '<p>' . $siswa['no_skhun'] . '</p>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- berkas/file pendukung -->
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-file"></i><b> File Pendukung/Berkas Lampiran</b></h3>
                            <div class="card-tools">
                                <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                    <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#berkas"><i class="fas fa-plus text-info">Add File</i></button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Berkas</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                        <th width="50px">Action</th>
                                    <?php } ?>
                                </tr>
                                <?php $no = 1;
                                foreach ($berkas as $key => $value) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['lampiran'] ?></td>
                                        <td><?= $value['ket'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('berkas/' . $value['berkas']) ?>"><i class="fa fa-file-pdf fa-2x text-danger"></i>
                                            </a>
                                        </td>
                                        <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
                                            <td class="text-center">
                                                <a href="<?= base_url('Siswa/deleteBerkas/' . $value['id_berkas']) ?>" class="btn btn-xs btn-flat btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <?php if ($siswa['stat_pendaftaran'] == 0) { ?>
            <div class="col-sm-12">
                <button class="btn btn-success btn-flat btn-block" data-toggle="modal" data-target="#apply"><i class=" fas fa-check"></i> Apply Pendaftaran</button>
            </div>
        <?php } ?>
    </div>
</div>

<?= $this->endSection() ?>