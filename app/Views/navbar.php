<nav class="flex items-center justify-between px-6 md:px-[10%] py-5 bg-white shadow-sm">
    <div>
        <a href="<?= base_url('/') ?>" class="text-lg font-semibold text-green-600">Rumah Sayur</a>
    </div>
    <div class="flex items-center justify-center gap-8 max-md:hidden">
        <div class="flex items-center justify-center gap-8">
            <?php
            $roleId = session()->get('role_id');
            if ($roleId == 1 || $roleId == 2) { ?>
                <a href="<?= base_url('dashboard') ?>" class="text-slate-600 hover:text-green-500">Dashboard</a>
                <a href="<?= base_url('user') ?>" class="text-slate-600 hover:text-green-500">Pengguna</a>
                <a href="<?= base_url('product') ?>" class="text-slate-600 hover:text-green-500">Produk</a>
                <div class="relative">
                    <div class="flex items-center gap-2 cursor-pointer">
                        <button class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-slate-500 focus:outline-none">
                            <span class="text-sm font-semibold"><?= substr(session()->get('name'), 0, 1) ?></span>
                        </button>
                        <p><?= session()->get('name') ?></p>
                    </div>
                    <div class="absolute right-0 z-50 hidden w-40 py-2 bg-white border border-gray-200 shadow-md top-12">
                        <a href="<?= base_url('profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
                    </div>
                </div>
            <?php } elseif (isset($roleId)) { ?>
                <div class="relative">
                    <div class="flex items-center gap-2 cursor-pointer">
                        <button class="flex items-center justify-center w-10 h-10 text-white bg-green-500 rounded-full focus:outline-none">
                            <span class="text-sm font-semibold"><?= substr(session()->get('name'), 0, 1) ?></span>
                        </button>
                        <p><?= session()->get('name') ?></p>
                    </div>
                    <div class="absolute right-0 z-50 hidden w-40 py-2 bg-white border border-gray-200 shadow-md top-12">
                        <a href="<?= base_url('profile') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                        <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
                    </div>
                </div>
            <?php } else { ?>
                <a href="<?= base_url('login') ?>" class="text-slate-600 hover:text-green-500">Login</a>
            <?php } ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdown = document.querySelector('.relative');
            const dropdownMenu = document.querySelector('.absolute');

            dropdown.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</nav>