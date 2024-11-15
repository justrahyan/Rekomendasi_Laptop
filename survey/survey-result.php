<?php 
include "../koneksi.php"; 
session_start();

function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

// Ambil data hasil survei dari session
$surveyData = isset($_SESSION['survey_data']) ? $_SESSION['survey_data'] : [];
if (file_exists('expert-system-results.json')) {
    $result_data = file_get_contents('expert-system-results.json');
    $expert_system_result = json_decode($result_data, true);
} else {
    $expert_system_result = [];
}

// Menyusun data input pengguna untuk ditampilkan kembali jika perlu
$budget = isset($surveyData['budget']) ? htmlspecialchars($surveyData['budget']) : 'N/A';
if($budget == "dibawah_5jt"){
    $budget = "Di bawah Rp. 5.000.000";
}elseif($budget == "5jt_sampai_10jt"){
    $budget = "Rp. 5.000.000 - Rp. 10.000.000";
} elseif($budget == "10jt_sampai_15jt"){
    $budget = "Rp. 10.000.000 - Rp. 15.000.000";
} elseif($budget == "15jt_20jt"){
    $budget = "Rp. 15.000.000 - Rp. 20.000.000";
} elseif($budget == "diatas_20jt") {
    $budget = "Di atas Rp. 20.000.000";
} else {
    $budget = "N/A";
}

$penggunaan = isset($surveyData['penggunaan']) ? htmlspecialchars($surveyData['penggunaan']) : 'N/A';
if($penggunaan == "gaming"){
    $penggunaan = "Gaming/Streaming";
} elseif($penggunaan == "productivity"){
    $penggunaan = "Productivity/Keperluan Kerja";
} elseif($penggunaan == "daily-use"){
    $penggunaan = "Daily Use (Sekolah/Kuliah)";
} else {
    $budget = "N/A";
}

$merek = isset($surveyData['merek']) ? htmlspecialchars($surveyData['merek']) : 'N/A';
if($merek == "asus"){
    $merek = "Asus";
} elseif($merek == "acer"){
    $merek = "Acer";
} elseif($merek == "apple"){
    $merek = "Apple";
} elseif($merek == "hp"){
    $merek = "HP";
} elseif($merek == "lenovo"){
    $merek = "Lenovo";
} elseif($merek == "msi"){
    $merek = "MSI";
} elseif($merek == "axioo"){
    $merek = "Axioo";
} elseif($merek == "dell"){
    $merek = "Dell";
} elseif($merek == "tidak-ada"){
    $merek = "Tidak Ada Preferensi";
} else {
    $budget = "N/A";
}

$layar = isset($surveyData['layar']) ? htmlspecialchars($surveyData['layar']) : 'N/A';
if($layar == "dibawah_13"){
    $layar = "Di bawah 13 inci";
} elseif($layar == "13_sampai_14"){
    $layar = "13 - 14 inci";
} elseif($layar == "15_sampai_16"){
    $layar = "15 - 16 inci";
} elseif($layar == "diatas_16"){
    $layar = "Di atas 16 inci";
} else {
    $budget = "N/A";
}

$ram = isset($surveyData['ram']) ? htmlspecialchars($surveyData['ram']) : 'N/A';
if($ram == "4gb"){
    $ram = "4GB";
} elseif($ram == "8gb"){
    $ram = "8GB";
} elseif($ram == "16gb"){
    $ram = "16GB";
} elseif($ram == "32gb_lebih"){
    $ram = "32GB atau Lebih";
} else {
    $budget = "N/A";
}

$penyimpanan = isset($surveyData['penyimpanan']) ? htmlspecialchars($surveyData['penyimpanan']) : 'N/A';
if($penyimpanan == "ssd"){
    $penyimpanan = "SSD (lebih cepat)";
} elseif($penyimpanan == "hdd"){
    $penyimpanan = "HDD (lebih murah)";
} elseif($penyimpanan == "kombinasi"){
    $penyimpanan = "Kombinasi SSD + HDD";
} else {
    $budget = "N/A";
}

$keluaran = isset($surveyData['keluaran']) ? htmlspecialchars($surveyData['keluaran']) : 'N/A';
if($keluaran == "terbaru"){
    $keluaran = "Laptop terbaru (tahun ini)";
} elseif($keluaran == "1_2_tahun"){
    $keluaran = "Keluaran 1 - 2 tahun terakhir";
} elseif($keluaran == "bebas"){
    $keluaran = "Tidak masalah asalkan performanya bagus";
} else {
    $budget = "N/A";
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
<nav class="fixed top-0 left-0 right-0 z-50 bg-white border border-b-slate-300 w-full">
    <div class="container px-8 py-5 mx-auto flex flex-row justify-between items-center gap-5 lg:px-36">
        <a href="../index.php" class="py-2 px-0 lg:px-8 flex items-center gap-2 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8l-4 4m0 0l4 4m-4-4h20"/>
            </svg>
            <span>Kembali</span>
        </a>
        <h1 class="text-center font-bold text-xl">Survei Preferensi</h1>
    </div>
</nav>

<!-- Guide Section -->
<section id="product">
    <div class="container mx-auto pt-28 lg:pt-28 pb-10 flex flex-col justify-between lg:px-36">
        <div class="product-heading mb-4 pb-4 border-b-paragraph border-b">
            <h1 class="font-bold text-xl text-center">Hasil Survei Rekomendasi</h1>
        </div>

        <!-- Menampilkan Input Pengguna -->
        <div class="input-container flex flex-col gap-3 lg:gap-0 lg:flex-row">
            <div class="input-user bg-white overflow-hidden flex flex-col w-full lg:w-1/4 gap-2 py-3 px-4 lg:py-0 sticky lg:top-[6rem] z-30" style="align-self: flex-start;" id="inputValues">
                <h1 class="font-semibold text-lg">Pilihan Anda</h1>
                <p>Budget: <?php echo $budget; ?></p>
                <p>Penggunaan: <?php echo $penggunaan; ?></p>
                <p>Merek: <?php echo $merek; ?></p>
                <p>Ukuran Layar: <?php echo $layar; ?></p>
                <p>RAM: <?php echo $ram; ?></p>
                <p>Penyimpanan: <?php echo $penyimpanan; ?></p>
                <p>Tahun Keluaran: <?php echo $keluaran; ?></p>
            </div>

            <!-- Menampilkan Hasil Rekomendasi Laptop -->
            <div class="product-container flex flex-wrap w-full lg:w-3/4 gap-3 px-4 lg:px-0">
                <?php if (!empty($expert_system_result)): ?>
                    <?php foreach ($expert_system_result as $laptop): ?>
                        <div class="brand-products group">
                            <a href="../laptop.php?id=<?php echo $laptop['id_laptop'] ?>">
                                <img src="<?php echo '../src/img/laptop-img/' . $laptop['gambar']; ?>" alt="" class="w-[70%] lg:w-full mx-auto object-cover bg-white p-2 transform transition duration-300 group-hover:scale-110">
                                <div class="content py-2 px-3 flex flex-col flex-grow">
                                    <div class="penggunaan text-xs mb-2 text-slate-400 capitalize"><?php echo $laptop['penggunaan']; ?></div>
                                    <div class="nama text-sm font-semibold mb-2 hover:underline capitalize"><?php echo $laptop['nama_laptop']; ?></div>
                                    <div class="nama text-xs font-normal mb-2 uppercase"><?php echo $laptop['kode_laptop']; ?></div>
                                    <div class="spesifikasi text-xs text-slate-400 truncate"><?php echo $laptop['prosessor']; ?></div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Tidak ada laptop yang ditemukan berdasarkan kriteria Anda.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Main Js -->
<script src="../src/js/script.js"></script>

<?php 
// Hapus session setelah ditampilkan untuk mencegah tampilan ulang pada refresh halaman.
unset($_SESSION['expert_system_result']); 
unset($_SESSION['survey_data']); 
?>

</body>
</html>