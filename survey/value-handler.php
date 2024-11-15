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

    // After saving survey data in the session
    $_SESSION['survey_data'] = $surveyData;

    // Save survey data to JSON file
    file_put_contents('survey_result.json', json_encode($surveyData));

    // If already completed with survey number 7, process data and redirect to results
    if ($surveyNumber === 7) {
        // Execute Python script (adjust path as needed)
        $pythonScript = 'python expert_system.py';  // Pastikan pathnya benar sesuai direktori project
        exec($pythonScript, $output);  // Menjalankan skrip Python dan mendapatkan output

        // Menyimpan output dari skrip Python ke dalam session
        $result = json_decode($output[0], true);
        $_SESSION['expert_system_result'] = $result;

        // Redirect ke halaman hasil
        header('Location: ./survey-result.php');
        exit();
    } else {
        // Redirect to next survey page
        header('Location: survey-'.($surveyNumber + 1).'.php');
        exit();
    }
} else {
    // Jika bukan POST request, redirect ke halaman survey pertama
    header('Location: survey-1.php');
    exit();
}