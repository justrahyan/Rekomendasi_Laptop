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
$surveyData = isset($_SESSION['survey_data']) ? $_SESSION['survey_data'] : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nomor survei dari POST
    if (!isset($_POST['survey_number'])) {
        header('Location: ./survey-1.php');
        exit();
    }
    
    $surveyNumber = intval(cleanInput($_POST['survey_number']));

    // Simpan data survey berdasarkan nomor survei
    switch ($surveyNumber) {
        case 1:
            if (isset($_POST['budget'])) {
                $surveyData['budget'] = cleanInput($_POST['budget']);
            }
            break;
        case 2:
            if (isset($_POST['penggunaan'])) {
                $surveyData['penggunaan'] =
                cleanInput($_POST['penggunaan']);
            }
            break;
        case 3:
            if (isset($_POST['merek'])) {
                $surveyData['merek'] =
                cleanInput($_POST['merek']);
            }
            break;
        case 4:
            if (isset($_POST['layar'])) {
                $surveyData['layar'] =
                cleanInput($_POST['layar']);
            }
            break;
        case 5:
            if (isset($_POST['ram'])) {
                $surveyData['ram'] =
                cleanInput($_POST['ram']);
            }
            break;
        case 6:
            if (isset($_POST['penyimpanan'])) {
                $surveyData['penyimpanan'] =
                cleanInput($_POST['penyimpanan']);
            }
            break;
        case 7:
            if (isset($_POST['keluaran'])) {
                $surveyData['keluaran'] =
                cleanInput($_POST['keluaran']);
            }
            break;
    }

    $_SESSION['survey_data'] = $surveyData;

    // Jika sudah selesai dengan survey ke-7, proses data dan redirect ke hasil.
    if ($surveyNumber === 7) {
        // Konversi array ke format JSON untuk dikirim ke Python
        $jsonData = json_encode($surveyData);
    
        // Eksekusi Python script (sesuaikan path sesuai kebutuhan)
        $pythonScript = 'python3 expert_system.py ' . escapeshellarg($jsonData);
        $output = shell_exec($pythonScript);
    
        // Decode hasil dari Python jika ada
        $result = json_decode($output, true);
    
        // Simpan hasil ke session
        if ($result) {
            $_SESSION['expert_system_result'] = $result;
        } else {
            $_SESSION['expert_system_result'] = [];
        }
    
        // Redirect ke halaman hasil
        header('Location: survey-result.php');
        exit();
    } else {
        // Redirect ke halaman survei berikutnya
        header('Location: survey-'.($surveyNumber + 1).'.php');
        exit();
    }
} else {
    // Jika bukan POST request, redirect ke halaman survey pertama
    header('Location: survey-1.php');
    exit();
}