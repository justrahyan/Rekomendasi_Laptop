<?php 
    include "./koneksi.php"; 
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
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
            <a href="javascript:history.back()" class="py-2 px-0 lg:px-8 flex items-center gap-2 hover:underline">
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

    <!-- Laptop Section -->
    <section id="laptop">
        <div class="container mx-auto px-4 pt-36 md:pt-40 lg:pt-28 flex flex-col justify-between lg:px-36">
            <?php
                $query = "SELECT * FROM laptop WHERE id_laptop = '$id'";
                $result = mysqli_query($koneksi, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="laptop-content mb-10 w-full lg:h-[30rem] flex flex-col lg:flex-row justify-between items-start">
                <div class="image w-full lg:w-1/3 p-4">
                    <img src="<?php echo './src/img/laptop-img/' . $row['gambar']; ?>" alt="" class="w-full bg-white mx-auto">
                </div>
                <div class="text w-full lg:w-2/3 h-full lg:overflow-hidden">
                    <div class="sticky top-0 bg-white w-full px-4 py-2 flex flex-row justify-between items-start">
                        <div class="nama_laptop flex flex-col">
                            <div class="nama text-lg lg:text-2xl font-bold mb-2 capitalize"><?php echo $row['nama_laptop']; ?></div>
                            <div class="kode text-sm lg:text-lg font-normal mb-2 uppercase"><?php echo $row['kode_laptop']; ?></div>
                        </div>
                        <div class="text-sm lg:text-lg font-semibold mb-2"><?php echo  'Rp. ' . number_format($row['harga'],2,',','.'); ?></div>
                    </div>
                    <div class="scroll lg:h-[30rem] px-4 pt-2 pb-4 lg:overflow-y-auto flex flex-col gap-4">
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Merek</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['merek']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Tahun</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['tahun']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Seri</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['seri']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Penggunaan</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['penggunaan']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">RAM</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['ram']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Penyimpanan</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['penyimpanan']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Kartu Grafis (GPU)</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['GPU']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Prosesor</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['prosessor']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Sistem Operasi</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['OS']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Layar</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['display']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">I/O Port</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['io_port']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Baterai</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['baterai']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Berat</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['berat']; ?></div>
                        </div>
                        <div class="merk flex flex-row items-start justify-between pb-0 lg:pb-20">
                            <p class="text-sm lg:text-lg font-semibold w-1/3">Kamera</p>
                            <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $row['webcam']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
            } else {
                echo '<p class="text-red-500">Laptop tidak ditemukan.</p>';
            }
            ?>
        </div>
     </section>

     <!-- Survey Feature Section -->
     <section id="feature" class="mb-8">
      <div class="container mx-auto px-4 py-5 lg:px-36">
          <div class="feature bg-darkblue border border-slate-300 w-full flex flex-row items-center rounded-lg">
              <div class="text px-10 py-5 w-full lg:w-1/2 text-white">
                  <h1 class="text-xl md:text-2xl lg:text-5xl font-bold mb-5">Coba Bandingkan Laptop?</h1>
                  <p class="mb-7">Coba fitur Bandingkan Laptop untuk membandingkan laptop ini dengan laptop lainnya!</p>
                    <?php
                          $query = "SELECT * FROM laptop WHERE id_laptop = ?";
                          $stmt = mysqli_prepare($koneksi, $query);
                          mysqli_stmt_bind_param($stmt, "i", $id);
                          mysqli_stmt_execute($stmt);
                          $result = mysqli_stmt_get_result($stmt);
                          if($row = mysqli_fetch_assoc($result)) {
                    ?>
                  <a href="./conclusion/conclusion-main.php?currentLaptopId=<?php echo $row['id_laptop']; ?>" class="text-paragraph bg-white py-2 px-8 w-full flex items-center gap-2 justify-center rounded-lg hover:bg-white/80">
                    <span>Mulai</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m18 8l4 4m0 0l-4 4m4-4H2"/>
                    </svg>
                  </a>
                    <?php
                        }
                    ?>
              </div>
              <div class="image lg:w-1/2 hidden lg:flex justify-center">
                  <img src="./src/img/featured-img.svg" alt="Rekomendasi Laptop Terbaik!" class="w-96">
              </div>
          </div>
      </div>
     </section>

    <!-- Main Js -->
    <script src="./src/js/script.js"></script>
</body>
</html>