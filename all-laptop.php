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

    <!-- Swiper Css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
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

     <!-- All Product Section -->
    <section id="product">
      <div class="container mx-auto px-4 pt-40 lg:pt-28 pb-10 flex flex-col justify-between lg:px-36">
        <div class="product-heading mb-4">
          <h1 class="text-2xl font-semibold">Semua Produk</h1>
        </div>
        <div class="product-container flex flex-wrap w-full gap-3">
          <?php
            $query = "SELECT * FROM laptop ORDER BY nama_laptop ASC;";
            $result = mysqli_query($koneksi, $query);
            // var_dump($result);
            $i = 1; 
            while($row = mysqli_fetch_assoc($result)){
            ?>
          <div class="product group">
            <a href="laptop.php?id=<?php echo $row['id_laptop'] ?>">
              <img src="<?php echo './src/img/laptop-img/' . $row['gambar']; ?>" alt="" class="w-[70%] lg:w-full mx-auto object-cover bg-white p-2 transform transition duration-300 group-hover:scale-110">
              <div class="content py-2 px-3 flex flex-col flex-grow">
                <div class="penggunaan text-xs mb-2 text-slate-400 capitalize"><?php echo $row['penggunaan']; ?></div>
                <div class="nama text-sm font-semibold mb-2 hover:underline capitalize"><?php echo $row['nama_laptop']; ?></div>
                <div class="nama text-xs font-normal mb-2 uppercase"><?php echo $row['kode_laptop']; ?></div>
                <div class="spesifikasi text-xs text-slate-400 truncate"><?php echo $row['prosessor']; ?></div>
              </div>
            </a>
        </div>
        <?php } ?>
        </div>
      </div>
    </section>

    <!-- Main Js -->
    <script src="./src/js/script.js"></script>

    <!-- Swiper Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
</body>
</html>