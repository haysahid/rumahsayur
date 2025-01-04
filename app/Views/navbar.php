<nav class="flex items-center justify-between px-6 md:px-[10%] py-5 bg-white shadow-sm">
    <div>
        <a href="index.php" class="text-lg font-semibold text-green-600">Rumah Sayur</a>
    </div>
    <div class="flex items-center gap-8">

        <div class="flex gap-8">
            <a href="<?= base_url('dashboard') ?>"
                class="text-slate-600 hover:text-blue-500">Dashboard</a>
            <a href="<?= base_url('user') ?>"
                class="text-slate-600 hover:text-blue-500">Pengguna</a>
            <a href="<?= base_url('store') ?>" class="text-slate-600 hover:text-blue-500">Toko</a>
            <a href="<?= base_url('product') ?>" class="text-slate-600 hover:text-blue-500">Produk</a>
        </div>
    </div>
</nav>