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

// Fungsi untuk menampilkan detail laptop dalam format tabel
function displayLaptopComparison($laptops) {
    if (count($laptops) > 0): ?>
        <table class="min-w-full border border-gray-300 equal-width">
            <thead>
                <tr>
                <th class="border-b border-gray-300 font-semibold">Spesifikasi</th>
                    <?php foreach ($laptops as $index => $laptop): ?>
                        <th class="border-b border-gray-300">
                            <?php if (isset($laptop['nama_laptop'])): ?>
                                <!-- Nama Laptop -->
                                <div class="font-semibold text-lg"><?php echo $laptop['nama_laptop']; ?></div>
                                <div class="font-normal text-base"><?php echo $laptop['kode_laptop']; ?></div>
                                
                                <!-- Gambar Laptop -->
                                <?php if (isset($laptop['gambar'])): ?>
                                    <div class="mt-2">
                                        <img src="<?php echo '../src/img/laptop-img/' . $laptop['gambar']; ?>" alt="<?php echo $laptop['nama_laptop']; ?>" class="w-24 h-24 object-cover mx-auto">
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Daftar spesifikasi yang ingin ditampilkan
                $specifications = [
                    'Harga' => function($laptop) { return 'Rp. ' . number_format($laptop['harga'], 2, ',', '.'); },
                    'Prosesor' => 'prosessor',
                    'Kartu Grafis (GPU)' => 'GPU',
                    'Sistem Operasi' => 'OS',
                    'RAM' => 'ram',
                    'Penyimpanan' => 'penyimpanan',
                    'Kategori' => 'penggunaan',
                    'Layar' => 'display',
                    'I/O Port' => 'io_port',
                    'Kamera' => 'webcam',
                    'Baterai' => 'baterai',
                    'Berat' => 'berat',
                    'Tahun' => 'tahun'
                ];

                // Loop melalui spesifikasi dan tampilkan dalam tabel
                foreach ($specifications as $label => $field) {
                    echo '<tr class="' . ((array_search($label, array_keys($specifications)) % 2 == 0) ? 'bg-gray-100' : '') . '">';
                    echo '<td class="border-b border-gray-300 font-semibold">' . $label . '</td>';
                    
                    foreach ($laptops as $laptop) {
                        // Menangani kasus jika laptop tidak ada datanya
                        if ($laptop) {
                            echo '<td class="border-b border-gray-300">' . (is_callable($field) ? $field($laptop) : $laptop[$field]) . '</td>';
                        } else {
                            echo '<td class="border-b border-gray-300"><div class="flex items-start justify-center h-full"></div></td>';
                        }
                    }
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

    <?php else: ?>
        <div class="flex items-start justify-center h-full">
            <p class="text-gray-500 text-center"></p>
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

    <style>
        .equal-width th,
        .equal-width td {
            width: 200px;
            padding: .5rem .75rem;
        }
    </style>
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
            <div><h1 class="text-center font-bold text-xl">Bandingkan Laptop</h1></div>

        </div>        
    </nav>

    <!-- Tabel Perbandingan Laptop -->
    <section class="container mx-auto px-4 pt-40 lg:pt-28 lg:px-24 mb-10 lg:mb-20 overflow-x-auto">
        <?php displayLaptopComparison([$laptop1, $laptop2, $laptop3, $laptop4]); ?>
    </section>

</body>

</html>