<?php
$halaman = $_SERVER['REQUEST_URI'];
if ($halaman != "/") {
    $halaman = strtolower(substr($halaman, 1));
}

$menuGenerator = [];

switch (getUser()->peran) {
    case 'admin':
        $menuGenerator = [
            [
                'label' => 'Master Peran',
                'icon' => 'fa-users',
                'url' => 'peran',
            ],
            [
                'label' => 'Pengguna Administrator',
                'icon' => 'fa-users',
                'url' => 'pengguna',
            ],
            [
                'label' => 'Data Sopir',
                'icon' => 'fa-dumpster',
                'url' => 'sopir',
            ],
            [
                'label' => 'Data Travel',
                'icon' => 'fa-users',
                'url' => 'travel',
            ],
            [
                'label' => 'Data Tiker',
                'icon' => 'fa-users',
                'url' => 'tiket',
            ],
            [
                'label' => 'Data Pemesanan',
                'icon' => 'fa-users',
                'url' => 'pemesanan',
            ],
            [
                'label' => 'Laporan',
                'icon' => 'fa-layer-group',
                'url' => 'laporan',
            ],
        ];
        break;
    default:
        break;
}
?>
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="<?=base_url()?>" class="nav-link <?php if ($halaman == '/') {
    echo 'active';
}?>">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Home
            </p>
        </a>
    </li>
    <?php
foreach ($menuGenerator as $menu) {?>
    <li class="nav-item">
        <font color="#ffffff">
            <a href="<?=base_url($menu['url'])?>" class="nav-link <?php if ($halaman == $menu['url']) {
    echo 'active';
}?>">
                <i class="nav-icon fas <?=$menu['icon']?>"></i>
                <p>
                    <?=$menu['label']?>
                </p>
            </a>
        </font>
    </li>
    <?php }
?>
    <li class="nav-item">
        <font color="#ffffff">
            <a href="<?=base_url('ganti')?>" class="nav-link <?php if ($halaman == 'ganti') {
    echo 'active';
}?>">
                <i class="nav-icon fas fa-lock"></i>
                <p>
                    Ganti Password
                </p>
            </a>
        </font>
    </li>
    <li class="nav-item">
        <a href="<?=base_url('login/logout')?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
                Keluar
            </p>
        </a>
    </li>
</ul>