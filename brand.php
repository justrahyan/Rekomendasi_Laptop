<?php 
    include "koneksi.php";
    
    $merek = isset($_GET['merek']) ? $_GET['merek'] : '';
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
      <div class="container mx-auto pt-40 lg:pt-28 pb-10 flex flex-col justify-between lg:px-36">
        <div class="product-heading mb-4 pb-4 border-b-paragraph border-b">
          <?php
            $logoPath = './src/img/category-logo/' . strtolower($merek) . '-logo.svg';
          ?>
          <img src="<?php echo $logoPath; ?>" alt="<?php echo $merek; ?> logo" class="w-20 mx-auto lg:ml-0">
        </div>
        <div class="brand-container flex flex-col gap-3 lg:gap-0 lg:flex-row">
          <div class="brand-series bg-white overflow-hidden flex flex-col w-full lg:w-1/4 gap-2 py-3 px-4 lg:py-0 sticky top-[9rem] lg:top-[6rem] z-50" style="align-self: flex-start;" id="brandSeries">
            <h1 class="font-semibold text-lg" onclick="toggleBrandSeries()">Berdasarkan Seri</h1>
              <div class="hidden lg:flex flex-col gap-2 transition-all duration-300 ease-in-out" id="brandContent">
                <?php
                $merek = isset($_GET['merek']) ? strtolower($_GET['merek']) : '';

                // Menampilkan checkbox berdasarkan merek
                if ($merek === 'asus') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="tuf_gaming" id="tuf_gaming" value="ASUS TUF Gaming" onclick="updateProducts()"><label for="tuf_gaming">Asus TUF Gaming</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="vivobook" id="vivobook" value="ASUS VivoBook" onclick="updateProducts()"><label for="vivobook">Asus VivoBook</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <label for="rog">Asus ROG</label>
                    </div>
                    <div class="flex flex-col pl-4">
                        <div class="flex flex-row gap-2">
                            <input type="checkbox" name="rog_flow" id="rog_flow" value="ASUS ROG Flow" onclick="updateProducts()"><label for="rog_flow">ROG Flow</label>
                        </div>
                        <div class="flex flex-row gap-2">
                            <input type="checkbox" name="rog_strix" id="rog_strix" value="ASUS ROG Strix" onclick="updateProducts()"><label for="rog_strix">ROG Strix</label>
                        </div>
                        <div class="flex flex-row gap-2">
                            <input type="checkbox" name="rog_zephyrus" id="rog_zephyrus" value="ASUS ROG Zephyrus" onclick="updateProducts()"><label for="rog_zephyrus">ROG Zephyrus</label>
                        </div>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="zenbook" id="zenbook" value="ASUS ZenBook" onclick="updateProducts()"><label for="zenbook">Asus ZenBook</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="everyday_use" id="everyday_use" value="ASUS Everyday Use" onclick="updateProducts()"><label for="everyday_use">Asus Everyday Use</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="proart" id="proart" value="ASUS ProArt" onclick="updateProducts()"><label for="proart">Asus ProArt</label>
                    </div>
                <?php
                } elseif ($merek === 'acer') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="predator" id="predator" value="ACER Predator" onclick="updateProducts()"><label for="predator">Acer Predator</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="ChromeBook" id="ChromeBook" value="ACER ChromeBook" onclick="updateProducts()"><label for="ChromeBook">Acer ChromeBook</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="aspire" id="aspire" value="ACER Aspire" onclick="updateProducts()"><label for="aspire">Acer Aspire</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="swift" id="swift" value="ACER Swift" onclick="updateProducts()"><label for="swift">Acer Swift</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="spin" id="spin" value="ACER Spin" onclick="updateProducts()"><label for="spin">Acer Spin</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="nitro" id="nitro" value="ACER Nitro" onclick="updateProducts()"><label for="nitro">Acer Nitro</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="enduro" id="enduro" value="ACER Enduro" onclick="updateProducts()"><label for="enduro">Acer Enduro</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="travelmate" id="travelmate" value="ACER TravelMate" onclick="updateProducts()"><label for="travelmate">Acer Travelmate</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="extensa" id="extensa" value="ACER Extensa" onclick="updateProducts()"><label for="extensa">Acer Extensa</label>
                    </div>
                <?php
                } elseif ($merek === 'lenovo') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="thinkpad" id="thinkpad" value="LENOVO ThinkPad" onclick="updateProducts()"><label for="thinkpad">Lenovo Thinkpad</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="loq" id="loq" value="LENOVO LOQ" onclick="updateProducts()"><label for="loq">Lenovo LOQ</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="ideapad" id="ideapad" value="LENOVO IdeaPad" onclick="updateProducts()"><label for="ideapad">Lenovo Ideapad</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="legion" id="legion" value="LENOVO Legion" onclick="updateProducts()"><label for="legion">Lenovo Legion</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <label for="rog">Lenovo Yoga</label>
                    </div>
                    <div class="flex flex-col pl-4">
                        <div class="flex flex-row gap-2">
                            <input type="checkbox" name="yoga_pro" id="yoga_pro" value="LENOVO Yoga Pro" onclick="updateProducts()"><label for="yoga_pro">Lenovo Yoga Pro</label>
                        </div>
                        <div class="flex flex-row gap-2">
                            <input type="checkbox" name="yoga_slim" id="yoga_slim" value="LENOVO Yoga Slim" onclick="updateProducts()"><label for="yoga_slim">Lenovo Yoga Slim</label>
                        </div>
                        <div class="flex flex-row gap-2">
                            <input type="checkbox" name="yoga_2in1" id="yoga_2in1" value="LENOVO Yoga 2 in 1" onclick="updateProducts()"><label for="yoga_2in1">Lenovo Yoga 2 in 1</label>
                        </div>
                    </div>
                <?php
                } elseif ($merek === 'hp') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="envy" id="envy" value="HP Envy" onclick="updateProducts()"><label for="envy">HP Envy</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="elite" id="elite" value="HP Elite" onclick="updateProducts()"><label for="elite">HP Elite</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="essential" id="essential" value="HP Essential" onclick="updateProducts()"><label for="essential">HP Essential</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="hp-essentials" id="hp-essentials" value="HP Essentials" onclick="updateProducts()"><label for="hp-essentials">HP Essentials</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="omnibook-x" id="omnibook-x" value="HP OmniBook X" onclick="updateProducts()"><label for="omnibook-x">HP OmniBook X</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="omnibook-ultra" id="omnibook-ultra" value="HP OmniBook Ultra" onclick="updateProducts()"><label for="omnibook-ultra">HP OmniBook Ultra</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="pavilion" id="pavilion" value="HP Pavilion" onclick="updateProducts()"><label for="pavilion">HP Pavilion</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="pro" id="pro" value="HP ProBook" onclick="updateProducts()"><label for="pro">HP Pro</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="spectre" id="spectre" value="HP Spectre" onclick="updateProducts()"><label for="spectre">HP Spectre</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="victus" id="victus" value="HP Victus" onclick="updateProducts()"><label for="victus">HP Victus</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="z_by_hp" id="z_by_hp" value="HP ZBook" onclick="updateProducts()"><label for="z_by_hp">HP Z by HP</label>
                    </div>
                <?php
                } elseif ($merek === 'apple') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="air" id="air" value="APPLE MacBook Air" onclick="updateProducts()"><label for="air">MacBook Air</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="pro" id="pro" value="APPLE MacBook Pro" onclick="updateProducts()"><label for="pro">MacBook Pro</label>
                    </div>
                <?php
                } elseif ($merek === 'axioo') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="pongo" id="pongo" value="AXIOO Pongo" onclick="updateProducts()"><label for="pongo">Axioo Pongo</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="hype" id="hype" value="AXIOO Hype" onclick="updateProducts()"><label for="hype">Axioo Hype</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="saga" id="saga" value="AXIOO Saga" onclick="updateProducts()"><label for="saga">Axioo Saga</label>
                    </div>
                <?php
                } elseif ($merek === 'msi') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="cyborg" id="cyborg" value="MSI Cyborg-Thin" onclick="updateProducts()"><label for="cyborg">MSI Cyborg/Thin</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="bravo" id="bravo" value="MSI Alpha-Bravo" onclick="updateProducts()"><label for="bravo">MSI Bravo/Alpha</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="stealth" id="stealth" value="MSI Stealth" onclick="updateProducts()"><label for="stealth">MSI Stealth</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="raider" id="raider" value="MSI Raider" onclick="updateProducts()"><label for="raider">MSI Raider</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="vector" id="vector" value="MSI Vector" onclick="updateProducts()"><label for="vector">MSI Vector</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="crosshair" id="crosshair" value="MSI Crosshair-Pulse" onclick="updateProducts()"><label for="crosshair">MSI Crosshair/Pulse</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="sword" id="sword" value="MSI Sword-Katana" onclick="updateProducts()"><label for="sword">MSI Sword/Katana</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="titan" id="titan" value="MSI Titan" onclick="updateProducts()"><label for="titan">MSI Titan</label>
                    </div>
                <?php
                } elseif ($merek === 'dell') {
                ?>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="xps" id="xps" value="DELL XPS" onclick="updateProducts()"><label for="xps">Dell XPS</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="latitude" id="latitude" value="DELL Latitude" onclick="updateProducts()"><label for="latitude">Dell Latitude</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="inspiron" id="inspiron" value="DELL Inspiron" onclick="updateProducts()"><label for="inspiron">Dell Inspiron</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="gseries" id="gseries" value="DELL G Series" onclick="updateProducts()"><label for="gseries">Dell G Series</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="precision" id="precision" value="DELL Precision" onclick="updateProducts()"><label for="precision">Dell Precision</label>
                    </div>
                    <div class="flex flex-row gap-2">
                        <input type="checkbox" name="alienware" id="alienware" value="DELL Alienware" onclick="updateProducts()"><label for="alienware">Dell Alienware</label>
                    </div>
                <?php
                }
                ?>
              </div>
          </div>
            
          <div class="product-container flex flex-wrap w-full lg:w-3/4 gap-3 px-4 lg:px-0" id="product-list">
              <?php
              $query = "SELECT l.*, m.nama_merek FROM laptop l
                        JOIN merek m ON l.merek = m.nama_merek
                        WHERE m.nama_merek = '$merek';";
              $result = mysqli_query($koneksi, $query);
              while ($row = mysqli_fetch_assoc($result)) {
              ?>
                  <div class="brand-products group" data-seri="<?php echo $row['seri']; ?>">
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
      </div>
    </section>

    <!-- Main Js -->
    <script src="./src/js/script.js"></script>

    <!-- Swiper Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>

    <script>
    function updateProducts() {
    // Ambil semua checkbox yang dicentang
        const checkedBoxes = Array.from(document.querySelectorAll('input[type="checkbox"]:checked'));
        const selectedSeries = checkedBoxes.map(checkbox => checkbox.value);

        // Ambil semua produk
        const products = document.querySelectorAll('.brand-products');

        // Filter produk sesuai pilihan
        products.forEach(product => {
            const productSeries = product.getAttribute('data-seri');
            if (selectedSeries.length === 0 || selectedSeries.includes(productSeries)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    function toggleBrandSeries() {
        const brandContent = document.getElementById("brandContent");
        brandContent.classList.toggle("hidden");
    }
    </script>
</body>
</html>