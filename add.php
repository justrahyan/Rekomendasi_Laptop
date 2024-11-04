<?php 
include "koneksi.php";

// Tangani permintaan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_laptop = mysqli_real_escape_string($koneksi, $_POST['nama_laptop']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
    $merek = mysqli_real_escape_string($koneksi, $_POST['merek']);
    $seri = mysqli_real_escape_string($koneksi, $_POST['seri']);
    $penggunaan = mysqli_real_escape_string($koneksi, $_POST['penggunaan']);
    $kode_laptop = mysqli_real_escape_string($koneksi, $_POST['kode_laptop']);
    $ram = mysqli_real_escape_string($koneksi, $_POST['ram']);
    $penyimpanan = mysqli_real_escape_string($koneksi, $_POST['penyimpanan']);
    $GPU = mysqli_real_escape_string($koneksi, $_POST['GPU']);
    $prosessor = mysqli_real_escape_string($koneksi, $_POST['prosessor']);
    $os = mysqli_real_escape_string($koneksi, $_POST['os']);
    $display = mysqli_real_escape_string($koneksi, $_POST['display']);
    $io_port = mysqli_real_escape_string($koneksi, $_POST['io_port']);
    $baterai = mysqli_real_escape_string($koneksi, $_POST['baterai']);
    $berat = mysqli_real_escape_string($koneksi, $_POST['berat']);
    $webcam = mysqli_real_escape_string($koneksi, $_POST['webcam']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $gambar = mysqli_real_escape_string($koneksi, $_POST['gambar']);

    $query = "INSERT INTO laptop (nama_laptop, tahun, merek, seri, penggunaan, kode_laptop, ram, penyimpanan, GPU, prosessor, os, display, io_port, baterai, berat, webcam, harga, gambar) VALUES 
    ('$nama_laptop', '$tahun', '$merek', '$seri', '$penggunaan', '$kode_laptop', '$ram', '$penyimpanan', '$GPU', '$prosessor', '$os', '$display', '$io_port', '$baterai', '$berat', '$webcam', '$harga', '$gambar')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: data.php");
        exit; // Hentikan eksekusi setelah redirect
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List App</title>
</head>
<body>
    <h1>Task Application / Tambah Laptop</h1>
    <a href="data.php">List Laptop</a>
    <a href="add.php">Tambah Data Laptop</a>
    <form action="add.php" method="POST">
        <table cellpadding="10" style="background-color: skyblue; margin-top: 15px;">
            <tr>
                <td>Nama Laptop</td>
                <td>:</td>
                <td><input type="text" name="nama_laptop" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><input type="text" name="tahun" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Kode Laptop</td>
                <td>:</td>
                <td><input type="text" name="kode_laptop" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Merek</td>
                <td>:</td>
                <td><select name="merek" id="" style="width: 100%;">
                        <option value="asus">Asus</option>
                        <option value="acer">Acer</option>
                        <option value="apple">Apple</option>
                        <option value="axioo">Axioo</option>
                        <option value="lenovo">Lenovo</option>
                        <option value="hp">HP</option>
                        <option value="dell">DELL</option>
                        <option value="msi">MSI</option>
                    </select></td>
            </tr>
            <tr>
                <td>Seri</td>
                <td>:</td>
                <td><input type="text" name="seri" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Penggunaan</td>
                <td>:</td>
                <td><select name="penggunaan" id="" style="width: 100%;">
                        <option value="gaming">Gaming</option>
                        <option value="productivity">Productivity</option>
                        <option value="daily-use">Daily Use</option>
                    </select></td>
            </tr>
            <tr>
                <td>RAM</td>
                <td>:</td>
                <td><input type="text" name="ram" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Penyimpanan</td>
                <td>:</td>
                <td><input type="text" name="penyimpanan" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>GPU</td>
                <td>:</td>
                <td><input type="text" name="GPU" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Prosesor</td>
                <td>:</td>
                <td><input type="text" name="prosessor" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Operating System</td>
                <td>:</td>
                <td><input type="text" name="os" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Display</td>
                <td>:</td>
                <td><input type="text" name="display" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>I/O Port</td>
                <td>:</td>
                <td><input type="text" name="io_port" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Baterai</td>
                <td>:</td>
                <td><input type="text" name="baterai" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Berat</td>
                <td>:</td>
                <td><input type="text" name="berat" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Webcam</td>
                <td>:</td>
                <td><input type="text" name="webcam" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" id="" style="width: 100%;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <center>
                        <input type="submit" value="Submit" style="width: 100%; padding:5px 10px;">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>