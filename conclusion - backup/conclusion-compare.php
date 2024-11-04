<?php
include "../koneksi.php";

// Ambil ID laptop dari POST
$laptop1Id = $_POST['laptop1'] ?? null;
$laptop2Id = $_POST['laptop2'] ?? null;
$laptop3Id = $_POST['laptop3'] ?? null;
$laptop4Id = $_POST['laptop4'] ?? null;

// Fungsi untuk mendapatkan data laptop
function getLaptopData($koneksi, $id) {
    if (!empty($id)) {
        $query = "SELECT * FROM laptop WHERE id_laptop = $id";
        $result = mysqli_query($koneksi, $query);
        return mysqli_fetch_assoc($result);
    }
    return null;
}

// Ambil data untuk setiap laptop yang dipilih
$laptop1 = getLaptopData($koneksi, $laptop1Id);
$laptop2 = getLaptopData($koneksi, $laptop2Id);
$laptop3 = getLaptopData($koneksi, $laptop3Id);
$laptop4 = getLaptopData($koneksi, $laptop4Id);

// Fungsi untuk menampilkan detail laptop
function displayLaptopDetails($laptop) {
    if ($laptop): ?>
        <h2 class="text-xl font-bold mb-4"><?php echo $laptop['nama_laptop']; ?></h2>
        <p class="text-lg font-semibold"><?php echo 'Rp. ' . number_format($laptop['harga'], 2, ',', '.'); ?></p>
        <div class="image-1">
            <img src="<?php echo '../src/img/laptop-img/' . $laptop['gambar']; ?>" alt="Gambar Laptop" class="mb-4 mx-auto w-full">
        </div>
        <div class="flex flex-col gap-4">
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Penggunaan</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['penggunaan']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">RAM</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['ram']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Penyimpanan</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['penyimpanan']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Kartu Grafis (GPU)</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['GPU']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Prosesor</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['prosessor']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Sistem Operasi</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['os']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Layar</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['display']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">I/O Port</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['io_port']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Baterai</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['baterai']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Berat</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['berat']; ?></div>
            </div>
            <div class="merk flex flex-row items-start justify-between">
                <p class="text-sm lg:text-lg font-semibold w-1/3">Kamera</p>
                <div class="text-xs lg:text-base w-2/3 mb-2 capitalize"><?php echo $laptop['webcam']; ?></div>
            </div>
        </div>
    <?php else: ?>
        <div class="flex items-center justify-center h-full">
            <p class="text-gray-500 text-center">Tidak ada laptop yang dipilih untuk dibandingkan</p>
        </div>
    <?php endif;
}
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
        <div class="container px-8 py-5 flex flex-col mx-auto lg:flex-row justify-between items-center gap-5 lg:px-36 w-full">
            <!-- Back -->
            <a href="javascript:history.back()" class="py-2 px-0 lg:px-8 flex items-center gap-2 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8l-4 4m0 0l4 4m-4-4h20"/>
                </svg>
                <span>Kembali</span>
            </a>

            <!-- Heading -->
            <div>
                <h1 class="text-center font-bold text-xl">Bandingkan Laptop</h1>
            </div>
        </div>
    </nav>
    <section class="container mx-auto px-4 pt-40 lg:pt-28 lg:px-36 grid lg:grid-cols-2 mb-10 lg:mb-20 gap-8">
        <!-- Kolom Laptop 1 (Utama) -->
        <div class="w-full p-5 border border-gray-300 rounded-lg min-h-[200px]">
            <?php displayLaptopDetails($laptop1); ?>
        </div>

        <!-- Kolom Laptop 2 -->
        <div class="w-full p-5 border border-gray-300 rounded-lg min-h-[200px]">
            <?php displayLaptopDetails($laptop2); ?>
        </div>

        <!-- Kolom Laptop 3 -->
        <div class="w-full p-5 border border-gray-300 rounded-lg min-h-[200px]">
            <?php displayLaptopDetails($laptop3); ?>
        </div>

        <!-- Kolom Laptop 4 -->
        <div class="w-full p-5 border border-gray-300 rounded-lg min-h-[200px]">
            <?php displayLaptopDetails($laptop4); ?>
        </div>
    </section>
</body>
</html>
