<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Tambah Kota &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('admin/getkota') ?>" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tambah Kota</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Tambah Data Kota</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= base_url('admin/savekota'); ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label for="nama_kota" class="col-form-label">Nama Kota *</label>
                            <input type="text" class="form-control" id="nama_kota" name="nama_kota" autofocus value="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="provinsi" class="col-form-label">Provinsi *</label>
                            <input type="text" class="form-control" id="provinsi" name="provinsi" autofocus value="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pulau" class="col-form-label">Pulau *</label>
                            <input type="text" class="form-control" id="pulau" name="pulau" autofocus value="">
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Luar Negeri *</label>
                            <select name="luar_negeri" id="" class="form-control" id="luar_negeri" name="luar_negeri" autofocus value="">
                                <option value=""> ----PILIH---- </option>
                                <option value="Ya"> YA </option>
                                <option value="Tidak"> TIDAK </option>
                            </select>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="latitude" class="col-form-label">Latitude *</label>
                                    <input type="text" class="form-control" name="latitude" id="latitude">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="longitude" class="col-form-label">Longitude *</label>
                                    <input type="text" class="form-control" name="longitude" id="longitude">
                                </div>
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