<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pengunjung = $_POST["nama_pengunjung"];
    $tanggal_kunjungan = $_POST["tanggal_kunjungan"];
    $nomor_meja = $_POST["nomor_meja"];
    $menu_favorit = $_POST["menu_favorit"];

    $sql = "INSERT INTO pengunjung (nama_pengunjung, tanggal_kunjungan, nomor_meja, menu_favorit)
            VALUES ('$nama_pengunjung', '$tanggal_kunjungan', '$nomor_meja', '$menu_favorit')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>