<nav class="">
    <?php $roleId = session()->get('role_id'); ?>

    <div class="flex items-center justify-between px-6 md:px-[10%] py-5 bg-white shadow-sm">
        <div>
            <a href="<?= base_url('/') ?>" class="text-lg font-semibold text-green-600">Rumah Sayur</a>
        </div>
        <div class="flex items-center justify-center gap-8 max-md:hidden">
            <div class="flex flex-col items-center justify-center gap-8 md:flex-row">
                <?php
                if ($roleId == 1 || $roleId == 2) { ?>
                    <a href="<?= base_url('dashboard') ?>" class="text-slate-600 hover:text-green-500">Dashboard</a>
                    <a href="<?= base_url('user') ?>" class="text-slate-600 hover:text-green-500">Pengguna</a>
                    <a href="<?= base_url('product') ?>" class="text-slate-600 hover:text-green-500">Produk</a>
                    <div id="user-dropdown" class="relative">
                        <div class="flex items-center gap-2 cursor-pointer">
                            <button class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-slate-500 focus:outline-none">
                                <span class="text-sm font-semibold"><?= substr(session()->get('name'), 0, 1) ?></span>
                            </button>
                            <p><?= session()->get('name') ?></p>
                        </div>
                        <div id="user-dropdown-menu" class="absolute right-0 z-50 hidden w-40 py-2 bg-white border border-gray-200 rounded-sm shadow-md top-12">
                            <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
                        </div>
                    </div>
                <?php } elseif (isset($roleId)) { ?>
                    <div id="user-dropdown" class="relative">
                        <div class="flex items-center gap-2 cursor-pointer">
                            <button class="flex items-center justify-center w-10 h-10 text-white bg-green-500 rounded-full focus:outline-none">
                                <span class="text-sm font-semibold"><?= substr(session()->get('name'), 0, 1) ?></span>
                            </button>
                            <p><?= session()->get('name') ?></p>
                        </div>
                        <div id="user-dropdown-menu" class="absolute right-0 z-50 hidden w-40 py-2 bg-white border border-gray-200 rounded-sm shadow-md top-12">
                            <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a href="<?= base_url('login') ?>" class="text-slate-600 hover:text-green-500">Login</a>
                <?php } ?>
            </div>
        </div>

        <?php if ($roleId) { ?>
            <div class="relative flex items-center gap-8 md:hidden">
                <button id="menu-toggle" class="focus:outline-none">
                    <svg class="w-6 h-6 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        <?php } else { ?>
            <a href="<?= base_url('login') ?>" class="text-slate-600 hover:text-green-500 md:hidden">Login</a>
        <?php } ?>
    </div>

    <div id="menu-dropdown" class="hidden w-full h-full gap-8 bg-white shadow-md">
        <div class="flex flex-col items-start justify-center gap-8 px-6 py-8">
            <?php
            $roleId = session()->get('role_id');
            if ($roleId == 1 || $roleId == 2) { ?>
                <a href="<?= base_url('dashboard') ?>" class="text-slate-600 hover:text-green-500">Dashboard</a>
                <a href="<?= base_url('user') ?>" class="text-slate-600 hover:text-green-500">Pengguna</a>
                <a href="<?= base_url('product') ?>" class="text-slate-600 hover:text-green-500">Produk</a>
                <div id="bottom-user-dropdown" class="relative">
                    <div class="flex items-center gap-2 cursor-pointer">
                        <button class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-slate-500 focus:outline-none">
                            <span class="text-sm font-semibold"><?= substr(session()->get('name'), 0, 1) ?></span>
                        </button>
                        <p><?= session()->get('name') ?></p>
                    </div>
                    <div id="bottom-user-dropdown-menu" class="absolute left-0 z-50 hidden w-40 py-2 bg-white border border-gray-200 rounded-sm shadow-md top-12">
                        <a href="<?= base_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
                    </div>
                </div>
            <?php } elseif (isset($roleId)) { ?>
                <div id="bottom-user-dropdown" class="relative">
                    <div class="flex items-center gap-2 cursor-pointer">
                        <button class="flex items-center justify-center w-10 h-10 text-white bg-green-500 rounded-full focus:outline-none">
                            <span class="text-sm font-semibold"><?= substr(session()->get('name'), 0, 1) ?></span>
                        </button>
                        <p><?= session()->get('name') ?></p>
                    </div>
                    <div id="bottom-user-dropdown-menu" class="absolute left-0 z-50 hidden w-40 py-2 bg-white border border-gray-200 rounded-sm shadow-md top-12">
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
            const userDropdown = document.querySelector('#user-dropdown');
            const userDropdownMenu = document.querySelector('#user-dropdown-menu');

            userDropdown.addEventListener('click', function() {
                userDropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!userDropdown.contains(e.target)) {
                    userDropdownMenu.classList.add('hidden');
                }
            });

            const menuToggle = document.querySelector('#menu-toggle');
            const menuDropdown = document.querySelector('#menu-dropdown');

            menuToggle.addEventListener('click', function() {
                menuDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!menuDropdown.contains(e.target) && !menuToggle.contains(e.target)) {
                    menuDropdown.classList.add('hidden');
                }
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    menuDropdown.classList.add('hidden');
                } else {
                    menuDropdown.classList.add('flex');
                }
            });

            const bottomUserDropdown = document.querySelector('#bottom-user-dropdown');
            const bottomUserDropdownMenu = document.querySelector('#bottom-user-dropdown-menu');

            bottomUserDropdown.addEventListener('click', function() {
                bottomUserDropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(e) {
                if (!bottomUserDropdown.contains(e.target)) {
                    bottomUserDropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>
</nav>