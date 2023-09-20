<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>User &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">
    <div class="section-header">
        <h1>User</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data User</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('admin/adduser') ?>" class="btn btn-success"><i class="fas fa-plus"></i>
                                Tambah User</a>
                        </div>
                    </div>

                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">x</button>
                                <b>Sukses!!!</b>
                                <?= session()->getFlashdata('pesan'); ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="card-body p-0">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered table-md" id="dataTable">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($getRole as $key) { ?> <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $key->username ?></td>
                                            <td><?= $key->email ?></td>
                                            <td><?= $key->notelp ?></td>
                                            <td><?= $key->role_name ?></td>
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