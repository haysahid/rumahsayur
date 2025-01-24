<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/app.css">
</head>

<body style="background: url('src/images/bromo.jpg')" class="h-screen bg-center bg-no-repeat bg-cover">
    <!-- Navbar -->

    <!-- Main Content -->
    <main data-aos="fade-up" class="flex items-center justify-center py-16">
        <div class="w-full max-w-sm p-8 bg-white rounded-lg shadow-lg">
            <h2 class="mb-6 text-2xl font-bold text-center">Daftar</h2>

            <!-- Error Message -->
            <?php
            if (isset($error)) {
            ?>
                <div class="flex w-full gap-2 p-4 mb-4 bg-orange-100 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-orange-500 size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                    <p class="text-orange-500"><?php echo $error; ?></p>
                </div>
            <?php
            }
            ?>

            <form action="<?= base_url('register-action') ?>" method="POST">
                <div class="mb-4">
                    <label for="name" class="block mb-1 text-gray-700">Nama</label>
                    <input type="name" id="name" name="name" placeholder="Masukkan nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="username" class="block mb-1 text-gray-700">Username</label>
                    <input type="username" id="username" name="username" placeholder="Masukkan nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-1 text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block mb-1 text-gray-700">Alamat</label>
                    <input type="address" id="address" name="address" placeholder="Masukkan alamat" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-1 text-gray-700">Nomor Telepon</label>
                    <input type="phone" id="phone" name="phone" placeholder="Masukkan nomor telepon" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-1 text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-6">
                    <label for="password_confirmation" class="block mb-1 text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Masukkan kembali password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <button type="submit" class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Daftar</button>

                <div class="flex items-center justify-center gap-2 mt-8">
                    <p class="text-slate-500">Sudah punya akun?</p>
                    <a href="<?= base_url('login') ?>" class="text-blue-500">Masuk</a>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Password Confirmation Validation
        const password = document.getElementById('password');
        const passwordConfirmation = document.getElementById('password_confirmation');

        // Check password length
        password.addEventListener('input', () => {
            if (password.value.length < 8) {
                password.setCustomValidity('Password minimal 8 karakter');
            } else {
                password.setCustomValidity('');
            }
        });

        // Check if password and password confirmation are the same
        passwordConfirmation.addEventListener('input', () => {
            if (password.value !== passwordConfirmation.value) {
                passwordConfirmation.setCustomValidity('Password tidak sama');
            } else {
                passwordConfirmation.setCustomValidity('');
            }
        });
    </script>
</body>

</html>