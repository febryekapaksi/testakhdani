    <li class="menu-header">Menu</li>
    <!-- Admin -->
    <?php if (session()->get('id_role_user') == "1") { ?>

        <li>
            <a class="nav-link" href="<?= base_url() ?>">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Master</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('admin/getkota') ?>">Data Kota</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/getuser') ?>">Data User</a></li>
            </ul>
        </li>
        <!-- SDM -->
    <?php } else if (session()->get('id_role_user') == "2") { ?>

        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>SDM</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('sdm/getperdin') ?>">Perjalanan Dinas</a></li>
                <li><a class="nav-link" href="<?= base_url('sdm/getpegawai') ?>">Pegawai</a></li>
            </ul>
        </li>
        <!-- Pegawai -->
    <?php } else { ?>
        <li>
            <a class="nav-link" href="<?= base_url('pegawai/getperdin') ?>">
                <i class="fas fa-users-cog"></i>
                <span>PerdinKu</span>
            </a>
        </li>
    <?php  } ?>