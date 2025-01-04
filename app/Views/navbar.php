<nav class="flex items-center justify-between px-6 md:px-[10%] py-5 bg-white shadow-sm">
    <div>
        <a href="index.php" class="text-lg font-semibold text-green-600">Rumah Sayur</a>
    </div>
    <div class="flex items-center justify-center gap-8">
        <div class="flex items-center justify-center gap-8">
            <?php
            $roleId = session()->get('role_id');
            if ($roleId == 1 || $roleId == 2) { ?>
                <a href="<?= base_url('dashboard') ?>" class="text-slate-600 hover:text-green-500">Dashboard</a>
                <a href="<?= base_url('user') ?>" class="text-slate-600 hover:text-green-500">Pengguna</a>
                <a href="<?= base_url('product') ?>" class="text-slate-600 hover:text-green-500">Produk</a>
                <a href="<?= base_url('logout') ?>" class="text-slate-600 hover:text-red-500">Keluar</a>
            <?php } else { ?>
                <a href="<?= base_url('login') ?>" class="text-slate-600 hover:text-green-500">Login</a>
            <?php } ?>
        </div>
    </div>
</nav>