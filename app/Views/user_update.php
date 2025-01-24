<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Pengguna</title>
    <link rel="stylesheet" href="../../css/app.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <main class="py-5 w-full px-6 md:px-[10%] max-w-7xl mx-auto">
        <h2 data-aos="fade-up" class="mb-5 text-2xl font-semibold">Pengguna</h2>

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

        <!-- Update User Form -->
        <div data-aos="fade-up" data-aos-delay="50" class="flex gap-8 mt-5 max-sm:flex-col">
            <!-- Form -->
            <div class="w-full">
                <h3 class="mb-3 text-lg font-semibold">Ubah Pengguna</h3>
                <form action="<?= base_url('user/update-action') . '/' . $user['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="block mb-1 text-gray-700">Nama</label>
                        <input type="name" id="name" name="name"
                            value="<?= old('name') ?? $user['name'] ?>"
                            placeholder="Masukkan nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="block mb-1 text-gray-700">Username</label>
                        <input type="username" id="username" name="username"
                            value="<?= old('username') ?? $user['username'] ?>"
                            placeholder="Masukkan nama" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="block mb-1 text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            value="<?= old('email') ?? $user['email'] ?>"
                            placeholder="Masukkan email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="block mb-1 text-gray-700">Alamat</label>
                        <input type="address" id="address" name="address"
                            value="<?= old('address') ?? $user['address'] ?>"
                            placeholder="Masukkan alamat" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="block mb-1 text-gray-700">Nomor Telepon</label>
                        <input type="phone" id="phone" name="phone"
                            value="<?= old('phone') ?? $user['phone'] ?>"
                            placeholder="Masukkan nomor telepon" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <!-- Role Id -->
                    <div class="mb-3">
                        <label for="role_id" class="block mb-1 text-gray-700">Role</label>
                        <select id="role_id" name="role_id"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="2" <?= old('role_id') == 2 || $user['role_id'] == 2 ? 'selected' : '' ?>>Admin</option>
                            <option value="3" <?= old('role_id') == 3 || $user['role_id'] == 3 ? 'selected' : '' ?>>Komunitas</option>
                            <option value="4" <?= old('role_id') == 4 || $user['role_id'] == 4 ? 'selected' : '' ?>>Pemilik Toko</option>
                            <option value="5" <?= old('role_id') == 5 || $user['role_id'] == 5 ? 'selected' : '' ?>>Karyawan Toko</option>
                            <option value="6" <?= old('role_id') == 6 || $user['role_id'] == 6 ? 'selected' : '' ?>>Tamu</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-1 text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            value="<?= old('password') ?>"
                            placeholder="Masukkan password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="password_confirmation" class="block mb-1 text-gray-700">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            value="<?= old('password_confirmation') ?>"
                            placeholder="Masukkan kembali password" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit" class="w-full py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Simpan</button>
                </form>
            </div>
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