<?php 
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Laptop | Rekomendasi Laptop Terbaik!</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" href="./src/css/output.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="./src/img/favicon/site.webmanifest">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

</head>
<body class="font-jakarta">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-30 bg-white border border-b-slate-300 w-full">
        <div class="container px-8 py-5 flex flex-col mx-auto lg:flex-row justify-between items-center gap-5 lg:px-36 w-full">
            <!-- Back -->
            <a href="./index.php" class="py-2 px-0 lg:px-8 flex items-center gap-2 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8l-4 4m0 0l4 4m-4-4h20"/>
                </svg>
                <span>Kembali</span>
            </a>

            <!-- Search -->
            <div class="w-full lg:w-auto">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-4 h-4 text-slate-900" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                            </path>
                        </svg>
                    </div>
                    <form action="search.php" method="GET">
                        <input type="search" name="search" placeholder="Temukan laptop anda" class="py-2 px-5 pl-10 text-slate-600 rounded-full w-full lg:w-96 border border-slate-400 focus:border-paragraph focus:outline focus:outline-paragraph">
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Guide Section -->
    <section id="search">
        <?php
            $search = mysqli_real_escape_string($koneksi, $_GET['search']);
            $query = "SELECT * FROM laptop WHERE nama_laptop LIKE '%$search%' OR prosessor LIKE '%$search%' OR merek LIKE '%$search%' OR seri LIKE '%$search%'";
            $result = mysqli_query($koneksi, $query);
            $jumlahHasil = mysqli_num_rows($result);
        ?>
        <div class="container mx-auto px-4 pt-40 lg:pt-28 flex flex-col justify-between lg:px-36 mb-10">
            <div class="search-heading flex flex-row justify-between items-center">
                <h1 class="text-2xl font-semibold border-b border-b-slate-300 w-full pb-4">Hasil Pencarian Anda untuk "<?php echo $search ?>"</h1>
            </div>
            <div class="jumlah-pencarian my-5">
                <?php echo $jumlahHasil > 0 ? "<p class='text-slate-500'>Ditemukan $jumlahHasil hasil pencarian</p>" : ''; ?>
            </div>
            <div class="product-container flex flex-wrap w-full gap-3">

                <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <div class="product">
                        <a href="laptop.php?id=<?php echo $row['id_laptop'] ?>">
                          <img src="<?php echo './src/img/laptop-img/' . $row['gambar']; ?>" alt="" class="w-[70%] lg:w-full mx-auto object-cover bg-white p-2">
                          <div class="content py-2 px-3 flex flex-col flex-grow">
                            <div class="penggunaan text-xs mb-2 text-slate-400 capitalize"><?php echo $row['penggunaan']; ?></div>
                            <div class="nama text-sm font-semibold mb-2 hover:underline uppercase"><?php echo $row['nama_laptop']; ?></div>
                            <div class="spesifikasi text-xs text-slate-400 truncate"><?php echo $row['prosessor']; ?></div>
                          </div>
                        </a>
                    </div>
                    <?php }
                        } else {
                            echo '<h1 class="text-xl">Tidak ada hasil ditemukan.</h1>';
                        }
                    ?>
            </div>
        </div>
    </section>

    <!-- Main Js -->
    <script src="./src/js/script.js"></script>
</body>
</html>