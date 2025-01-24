<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
    <link rel="stylesheet" href="../css/app.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <div class="py-5 mx-auto px-[24px] md:px-[10%]">
            <h2 data-aos="fade-up" class="mb-5 text-2xl font-semibold">Pengguna</h2>

            <!-- Error Message -->
            <?php
            if (isset($_GET['error'])) {
            ?>
                <div data-aos="fade-up" class="flex w-full gap-2 p-4 mb-4 bg-orange-100 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-500 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <p class="w-full text-orange-500"><?php echo $_GET['error']; ?></p>
                    <a href="<?= base_url('user') ?>">
                        <button type="button" class="text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </a>
                </div>
            <?php
            }
            ?>

            <!-- Success Message -->
            <?php
            if (isset($_GET['success'])) {
            ?>
                <div data-aos="fade-up" class="flex w-full gap-2 p-4 mb-4 bg-green-100 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    <p class="w-full text-green-600"><?php echo $_GET['success']; ?></p>
                    <a href="<?= base_url('user') ?>">
                        <button type="button" class="text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </a>
                </div>
            <?php
            }
            ?>

            <div data-aos="fade-up" data-aos-delay="100" class="overflow-x-auto">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-sm text-black bg-slate-300">
                            <th class="px-4 py-2">No</th>
                            <th class="px-4 py-2">Nama</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2 max-lg:hidden">Tgl. Dibuat</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $selectedUser) {
                        ?>
                            <tr class="text-sm">
                                <td class="px-4 py-2 border">
                                    <?php echo $no++; ?>
                                </td>
                                <td class="px-4 py-2 border">
                                    <div class="flex items-center gap-2.5">
                                        <!-- Avatar -->
                                        <?php if ($selectedUser['avatar']) { ?>
                                            <div class="size-[40px] bg-slate-500 rounded-full relative">
                                                <img src="<?php echo "../" . $selectedUser['avatar']; ?>" alt="Avatar" class="object-cover w-full h-full rounded-full">
                                            </div>
                                        <?php } else { ?>
                                            <div class="size-[40px] bg-slate-500 rounded-full relative">
                                                <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-[20px] fill-slate-200">
                                                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div>
                                            <p class="text-sm font-semibold"><?php echo $selectedUser['name']; ?></p>
                                            <p><?php echo $selectedUser['username']; ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border">
                                    <?php echo $selectedUser['email']; ?>
                                </td>
                                <td class="px-4 py-2 border">
                                    <?php echo $selectedUser['role']['name']; ?>
                                </td>
                                <td class="px-4 py-2 border max-lg:hidden">
                                    <?php echo $selectedUser['created_at']; ?>
                                </td>
                                <td class="px-4 py-2 border">

                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('user/update') . '/' . $selectedUser['id'] ?>">
                                            <button type="button" class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-600 hover:border-blue-600">
                                                Ubah
                                            </button>
                                        </a>

                                        <?php if ($selectedUser['email'] != session()->get('email')) { ?>
                                            <button type="button" onclick="showDeleteConfirmation('<?= $selectedUser['id']; ?>', '<?= $selectedUser['name']; ?>')" class="px-4 py-2 text-sm font-semibold text-white bg-red-500 border border-red-500 rounded hover:bg-red-600 hover:border-red-600">
                                                Hapus
                                            </button>
                                        <?php } ?>
                                    </div>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        function showDeleteConfirmation(id, name) {
            let result = confirm(`Apakah Anda yakin ingin menghapus artikel "${name}"?`);

            if (result) {
                window.location.href = `<?= base_url('user/delete') ?>/${id}`;
            }
        }
    </script>
</body>

</html>