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
            <th>Nama User</th>
            <th>E-Mail</th>
            <th>Foto</th>
            <th width="100px">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($user as $key => $value) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value['nama_user'] ?></td>
              <td><?= $value['email'] ?></td>
              <td><img src="<?= base_url('foto/' . $value['foto']) ?>" width="100px" height="100px" class="img-circle img-circle" </td>
              <td> <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fas fa-trash"></i>
                </button>
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
        <h4 class="modal-title">Add user</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('user/insertData') ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Nama User</label>
          <input name="nama_user" class="form-control" placeholder="Nama User" required>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="foto" accept="image/*" required>
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
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_user'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open_multipart('user/editData/' . $value['id_user'])  ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama User</label>
            <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Nama User" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" value="<?= $value['email'] ?>" name="email" class="form-control" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password" required>
          </div>
          <div class="form-group">
            <label>Ganti Foto</label>
            <input type="file" name="foto" value="<?= $value['foto'] ?>" accept="image/*">
            <img src="<?= base_url('foto/' . $value['foto']) ?>" width="100px" height="100px">
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
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_user'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus user</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Ingin Menghapus <b><?= $value['nama_user'] ?></b> ?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <a href="<?= base_url('user/deleteData/' . $value['id_user']) ?>" class="btn btn-danger btn-sm">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
<?= $this->endSection() ?>