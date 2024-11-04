<?php
    $koneksi = mysqli_connect("localhost","root","","rekomendasi_laptop");
    // var_dump($koneksi);
    if (!$koneksi){
        die(mysqli_connect_error());
    } else {
        // echo "Koneksi berhasil";
    }
?>