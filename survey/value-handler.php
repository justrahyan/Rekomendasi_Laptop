<?php
session_start();

// Fungsi untuk membersihkan dan memvalidasi input
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Inisialisasi array untuk menyimpan semua nilai survey
$surveyData = array();

// Cek metode request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Survey 1 - Budget
    if(isset($_POST['budget'])) {
        $surveyData['budget'] = cleanInput($_POST['budget']);
    }
    
    // Survey 2 - Penggunaan
    if(isset($_POST['penggunaan'])) {
        $surveyData['penggunaan'] = cleanInput($_POST['penggunaan']);
    }
    
    // Survey 3 - Merek
    if(isset($_POST['merek'])) {
        $surveyData['merek'] = cleanInput($_POST['merek']);
    }
    
    // Survey 4 - Ukuran Layar
    if(isset($_POST['layar'])) {
        $surveyData['layar'] = cleanInput($_POST['layar']);
    }
    
    // Survey 5 - RAM
    if(isset($_POST['ram'])) {
        $surveyData['ram'] = cleanInput($_POST['ram']);
    }
    
    // Survey 6 - Penyimpanan
    if(isset($_POST['penyimpanan'])) {
        $surveyData['penyimpanan'] = cleanInput($_POST['penyimpanan']);
    }
    
    // Survey 7 - Tahun Keluaran
    if(isset($_POST['keluaran'])) {
        $surveyData['keluaran'] = cleanInput($_POST['keluaran']);
    }
    
    // Menyimpan data ke session untuk digunakan di halaman lain jika diperlukan
    $_SESSION['survey_data'] = $surveyData;
    
    // Konversi array ke format JSON untuk dikirim ke Python
    $jsonData = json_encode($surveyData);
    
    // Simpan JSON ke file temporary jika diperlukan
    $tempFile = 'survey_results.json';
    file_put_contents($tempFile, $jsonData);
    
    // Eksekusi Python script (sesuaikan path sesuai kebutuhan)
    $pythonScript = 'python3 expert_system.py ' . escapeshellarg($tempFile);
    $output = shell_exec($pythonScript);
    
    // Decode hasil dari Python jika ada
    $result = json_decode($output, true);
    
    // Simpan hasil ke session jika diperlukan
    if($result) {
        $_SESSION['expert_system_result'] = $result;
    }
    
    // Redirect ke halaman hasil atau tampilkan hasil
    header('Location: result.php');
    exit();
} else {
    // Jika bukan POST request, redirect ke halaman survey
    header('Location: survey-1.php');
    exit();
}
?>