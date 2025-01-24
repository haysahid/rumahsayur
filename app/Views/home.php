<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="../css/app.css">
</head>

<body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Jumbotron -->
        <section
            class="relative p-12 overflow-hidden text-center bg-center bg-no-repeat bg-cover"
            style="background-image: url('./background_sayur.jpg'); height: 400px">
            <div
                class="absolute top-0 bottom-0 left-0 right-0 w-full h-full overflow-hidden bg-fixed"
                style="background-color: rgba(0, 0, 0, 0.6)">
                <div class="flex items-center justify-center h-full">
                    <div class="text-white">
                        <h2 data-aos="fade-up" class="mb-4 text-4xl font-semibold">Selamat Datang!</h2>
                        <h4 data-aos="fade-up" data-aos-delay="100" class="mb-6 text-xl font-semibold">Di Rumah Sayur</h4>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products -->
        <section class="px-6 md:px-[10%] py-6 mx-auto">
            <h2 data-aos="fade-up" data-aos-delay="50" class="text-2xl font-semibold">Produk Terbaru</h2>
            <div class="grid grid-cols-1 gap-6 mt-6 gap-x-12 md:grid-cols-2 xl:grid-cols-3">
                <?php foreach ($products as $product) { ?>
                    <div data-aos="fade-up" class="flex items-center py-8 overflow-hidden bg-white border-b rounded gap-x-6 gap-y-4 max-sm:flex-col border-b-slate-200">
                        <?php
                        if (isset($product['image'])) {
                        ?>
                            <img
                                src="../uploads/<?= $product['image'] ?>"
                                alt="Product Image"
                                class="object-cover w-full rounded-lg sm:w-2/4 sm:aspect-square">
                        <?php } else { ?>
                            <div class="relative w-full rounded-lg sm:w-2/4 sm:aspect-square bg-slate-300">
                                <div class="flex items-center justify-center w-full h-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 fill-white">
                                        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                                    </svg>
                                </div>


                            </div>
                        <?php } ?>


                        <div class="w-3/4 max-sm:w-full">
                            <h3 class="text-lg font-semibold"><?= $product['name']; ?></h3>
                            <div class="flex items-center gap-2 mt-1">
                                <p class="text-xs text-neutral-500"><?= $product['category']; ?></p>
                            </div>

                            <p class="mt-2 text-sm text-neutral-500 line-clamp-3"><?= strip_tags($product['description']); ?></p>

                            <div class="flex items-center gap-2 mt-2">
                                <p class="text-lg text-orange-600 line-clamp-3">Rp <?= number_format($product['selling_price'], 0, ',', '.'); ?></p>
                                <p class="text-xs text-neutral-500">
                                    / <?= $product['unit']; ?>
                                </p>
                            </div>

                            <a href="https://wa.me/6283861999797?text=<?= urlencode('Halo, saya ingin memesan ' . $product['name']); ?>" target="_blank">
                                <button
                                    class="flex items-center gap-2 px-4 py-2 mt-4 text-sm text-white bg-green-500 rounded hover:bg-green-600">
                                    <svg class="svg-icon size-8" style="vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M623.915417 525.57825c3.851725 0 18.300808 6.520507 43.343157 19.560498 25.045419 13.041014 38.307468 20.894889 39.789215 23.561625 0.592494 1.481747 0.890276 3.705392 0.890276 6.668886 0 9.780761-2.51938 21.043269-7.55814 33.788547-4.743024 11.558244-15.263635 21.264303-31.565926 29.119201-16.300244 7.853875-31.4155 11.781324-45.345768 11.781324-16.893762 0-45.049009-9.188266-84.46881-27.564799-29.0445-13.335726-54.236252-30.823006-75.576279-52.458769-21.339004-21.635763-43.271526-49.051159-65.795519-82.245166-21.340027-31.712259-31.860638-60.461023-31.56388-86.246293l0-3.557012c0.889253-26.970258 11.855002-50.384527 32.897248-70.241784 7.114025-6.520507 14.818497-9.779737 23.11751-9.779737 1.777483 0 4.445242 0.222057 8.001231 0.666172 3.557012 0.444115 6.372128 0.667196 8.447393 0.667196 5.631254 0 9.558703 0.961908 11.781324 2.888793 2.222621 1.926886 4.519943 6.002714 6.890944 12.226462 2.371 5.92699 7.261381 18.968004 14.671141 39.120996 7.408737 20.154016 11.114129 31.269168 11.114129 33.342386 0 6.224772-5.112438 14.744819-15.337313 25.563212-10.224876 10.81737-15.338337 17.708314-15.338337 20.671809 0 2.075265 0.741897 4.297886 2.222621 6.668886 10.076496 21.635763 25.192775 41.938158 45.345768 60.907185 16.598027 15.70775 38.974663 30.674627 67.12991 44.900629 3.557012 2.075265 6.816243 3.111874 9.781784 3.111874 4.446265 0 12.447497-7.186679 24.006763-21.560038C612.356151 532.765953 620.060623 525.57825 623.915417 525.57825L623.915417 525.57825zM533.666974 761.199619c37.640272 0 73.724095-7.408737 108.252493-22.228257 34.527374-14.818497 64.238047-34.676777 89.134063-59.572794 24.896017-24.894993 44.75225-54.606689 59.572794-89.13611 14.818497-34.527374 22.228257-70.612221 22.228257-108.252493s-7.408737-73.724095-22.228257-108.252493c-14.81952-34.528398-34.676777-64.240093-59.572794-89.13611s-54.606689-44.753273-89.134063-59.572794c-34.528398-14.818497-70.612221-22.228257-108.252493-22.228257-37.641295 0-73.725118 7.40976-108.253516 22.228257-34.528398 14.81952-64.240093 34.676777-89.13611 59.572794-24.896017 24.896017-44.75225 54.607712-59.57177 89.13611-14.818497 34.528398-22.228257 70.612221-22.228257 108.252493 0 60.165288 17.783015 114.698299 53.348022 163.601078l-35.120892 103.585193 107.585297-34.231639C427.118286 745.788627 478.243687 761.199619 533.666974 761.199619L533.666974 761.199619zM533.666974 146.806577c45.345768 0 88.691995 8.890484 130.035612 26.673499 41.34464 17.783015 76.983325 41.640376 106.918102 71.575152s53.792137 65.573461 71.575152 106.918102 26.673499 84.690868 26.673499 130.036635c0 45.346791-8.890484 88.690972-26.673499 130.036635s-41.640376 76.984349-71.575152 106.918102c-29.934776 29.934776-65.573461 53.79316-106.918102 71.575152-41.345664 17.783015-84.690868 26.674523-130.035612 26.674523-57.795311 0-111.883183-13.930267-162.268734-41.789779l-185.384198 59.572794 60.461023-180.050726c-32.009018-52.755528-48.013527-110.401436-48.013527-172.937724 0-45.345768 8.891508-88.690972 26.674523-130.036635 17.781992-41.34464 41.641399-76.983325 71.576175-106.918102 29.933753-29.934776 65.573461-53.792137 106.918102-71.575152C444.976002 155.697061 488.320183 146.806577 533.666974 146.806577z" />
                                    </svg>

                                    <p>

                                        Pesan Sekarang
                                    </p>
                                </button>

                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container p-5 mx-auto">
            <!-- Copy right -->
            <div class="text-center text-neutral-500">
                &copy; 2025 Rumah Sayur by Sahid Anwar
            </div>
        </div>
    </footer>

    <script src="src/js/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>