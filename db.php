<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "manajemen_kafe";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>