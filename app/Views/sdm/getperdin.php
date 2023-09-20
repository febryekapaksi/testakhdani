<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Perdin &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Perjalanan Dinas</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Perdin</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pengajuan-tab" data-toggle="tab" href="#pengajuan" role="tab" aria-controls="pengajuan" ara-selected="true">Pengajuan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="riwayat-tab2" data-toggle="tab" href="#riwayat" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</a>
                            </li>
                        </ul>
                        <div class="tab-content tab-bordered" id="myTab3Content">
                            <div class="tab-pane fade show active" id="pengajuan" role="tabpanel" aria-labelledby="pengajuan-tab">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-md" id="dataTable">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kota</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($getPemohon as $key) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $key->username; ?></td>
                                                    <td><?= $key->kota_asal; ?><span> <i class="fas fa-arrow-right"></i> </span><?= $key->kota_tujuan; ?></td>
                                                    <td><?= date('d F Y', strtotime($key->tanggal_pergi)) ?>
                                                        <span> <i class="fas fa-arrow-right"></i> </span><?= date('d F Y', strtotime($key->tanggal_pulang)); ?>
                                                        <span class="text"> (<?= $key->hari; ?> Hari) </span>
                                                    </td>
                                                    <td><?= $key->keterangan; ?></td>
                                                    <td><?= $key->status; ?></td>
                                                    <td class="text-center" style="width:15%">
                                                        <a href="<?= base_url('sdm/approvalperdin/' . $key->id_pengajuan); ?>" class="btn btn-warning btn-sm">
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
                            <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="riwayat-tab">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-md" id="dataTable2">
                                        <thead>
                                            <th>No</th>
                                            <th>Pemohon</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center" style="width:15%">
                                                    <a href="" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt"></i><span class="text"></span>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i><span class="text"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<?= $this->endSection() ?>