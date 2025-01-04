<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main>
        <div class="py-5 mx-auto px-[24px] md:px-[10%]">
            <h2 data-aos="fade-up" class="mb-5 text-2xl font-semibold">Dashboard Admin</h2>

            <div data-aos="fade-up" data-aos-delay="50" class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
                <!-- Kelola Pengguna -->
                <div class="flex items-center justify-between gap-4 p-5 bg-white border rounded-lg">
                    <div>
                        <h3 class="mb-3 text-lg font-semibold">
                            Pengguna
                        </h3>
                        <p class="text-gray-500">
                            Kelola Pengguna
                        </p>
                        <a href="<?php echo base_url('user') ?>">
                            <button type="button" class="py-2 mt-3 text-sm font-semibold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-600 px-7 hover:border-blue-600">
                                Kelola Pengguna
                            </button>
                    </div>
                    <p class="p-5 text-4xl"><?php echo $total_user; ?></p>
                    </a>
                </div>

                <!-- Kelola Produk -->
                <div class="flex items-center justify-between gap-4 p-5 bg-white border rounded-lg">
                    <div>
                        <h3 class="mb-3 text-lg font-semibold">
                            Produk
                        </h3>
                        <p class="text-gray-500">
                            Kelola Produk
                        </p>
                        <a href="<?php echo base_url('product') ?>">
                            <button type="button" class="py-2 mt-3 text-sm font-semibold text-white bg-blue-500 border border-blue-500 rounded hover:bg-blue-600 px-7 hover:border-blue-600">
                                Kelola Produk
                            </button>
                    </div>
                    <p class="p-5 text-4xl"><?php echo $total_product; ?></p>
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>