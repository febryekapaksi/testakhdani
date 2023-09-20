<?= $this->extend('layout/template') ?>

<?= $this->section('title') ?>
<title>Tambah Perdin &mdash; AKHDANI</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="section">

    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= base_url('pegawai/getperdin') ?>" class="btn btn-warning"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>PerdinKu</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Form Pengajuan Perjalanan Dinas</h4>
            </div>
            <div class="row justify-content-center">
                <div class="card-body col-md-6 ml-4">
                    <form action="<?= base_url('pegawai/saveperdin') ?>" method="POST" autocomplete="off">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <input type="hidden" name="id_user" value="<?= $id_user; ?>">
                            <label for="kota" class="col-form-label">Kota *</label>
                            <div class="form-row">
                                <div class="input-group mb-3">
                                    <select id="asal" name="asal" class="form-control">
                                        <option selected="">Pilih Kota Asal</option>
                                        <?php foreach ($getKota as $row) { ?>
                                            <option value="<?= $row['nama_kota'] ?>"><?= $row['nama_kota'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="input-group-text"><i class=" fas fa-arrow-right"></i></span>
                                    <select id="tujuan" name="tujuan" class="form-control">
                                        <option selected="">Pilih Kota Tujuan</option>
                                        <?php foreach ($getKota as $row) { ?>
                                            <option value="<?= $row['nama_kota'] ?>"><?= $row['nama_kota'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <label for="tanggal" class="col-form-label">Tanggal *</label>
                            <div class="form-row">
                                <div class="input-group mb-3">
                                    <input type="text" placeholder="Tanggal Pergi" name="tglpergi" id="tglpergi" class="form-control" onfocus="(this.type='date')">
                                    <span class="input-group-text"><i class=" fas fa-arrow-right"></i></span>
                                    <input type="text" placeholder="Tanggal Pulang" name="tglpulang" id="tglpulang" class="form-control" onfocus="(this.type='date')">
                                </div>
                            </div>
                            <label for="keterangan" class="col-form-label">Keterangan *</label>
                            <div class="form-row">
                                <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" name="submit" class="btn btn-success">
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