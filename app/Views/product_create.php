<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../css/app.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main class="py-5 w-full px-6 md:px-[10%] max-w-7xl mx-auto">
        <h2 data-aos="fade-up" class="mb-5 text-2xl font-semibold">Produk</h2>

        <!-- Error Message -->
        <?php
        if (isset($_GET['error'])) {
        ?>
            <div class="flex w-full gap-2 p-4 mb-4 bg-orange-100 rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-500 size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
                <p class="text-orange-500"><?php echo $_GET['error']; ?></p>
            </div>
        <?php
        }
        ?>

        <!-- Update Profile Form -->
        <div data-aos="fade-up" data-aos-delay="50" class="flex gap-8 mt-5 max-sm:flex-col">
            <!-- Form -->
            <div class="w-full">
                <h3 class="mb-3 text-lg font-semibold">Tambah Produk</h3>
                <form action="<?= base_url('product/create-action') ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="name" id="name" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <input type="text" name="description" id="description" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="purchase_price" class="block text-sm font-medium text-gray-700">Harga Beli</label>
                        <input type="number" name="purchase_price" id="purchase_price" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="selling_price" class="block text-sm font-medium text-gray-700">Harga Jual</label>
                        <input type="number" name="selling_price" id="selling_price" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="initial_stock" class="block text-sm font-medium text-gray-700">Stok Awal</label>
                        <input type="number" name="initial_stock" id="initial_stock" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit" class="block text-sm font-medium text-gray-700">Satuan</label>
                        <input type="text" name="unit" id="unit" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <input type="text" name="category" id="category" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" name="image" id="image" class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>

                    <div class="flex items-center gap-2 mt-8">
                        <button type="submit" class="py-2 text-sm font-semibold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-600 px-7 hover:border-blue-600">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>


    </main>
</body>

</html>