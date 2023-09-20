<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Tambah User &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('admin/getuser') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah User</h1>
    </div>

    <?php if (session()->getFlashdata('gagal')) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Gagal:( </b>
                <?= session()->getFlashdata('gagal'); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Data User</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= base_url('admin/saveuser') ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Nama Lengkap *</label>
                            <input type="text" class="form-control  <?= ($validation->hasError('username')) ?
                                                                        'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('username'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">E-Mail *</label>
                            <input type="text" class="form-control" id="email" name="email" autofocus value="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notelp" class="col-form-label">No. Telepon *</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" autofocus value="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password *</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control" id="password" name="password" autofocus value="">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_conf">Konfirmasi Password *</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <input type="password" class="form-control" id="password_conf" name="password_conf" autofocus value="">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </div>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pilih Hak Akses *</label>
                            <select name="role" id="" class="form-control" id="role" name="role" autofocus value="">
                                <option value=""> ----PILIH---- </option>
                                <?php foreach ($getRolename as $row) { ?>
                                    <option value="<?= $row->id_role ?>"><?= $row->role_name ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-success">
                                <span><i class="fas fa-paper-plane"></i></span>
                                <span>Simpan</span>
                            </button>
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