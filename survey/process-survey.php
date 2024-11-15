<?php
// process-survey.php - New file to handle survey submission and expert system execution

session_start();
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store survey data in session
    $_SESSION['survey_data'] = $_POST;
    
    // Create JSON file for Python script
    $surveyData = [
        'budget' => $_POST['budget'] ?? 'N/A',
        'penggunaan' => $_POST['penggunaan'] ?? 'N/A',
        'merek' => $_POST['merek'] ?? 'N/A',
        'layar' => $_POST['layar'] ?? 'N/A',
        'ram' => $_POST['ram'] ?? 'N/A',
        'penyimpanan' => $_POST['penyimpanan'] ?? 'N/A',
        'keluaran' => $_POST['keluaran'] ?? 'N/A'
    ];
    
    // Save survey data to JSON file
    file_put_contents('survey_result.json', json_encode($surveyData));
    
    // Execute Python script and capture output
    $command = 'python3 expert_system.py';
    $output = shell_exec($command);
    
    // Decode JSON results from Python script
    $expertResults = json_decode($output, true);
    
    // Store results in session
    $_SESSION['expert_system_result'] = $expertResults;
    
    // Redirect to results page
    header('Location: survey-result.php');
    exit();
}