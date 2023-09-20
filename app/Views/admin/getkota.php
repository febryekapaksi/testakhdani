<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Kota &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Kota</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Kota</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('admin/addkota') ?>" class="btn btn-success"><i class="fas fa-plus"></i>
                                Tambah Kota</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-md" id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Kota</th>
                                    <th>Provinsi</th>
                                    <th>Pulau</th>
                                    <th>Luar Negeri</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($getKota as $key) { ?> <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $key['nama_kota'] ?></td>
                                            <td><?= $key['provinsi'] ?></td>
                                            <td><?= $key['pulau'] ?></td>
                                            <td><?= $key['luar_negeri'] ?></td>
                                            <td><?= $key['latitude'] ?></td>
                                            <td><?= $key['longitude'] ?></td>
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
    </div>
</section>

<?= $this->endSection() ?>