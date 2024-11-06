<?php 
    include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Laptop | Rekomendasi Laptop Terbaik!</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/output.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../src/img/favicon/site.webmanifest">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

</head>
<body class="font-jakarta">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-30 bg-white border border-b-slate-300 w-full">
        <div class="container px-8 py-5 mx-auto flex flex-row justify-between items-center gap-5 lg:px-36">
            <!-- Back -->
            <a href="../index.php" class="py-2 px-0 lg:px-8 flex items-center gap-2 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8l-4 4m0 0l4 4m-4-4h20"/>
                </svg>
                <span>Kembali</span>
            </a>

            <!-- Heading -->
            <div>
                <h1 class="text-center font-bold text-xl">Survei Preferensi</h1>
            </div>
        </div>
    </nav>

    <!-- Guide Section -->
    <section id="product">
      <div class="container mx-auto pt-40 lg:pt-28 pb-10 flex flex-col justify-between lg:px-36">
        <div class="product-heading mb-4 pb-4 border-b-paragraph border-b">
          <h1 class="font-bold text-xl text-center">Hasil Survei Rekomendasi</h1>
        </div>
        <div class="brand-container flex flex-col gap-3 lg:gap-0 lg:flex-row">
          <div class="brand-series bg-white overflow-hidden flex flex-col w-full lg:w-1/4 gap-2 py-3 px-4 lg:py-0 sticky top-[9rem] lg:top-[6rem] z-50" style="align-self: flex-start;" id="brandSeries">
            <h1 class="font-semibold text-lg">Pilhan Anda</h1>
              <p>Budget</p>
          </div>
            
          <div class="product-container flex flex-wrap w-full lg:w-3/4 gap-3 px-4 lg:px-0" id="product-list">
              <?php
              $query = "SELECT * FROM laptop limit 8";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <div class="brand-products group" data-seri="<?php echo $row['seri']; ?>">
                      <a href="laptop.php?id=<?php echo $row['id_laptop'] ?>">
                          <img src="<?php echo './src/img/laptop-img/' . $row['gambar']; ?>" alt="" class="w-[70%] lg:w-full mx-auto object-cover bg-white p-2 transform transition duration-300 group-hover:scale-110">
                          <div class="content py-2 px-3 flex flex-col flex-grow">
                              <div class="penggunaan text-xs mb-2 text-slate-400 capitalize"><?php echo $row['penggunaan']; ?></div>
                              <div class="nama text-sm font-semibold mb-2 hover:underline uppercase"><?php echo $row['nama_laptop']; ?></div>
                              <div class="nama text-xs font-normal mb-2 uppercase"><?php echo $row['kode_laptop']; ?></div>
                              <div class="spesifikasi text-xs text-slate-400 truncate"><?php echo $row['prosessor']; ?></div>
                          </div>
                      </a>
                  </div>
              <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Js -->
    <script src="../src/js/script.js"></script>
</body>
</html>