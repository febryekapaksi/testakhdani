<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Approval Perdin &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('sdm/getperdin'); ?>" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>PerdinKu</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Approval Pengajuan Perjalanan Dinas</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama">Nama *</label>
                            <div class="input-group mb-3">
                                <input type="text" value="<?= $nama->username ?>" name="username" class="form-control" readonly>
                            </div>

                            <label for="kota" class="col-form-label">Kota *</label>
                            <div class="input-group mb-3">
                                <input type="text" value="<?= $approval->kota_asal; ?>" name="asal" class="form-control" readonly>
                                <span class="input-group-text"><i class=" fas fa-arrow-right"></i></span>
                                <input type="text" value="<?= $approval->kota_tujuan; ?>" name="tujuan" class="form-control" readonly>
                            </div>

                            <label for="tanggal" class="col-form-label">Tanggal *</label>
                            <div class="input-group mb-3">
                                <input type="text" value="<?= date('d F Y', strtotime($approval->tanggal_pergi)); ?>" name=" tglpergi" id="tglpergi" class="form-control" readonly>
                                <span class="input-group-text"><i class=" fas fa-arrow-right"></i></span>
                                <input type="text" value="<?= date('d F Y', strtotime($approval->tanggal_pulang)); ?>" name=" tglpulang" id="tglpulang" class="form-control" readonly>
                            </div>

                            <label for="keterangan" class="col-form-label">Keterangan *</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" readonly><?= $approval->keterangan; ?></textarea>

                        </div>
                        <div class="form-group">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr style="text-align:center ;">
                                            <th>Total Hari</th>
                                            <th>Jarak Tempuh</th>
                                            <th>Total Uang Perdin</th>
                                        </tr>
                                        <tr style="text-align:center ;">
                                            <td><span class="text">
                                                    <h6 style="color: cornflowerblue ;"><?= $approval->hari; ?> Hari</h6>
                                                </span></td>
                                            <td><span class="text">
                                                    <h5 style="color: cornflowerblue ;"><?= $approval->jarak; ?> KM
                                                </span></h5>
                                                <span>Rp. <?= $approval->biaya; ?>/ Hari</span>
                                            </td>
                                            <td><span class="text">
                                                    <h6 style="color: cornflowerblue ;">Rp. <?= $approval->total; ?>
                                                </span></h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <div class="card-footer text-center">
                                    <a href="<?= base_url('sdm/reject/' . $approval->id_pengajuan); ?>" class="btn btn-danger btn-lg">Reject</a>
                                    <a href="<?= base_url('sdm/approve/' . $approval->id_pengajuan); ?>" class="btn btn-primary btn-lg">
                                        <span><i class="fas fa-paper-plane"></i></span>
                                        <span>Approve</span>
                                    </a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="<?= base_url(); ?>vendor\twbs\bootstrap\dist\js\bootstrap.bundle.min.js">
        </script>
        <script src="<?= base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
</section>

<?= $this->endSection() ?>