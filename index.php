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
            <!-- Logo -->
            <h1 class="font-bold">
                <a href="index.php">
                    <img src="./src/img/logo.svg" alt="Cari Laptop Logo" title="Rekomendasi Laptop Terbaik!" class="w-40">
                </a>
            </h1>

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

    <!-- Advertisement Section -->
    <section id="advertisement">
        <div class="container mx-auto px-4 pt-40 lg:pt-28 pb-5 flex justify-between items-center lg:px-36">
            <div class="advertisement border border-slate-300 w-full flex flex-col lg:flex-row items-center rounded-lg">
                <div class="text px-10 py-5 w-full lg:w-1/2 text-paragraph">
                    <h1 class="text-xl md:text-2xl lg:text-5xl font-bold mb-5">Bingung cari laptop yang sesuai?</h1>
                    <p>Dapatkan rekomendasi laptop sesuai kebutuhan kamu, mulai dari gaming hingga pekerjaan profesional!</p>
                </div>
                <div class="image w-full lg:w-1/2">
                    <img src="./src/img/ads-img.png" alt="Rekomendasi Laptop Terbaik!" class="w-full">
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section -->
    <section id="category">
        <div class="container mx-auto px-4 py-5 flex flex-col justify-between lg:px-36">
            <div class="category-heading mb-4">
                <h1 class="text-2xl font-semibold">Kategori Brand</h1>
            </div>
            <div class="swiper">
              <div class="swiper-wrapper">
              <?php
                    $query = "SELECT * FROM merek;";
                    $result = mysqli_query($koneksi, $query);
                    // var_dump($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Menyesuaikan kelas kategori berdasarkan merek
                        $categoryClass = '';
                        switch ($row['nama_merek']) {
                            case 'asus':
                                $categoryClass = 'cat-1';
                                break;
                            case 'acer':
                                $categoryClass = 'cat-2';
                                break;
                            case 'lenovo':
                                $categoryClass = 'cat-3';
                                break;
                            case 'hp':
                                $categoryClass = 'cat-4';
                                break;
                            case 'apple':
                                $categoryClass = 'cat-5';
                                break;
                            case 'axioo':
                                $categoryClass = 'cat-6';
                                break;
                            case 'msi':
                                $categoryClass = 'cat-7';
                                break;
                            case 'dell':
                                $categoryClass = 'cat-8';
                                break;
                            default:
                                $categoryClass = 'cat-default';
                                break;
                        }
                    ?>
                    
                        <div class="swiper-slide group">
                            <a href="brand.php?merek=<?php echo $row['nama_merek'] ?>" class="<?php echo $categoryClass; ?> category">
                                <img src="<?php echo './src/img/category-logo/' . $row['logo']; ?>" alt="<?php echo $row['nama_merek']; ?> logo" class="w-[4rem] transform transition duration-300 group-hover:scale-110">
                            </a>
                        </div>
                    
                    <?php
                    }
                    ?>
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- Recommendation Section -->
     <section id="recommendation">
        <div class="container mx-auto px-4 py-5 flex flex-col justify-between lg:px-36">
            <div class="recommendation-heading mb-10">
                <h1 class="text-2xl font-semibold">Rekomendasi</h1>
            </div>
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php
                    $query = "SELECT * FROM laptop LIMIT 10;";
                    $result = mysqli_query($koneksi, $query);
                    // var_dump($result);
                    $i = 1; 
                    while($row = mysqli_fetch_assoc($result)){

                    ?>
                <div class="swiper-slide">
                    <div class="rekomendasi group">
                        <a href="laptop.php?id=<?php echo $row['id_laptop'] ?>">
                          <img src="<?php echo './src/img/laptop-img/' . $row['gambar']; ?>" alt="" class="w-full h-auto object-cover bg-white p-2 transform transition duration-300 group-hover:scale-110">
                          <div class="content py-2 px-3 flex flex-col flex-grow">
                            <div class="penggunaan text-xs mb-2 text-slate-400 capitalize"><?php echo $row['penggunaan']; ?></div>
                            <div class="nama text-sm font-semibold mb-2 hover:underline capitalize"><?php echo $row['nama_laptop']; ?></div>
                            <div class="nama text-xs font-normal mb-2 uppercase"><?php echo $row['kode_laptop']; ?></div>
                            <div class="spesifikasi text-xs text-slate-400 truncate"><?php echo $row['prosessor']; ?></div>
                          </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <!-- Repeat for other slides -->
              </div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-button-next"></div>
            </div>
        </div>
     </section>

     <!-- Product Section -->
    <section id="product">
      <div class="container mx-auto px-4 py-5 flex flex-col justify-between lg:px-36">
        <div class="product-heading mb-4 flex flex-row justify-between items-center">
          <h1 class="text-2xl font-semibold">Produk Lainnya</h1>
          <a href="./all-laptop.php" class="py-3 px-5 text-sm bg-darkblue text-white rounded-full hover:bg-darkblue/80">Lihat Semua</a>
        </div>
        <div class="product-container flex flex-wrap w-full gap-3">
          <?php
            $query = "SELECT * FROM laptop WHERE id_laptop > 10 LIMIT 18;";
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

    <!-- Survey Feature Section -->
     <section id="feature" class="mb-8">
      <div class="container mx-auto px-4 py-5 lg:px-36">
          <div class="feature bg-darkblue border border-slate-300 w-full flex flex-row items-center rounded-lg">
              <div class="text lg:px-10 px-5 py-5 w-full lg:w-1/2 text-white">
                  <p class="text-base mb-5">Survei Preferensi</p>
                  <h1 class="text-xl md:text-2xl lg:text-5xl font-bold mb-5">Masih bingung cari laptop yang sesuai?</h1>
                  <p class="mb-7">Tenang, kami mempunyai fitur Survei Preferensi yang membantu kamu mencari laptop yang tepat dengan menjawab pertanyaan yang kami berikan.</p>
                  <a href="./survey/survey-guide.php" class="text-paragraph bg-white py-2 px-8 w-full flex items-center gap-2 justify-center rounded-lg hover:bg-white/80">
                    <span>Mulai</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m18 8l4 4m0 0l-4 4m4-4H2"/>
                    </svg>
                  </a>
              </div>
              <div class="image lg:w-1/2 hidden lg:flex justify-center">
                  <img src="./src/img/featured-img.svg" alt="Rekomendasi Laptop Terbaik!" class="w-96">
              </div>
          </div>
      </div>
     </section>

    <!-- Main Js -->
    <script src="./src/js/script.js"></script>

    <!-- Swiper Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
</body>
</html>