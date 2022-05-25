<?= $this->extend('templet/template_backend_admin') ?>
<?= $this->section('content') ?>

<div class="col sm-12">
  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Daftar <?= $subtitle ?></h3>
      <div class="card-tools">
        <div class="card-tools">
          <button type="button" class="btn btn-light btn-xs" data-toggle="modal" data-target="#add"><i class="fas fa-plus"> Add</i>
          </button>
        </div>
      </div>

    </div>
    <div class="card-body p-0">
      <?php
      if (session()->getFlashdata('tambah')) {
        echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('tambah');
        echo '</h5></div>';
      }

      if (session()->getFlashdata('edit')) {
        echo '<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('edit');
        echo '</h5></div>';
      }

      if (session()->getFlashdata('delete')) {
        echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('delete');
        echo '</h5></div>';
      }
      ?>
      <table class="table table-sm">
        <thead>
          <tr>
            <th width="70px">#</th>
            <th>Tahun</th>
            <th>Tahun Ajaran</th>
            <th>Status</th>
            <th class="text-center">Aktif/NonAktif</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($ta as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['tahun'] ?></td>
              <td><?= $value['ta'] ?></td>
              <td><?= ($value['status'] == 1) ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Non Active</label>' ?></td>
              <td class="text-center"><?php if ($value['status'] == 1) { ?>
                  <a href="<?= base_url('ta/statusNonAktif/' . $value['id_ta']) ?>" class="badge badge-danger">NonAktifkan</a>
                <?php } else { ?>
                  <a href="<?= base_url('ta/statusAktif/' . $value['id_ta']) ?>" class="badge badge-success">Aktifkan</a>
                <?php } ?>
              </td>
              <td>
                <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_ta'] ?>"><i class="fas fa-trash"></i></button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<!-- Modal Add -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Tahun Ajaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('ta/insertData') ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Tahun</label>
          <select name="tahun" class="form-control">
            <?php $now = date('Y');
            for ($i = 2019; $i <= $now; $i++) { ?>
              <option value="<?= $i ?>" <?= ($now == $i) ? 'selected' : '' ?>><?= $i ?></option>;
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Tahun Ajaran</label>
          <input name="ta" class="form-control" placeholder="Tahun Ajaran" required>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <button type="Submit" class="btn btn-primary btn-sm">Simpan</button>
      </div>
    </div>
    <?php echo form_close() ?>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal edit -->
<?php foreach ($ta as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_ta'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit ta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open('ta/editData/' . $value['id_ta'])  ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Tahun</label>
            <select name="tahun" class="form-control">
              <?php $now = date('Y');
              for ($i = 2019; $i <= $now; $i++) { ?>
                <option value="<?= $i ?>" <?= ($i == $value['tahun']) ? 'selected' : '' ?>><?= $i ?></option>;
              <?php } ?>

            </select>
          </div>
          <div class="form-group">
            <label>Tahun Ajaran</label>
            <input name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Ajaran" required>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <button type="Submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
      </div>
      <?php echo form_close() ?>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>

<!-- Modal delete -->
<?php foreach ($ta as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_ta'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus ta</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Ingin Menghapus <b><?= $value['ta'] ?></b> ?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <a href="<?= base_url('ta/deleteData/' . $value['id_ta']) ?>" class="btn btn-danger btn-sm">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<?= $this->endSection() ?>