<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>
    <title>Login PerdinKu &mdash; AKHDANI</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/node_modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php base_url(); ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?php base_url(); ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <span class="text">AKHDANI</span> <img src="/images/akhdani.png" alt="logo" width="50" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login PerdinKu</h4>
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
                            <?php if (session()->getFlashdata('gagal')) : ?>
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">x</button>
                                        <b>Gagal:( </b>
                                        <?= session()->getFlashdata('gagal'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="card-body">
                                <form method="POST" action="<?= site_url('login/auth'); ?>" autocomplete="off">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">E-Mail *</label>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control <?= ($validation->hasError('email')) ?
                                                                                        'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email'); ?>">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password *</label>
                                        <div class="input-group mb-3" id="show_hide_password">
                                            <input type="password" class="form-control <?= ($validation->hasError('password')) ?
                                                                                            'is-invalid' : ''; ?>" id="password" name="password" autofocus value="<?= old('password'); ?>">
                                            <div class="input-group-append">
                                                <a class="btn btn-outline-secondary"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Klik untuk mendapatkan Captcha</label>
                                        <a class="btn btn-outline-success" onclick="cap()"><i class="fa fa-sync-alt" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="captcha" class="form-control" readonly id="capt">
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" name="captcha_conf" placeholder="Masukan Captcha" class="form-control <?= ($validation->hasError('captcha_conf')) ?
                                                                                                                                                'is-invalid' : ''; ?>" id="textinput">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('captcha_conf'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button onclick="validcap()" type="submit" class="btn btn-success btn-lg btn-block" tabindex="4"><i class="fa fa-sign-in-alt"></i>
                                            Masuk
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; 2022 <div class="bullet"></div> PerdinKu By <a href="">febryekapaksi</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php base_url(); ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/moment/min/moment.min.js"></script>
    <script src="<?php base_url(); ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?php base_url(); ?>/template/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?php base_url(); ?>/template/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Template JS File -->
    <script src="<?php base_url(); ?>/template/assets/js/scripts.js"></script>
    <script src="<?php base_url(); ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa fa-eye-slash");
                    $('#show_hide_password i').addClass("fa fa-eye");
                }
            });
        });

        function cap() {
            var alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i',
                'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '!', '@', '#', '$', '%', '^', '&', '*', '+'
            ];
            var a = alpha[Math.floor(Math.random() * 71)];
            var b = alpha[Math.floor(Math.random() * 71)];
            var c = alpha[Math.floor(Math.random() * 71)];
            var d = alpha[Math.floor(Math.random() * 71)];
            var e = alpha[Math.floor(Math.random() * 71)];
            var f = alpha[Math.floor(Math.random() * 71)];

            var final = a + b + c + d + e + f;
            document.getElementById("capt").value = final;
        }

        function validcap() {
            var stg1 = document.getElementById('capt').value;
            var stg2 = document.getElementById('textinput').value;
            if (stg1 == stg2) {
                // alert("Captcha sesuai, Selamat Datang");
                return true;
            } else {
                alert("Masukan Captcha yang sesuai");
                return false;
            }
        }
    </script>
</body>

</html>