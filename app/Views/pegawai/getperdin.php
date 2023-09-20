<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>PerdinKu &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>PerdinKu</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Pengajuan</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('pegawai/addperdin'); ?>" class="btn btn-danger"><i class="fas fa-plus"></i>
                                Tambah Perdin</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-md" id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>Kota</th>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($getPengajuan as $key) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $key['kota_asal']; ?><span> <i class="fas fa-arrow-right"></i> </span><?= $key['kota_tujuan']; ?></td>
                                            <td><?= date('d F Y', strtotime($key['tanggal_pergi'])); ?>
                                                <span> <i class="fas fa-arrow-right"></i> </span><?= date('d F Y', strtotime($key['tanggal_pulang'])); ?>
                                                <span class="text"> (<?= $key['hari']; ?> Hari) </span>
                                            </td>
                                            <td><?= $key['keterangan']; ?></td>
                                            <td><?= $key['status']; ?></td>
                                            <td class="text-center" style="width:15%">
                                                <a href="" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-pencil-alt"></i><span class="text"></span>
                                                </a>
                                                <a href="" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i><span class="text"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</section>

<?= $this->endSection() ?>