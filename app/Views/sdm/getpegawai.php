<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Pegawai &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>Pegawai</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Pegawai</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-md" id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($getPegawai as $key) { ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><img src="/images/<?= $key['image_pegawai']; ?>" class="img-thumbnail img-preview" width="100px"></td>
                                            <td><?= $key['nama_pegawai'] ?></td>
                                            <td><?= $key['email_pegawai'] ?></td>
                                            <td><?= $key['notelp_pegawai'] ?></td>
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