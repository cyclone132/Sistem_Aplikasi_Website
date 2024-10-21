<?php
include 'db.php';

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_pengunjung = $_POST["nama_pengunjung"];
    $tanggal_kunjungan = $_POST["tanggal_kunjungan"];
    $nomor_meja = $_POST["nomor_meja"];
    $menu_favorit = $_POST["menu_favorit"];

    $sql = "UPDATE pengunjung 
            SET nama_pengunjung='$nama_pengunjung', tanggal_kunjungan='$tanggal_kunjungan', nomor_meja='$nomor_meja', menu_favorit='$menu_favorit'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $sql = "SELECT * FROM pengunjung WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengunjung</title>
</head>
<body>
    <h1>Edit Pengunjung</h1>

    <form action="" method="POST">
        <label for="nama">Nama Pengunjung:</label>
        <input type="text" id="nama" name="nama_pengunjung" value="<?php echo $row['nama_pengunjung']; ?>" required><br>

        <label for="tanggal">Tanggal Kunjungan:</label>
        <input type="date" id="tanggal" name="tanggal_kunjungan" value="<?php echo $row['tanggal_kunjungan']; ?>" required><br>

        <label for="meja">Nomor Meja:</label>
        <input type="number" id="meja" name="nomor_meja" value="<?php echo $row['nomor_meja']; ?>" required><br>

        <label for="menu">Menu Favorit:</label>
        <input type="text" id="menu" name="menu_favorit" value="<?php echo $row['menu_favorit']; ?>" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>