<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="../css/app.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <div class="py-5 mx-auto px-[24px] md:px-[10%]">
            <div data-aos="fade-up" class="flex items-center justify-between mb-5">
                <h2 class="text-2xl font-semibold">Produk</h2>
                <!-- Add Article Button -->
                <a href="<?= base_url('product/create') ?>">
                    <button type="button" class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-600 hover:border-blue-600">
                        Tambah Produk
                    </button>
                </a>
            </div>

            <!-- Error Message -->
            <?php
            if (isset($_GET['error'])) {
            ?>
                <div data-aos="fade-up" class="flex w-full gap-2 p-4 mb-4 bg-orange-100 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-500 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <p class="w-full text-orange-500"><?php echo $_GET['error']; ?></p>
                    <a href="user.php">
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
                    <a href="<?= base_url('product') ?>">
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
                            <th class="px-4 py-2">Harga Beli</th>
                            <th class="px-4 py-2">Harga Jual</th>
                            <th class="px-4 py-2">Stok Awal</th>
                            <th class="px-4 py-2">Satuan</th>
                            <th class="px-4 py-2">Kategori</th>
                            <th class="px-4 py-2 max-lg:hidden">Tgl. Dibuat</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($products as $item) {
                        ?>
                            <tr class="text-sm">
                                <td class="px-4 py-2 border">
                                    <?php echo $no++; ?>
                                </td>
                                <td class="px-4 py-2 border">
                                    <div class="flex items-center gap-2.5">
                                        <!-- image -->
                                        <?php if (isset($item['image'])) { ?>
                                            <div class="size-[40px] bg-slate-500 rounded-lg relative">
                                                <img src="<?php echo "../uploads/" . $item['image']; ?>" alt="Image" class="object-cover w-full h-full rounded-lg">
                                            </div>
                                        <?php } else { ?>
                                            <div class="size-[40px] bg-slate-500 rounded-lg relative">
                                                <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-[20px] fill-slate-200">
                                                        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 0 0 4.25 22.5h15.5a1.875 1.875 0 0 0 1.865-2.071l-1.263-12a1.875 1.875 0 0 0-1.865-1.679H16.5V6a4.5 4.5 0 1 0-9 0ZM12 3a3 3 0 0 0-3 3v.75h6V6a3 3 0 0 0-3-3Zm-3 8.25a3 3 0 1 0 6 0v-.75a.75.75 0 0 1 1.5 0v.75a4.5 4.5 0 1 1-9 0v-.75a.75.75 0 0 1 1.5 0v.75Z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <span class="text-sm font-semibold"><?php echo $item['name']; ?></span>
                                    </div>
                                </td>
                                <td class="px-4 py-2 border">
                                    <?php echo $item['purchase_price']; ?>
                                </td>
                                <td class="px-4 py-2 border max-lg:hidden">
                                    <?php echo $item['selling_price']; ?>
                                </td>
                                <td class="px-4 py-2 border max-lg:hidden">
                                    <?php echo $item['initial_stock']; ?>
                                </td>
                                <td class="px-4 py-2 border max-lg:hidden">
                                    <?php echo $item['unit']; ?>
                                </td>
                                <td class="px-4 py-2 border max-lg:hidden">
                                    <?php echo $item['category']; ?>
                                </td>
                                <td class="px-4 py-2 border max-lg:hidden">
                                    <?php echo $item['created_at']; ?>
                                </td>
                                <td class="px-4 py-2 border">

                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= base_url('product/update') . '/' . $item['id'] ?>">
                                            <button type="button" class="px-4 py-2 text-sm font-semibold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-600 hover:border-blue-600">
                                                Ubah
                                            </button>
                                        </a>


                                        <button type="button" onclick="showDeleteConfirmation('<?= $item['id']; ?>', '<?= $item['name']; ?>')" class="px-4 py-2 text-sm font-semibold text-white bg-red-500 border border-red-500 rounded hover:bg-red-600 hover:border-red-600">
                                            Hapus
                                        </button>

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
            let result = confirm(`Apakah Anda yakin ingin menghapus produk "${name}"?`);

            if (result) {
                window.location.href = `<?= base_url('product/delete') ?>/${id}`;
            }
        }
    </script>
</body>

</html>