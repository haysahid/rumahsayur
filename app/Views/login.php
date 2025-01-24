<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/app.css">

</head>

<body style="background: url('src/images/bromo.jpg')" class="bg-center bg-no-repeat bg-cover ">
    <!-- Navbar -->

    <!-- Main Content -->
    <main class="flex items-center justify-center h-full py-32">
        <div data-aos="fade-up" class="w-full max-w-sm p-8 bg-white rounded-lg shadow-lg">
            <h2 class="mb-6 text-2xl font-bold text-center">Masuk</h2>

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

            <form action="<?= base_url('login-action') ?>" method="POST">
                <div class="mb-4">
                    <label for="username" class="block mb-1 text-gray-700">Username</label>
                    <input type="username" id="username" name="username" placeholder="Masukkan username" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-1 text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Masuk</button>

                <div class="flex items-center justify-center gap-2 mt-8">
                    <p class="text-slate-500">Belum punya akun?</p>
                    <a href="<?= base_url('register') ?>" class="text-blue-500">Daftar</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>