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
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th width="70px">#</th>
                        <th>Tahun</th>
                        <th>Tahun Ajaran</th>
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
                            <td>
                                <a href="<?= base_url('Ppdb/cetakLaporan/' . $value['tahun'])?>" target="blank" class="btn btn-primary btn-xs" ><i class="fas fa-print">Print</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>