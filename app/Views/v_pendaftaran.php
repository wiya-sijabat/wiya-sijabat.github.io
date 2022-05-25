<?= $this->extend('templet/template_frontend') ?>
<?= $this->section('content') ?>

<?php if ($ta <> null) { ?>


  <div class="col-sm-5">
    <img class="img-fluid pad" src="<?= base_url('logo/register.png') ?>" alt="">
  </div>

  <div class="col-sm-7">
    <?php
    echo form_open('pendaftaran/simpanPendaftaran');
    ?>
    <div class="col-md-12 col-sm-12 col-12"></div>
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h5 class="card-title m-0">Pendaftaran</h5>
      </div>
      <div class="card-body">


        <?php session()->getFlashdata('errors');


        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>';
          echo session()->getFlashdata('pesan');
          echo '</h5></div>';
        }

        ?>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>NISN</label>
              <input name="nisn" value="<?= old('nisn') ?>" class="form-control" placeholder="NISN">
              <p class="text-danger"><?= $validation->hasError('nisn') ? $validation->getError('nisn') : '' ?></p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Jalur</label>
              <select name="id_jalur_masuk" class="form-control">
                <option value="">--Pilih Jalur Masuk--</option>
                <?php foreach ($jalur_masuk as $key => $value) { ?>
                  <option value="<?= $value['id_jalur_masuk'] ?>"><?= $value['jalur_masuk'] ?></option>
                <?php } ?>
              </select>
              <p class="text-danger"><?= $validation->hasError('id_jalur_masuk') ? $validation->getError('id_jalur_masuk') : '' ?></p>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input name="nama_lengkap" value="<?= old('nama_lengkap') ?>" class="form-control" placeholder="Nama Lengkap">
              <p class="text-danger"><?= $validation->hasError('nama_lengkap') ? $validation->getError('nama_lengkap') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Nama Panggilan</label>
              <input name="nama_panggilan" value="<?= old('nama_panggilan') ?>" class="form-control" placeholder="Nama Panggilan">
              <p class="text-danger"><?= $validation->hasError('nama_panggilan') ? $validation->getError('nama_panggilan') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control">
                <option value="">--Pilih Jenis Kelamin--</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
              <p class="text-danger"><?= $validation->hasError('jenis_kelamin') ? $validation->getError('jenis_kelamin') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input name="tempat_lahir" value="<?= old('tempat_lahir') ?>" class="form-control" placeholder="Tempat Lahir">
              <p class="text-danger"><?= $validation->hasError('tempat_lahir') ? $validation->getError('tempat_lahir') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Tanggal</label>
              <select name="tanggal" class="form-control">
                <option value="">--Tanggal--</option>
                <?php
                for ($i = 1; $i <= 31; $i++) { ?>
                  <option value="<?= $i ?>"><?= $i ?></option>;
                <?php } ?>
              </select>
              <p class="text-danger"><?= $validation->hasError('tanggal') ? $validation->getError('tanggal') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Bulan</label>
              <select name="bulan" class="form-control">
                <option value="">--Bulan--</option>
                <?php
                for ($i = 1; $i <= 12; $i++) { ?>
                  <option value="<?= $i ?>"><?= $i ?></option>;
                <?php } ?>
              </select>
              <p class="text-danger"><?= $validation->hasError('bulan') ? $validation->getError('bulan') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control">
                <option value="">--Tahun--</option>
                <?php $now = date('Y');
                for ($i = 1990; $i <= $now; $i++) { ?>
                  <option value="<?= $i ?>"><?= $i ?></option>;
                <?php } ?>
              </select>
              <p class="text-danger"><?= $validation->hasError('tahun') ? $validation->getError('tahun') : '' ?></p>
            </div>
          </div>

          <div class="col-sm-12">
            <div class="form-group">
              <label>Jurusan</label>
              <label class="text-danger">(Silahkan Pilih Jurusan !!)</label>
              <select name="id_jurusan" class="form-control">
                <option value="">--Pilih Jurusan--</option>
                <?php foreach ($jurusan as $key => $value) { ?>
                  <option value="<?= $value['id_jurusan']?>"> <?= $value['jurusan']?></option>
                <?php } ?>
              </select>
              <p class="text-danger"><?= $validation->hasError('jurusan') ? $validation->getError('jurusan') : '' ?></p>
            </div>
          </div>

        </div>
        <div class="col-md-12 col-sm-12 col-12">
          <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Submit</button>
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
<?php } else { ?>
  <div class="col-sm-12">
    <div class="alert alert-warning alert-dismissible">
      <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan!</h5>
      Maaf Pendaftaran Untuk Tahun Ini sudah Di Tutup!!!
    </div>
  </div>
<?php } ?>
<?= $this->endSection() ?>