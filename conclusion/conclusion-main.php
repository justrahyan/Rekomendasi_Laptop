<?php
include "../koneksi.php";

// Ambil ID laptop dari URL
$currentLaptopId = $_GET['currentLaptopId'] ?? null;

// Query untuk mendapatkan data laptop saat ini
$currentLaptop = null;
if ($currentLaptopId) {
    // Contoh query untuk mendapatkan data laptop berdasarkan ID
    $query = "SELECT * FROM laptop WHERE id_laptop = $currentLaptopId";
    $result = mysqli_query($koneksi, $query);
    $currentLaptop = mysqli_fetch_assoc($result);
}

// Query untuk mendapatkan daftar laptop lainnya untuk opsi perbandingan
$allLaptopsQuery = "SELECT * FROM laptop WHERE id_laptop != $currentLaptopId";

// Buat array untuk menyimpan semua data laptop
$laptopOptions = [];
$result = mysqli_query($koneksi, $allLaptopsQuery);
while ($row = mysqli_fetch_assoc($result)) {
    $laptopOptions[] = $row;
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
    <section class="container mx-auto px-4 pt-40 lg:pt-28 lg:px-36 flex flex-col lg:flex-row gap-8">
        <!-- Kolom Laptop Saat Ini -->
        <form action="conclusion-compare.php" method="POST">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Kolom Laptop Saat Ini -->
                <div class="w-full lg:w-1/4 p-5 border border-gray-300 rounded-lg">
                    <p class="font-bold text-xl mb-2"><?php echo $currentLaptop['nama_laptop']; ?></p>
                    <p class="font-normal text-sm mb-2"><?php echo $currentLaptop['kode_laptop']; ?></p>
                    <p class="font-semibold"><?php echo 'Rp. ' . number_format($currentLaptop['harga'], 2, ',', '.'); ?></p>
                    <?php if ($currentLaptop): ?>
                        <img src="<?php echo '../src/img/laptop-img/' . $currentLaptop['gambar']; ?>" class="mx-auto">
                    <?php else: ?>
                        <p>Laptop tidak ditemukan.</p>
                    <?php endif; ?>
                </div>

                <!-- Kolom Pilihan Laptop 1 -->
                <div class="w-full lg:w-1/4 p-5 border border-gray-300 rounded-lg">
                    <h2 class="text-xl font-bold mb-4">Laptop Pembanding 1</h2>
                    <label for="laptop2" class="block text-lg font-semibold mb-2">Pilih Laptop:</label>
                    <select name="laptop2" id="laptop2" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">-- Pilih Laptop --</option>
                        <?php foreach ($laptopOptions as $row): ?>
                            <option value="<?php echo $row['id_laptop']; ?>">
                                <?php echo $row['nama_laptop']; ?> - <?php echo 'Rp. ' . number_format($row['harga'], 2, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Kolom Pilihan Laptop 2 -->
                <div class="w-full lg:w-1/4 p-5 border border-gray-300 rounded-lg">
                    <h2 class="text-xl font-bold mb-4">Laptop Pembanding 2</h2>
                    <label for="laptop3" class="block text-lg font-semibold mb-2">Pilih Laptop:</label>
                    <select name="laptop3" id="laptop3" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">-- Pilih Laptop --</option>
                        <?php foreach ($laptopOptions as $row): ?>
                            <option value="<?php echo $row['id_laptop']; ?>">
                                <?php echo $row['nama_laptop']; ?> - <?php echo 'Rp. ' . number_format($row['harga'], 2, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Kolom Pilihan Laptop 3 -->
                <div class="w-full lg:w-1/4 p-5 border border-gray-300 rounded-lg">
                    <h2 class="text-xl font-bold mb-4">Laptop Pembanding 3</h2>
                    <label for="laptop4" class="block text-lg font-semibold mb-2">Pilih Laptop:</label>
                    <select name="laptop4" id="laptop4" class="w-full p-2 border border-gray-300 rounded-lg">
                        <option value="">-- Pilih Laptop --</option>
                        <?php foreach ($laptopOptions as $row): ?>
                            <option value="<?php echo $row['id_laptop']; ?>">
                                <?php echo $row['nama_laptop']; ?> - <?php echo 'Rp. ' . number_format($row['harga'], 2, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Hidden input for current laptop -->
            <input type="hidden" name="laptop1" value="<?php echo $currentLaptopId; ?>">
            
            <!-- Single comparison button -->
            <div class="mt-8 flex justify-center mb-10 lg:mb-0">
                <button type="submit" class="py-3 px-8 bg-darkblue text-white rounded-lg text-lg font-semibold hover:bg-opacity-90 transition-all">
                    Mulai Perbandingan
                </button>
            </div>
        </form>
    </section>
</body>
</html>
