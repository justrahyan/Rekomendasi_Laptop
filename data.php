<?php 
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi List App</title>
</head>
<body>
    <h1>Data Rekomendasi Laptop</h1>
    <a href="data.php">List Laptop</a>
    <a href="add.php">Tambah Data Laptop</a>
    <table border="" cellpadding="15" style="margin-top: 20px;">
        <tr>
            <td>No</td>
            <td>Nama Laptop</td>
            <td>Tahun</td>
            <td>Kode Laptop</td>
            <td>Merek</td>
            <td>Seri</td>
            <td>Penggunaan</td>
            <td>Ram</td>
            <td>Penyimpanan</td>
            <td>GPU</td>
            <td>Prosesor</td>
            <td>Operating System</td>
            <td>Display</td>
            <td>I/O Port</td>
            <td>Baterai</td>
            <td>Berat</td>
            <td>Webcam</td>
            <td>Harga</td>
            <td>Gambar</td>
        </tr>
        <?php
        $query = "SELECT * FROM laptop;";
        $result = mysqli_query($koneksi, $query);
        // var_dump($result);
        $i = 1; 
        while($row = mysqli_fetch_assoc($result)){
            
        ?>
        <tr>
            <td><?php echo $i++ ?></td>
            <td><?php echo $row['nama_laptop']; ?></td>
            <td><?php echo $row['tahun']; ?></td>
            <td><?php echo $row['kode_laptop']; ?></td>
            <td><?php echo $row['merek']; ?></td>
            <td><?php echo $row['seri']; ?></td>
            <td><?php echo $row['penggunaan']; ?></td>
            <td><?php echo $row['ram']; ?></td>
            <td><?php echo $row['penyimpanan']; ?></td>
            <td><?php echo $row['GPU']; ?></td>
            <td><?php echo $row['prosessor']; ?></td>
            <td><?php echo $row['os']; ?></td>
            <td><?php echo $row['display']; ?></td>
            <td><?php echo $row['io_port']; ?></td>
            <td><?php echo $row['baterai']; ?></td>
            <td><?php echo $row['berat']; ?></td>
            <td><?php echo $row['webcam']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><img src="./src/img/laptop-img/<?php echo $row['gambar']; ?>" alt=""></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>