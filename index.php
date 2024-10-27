<?php
include 'db.php';

// Ambil parameter pencarian dari form
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mengambil data dari database dengan fitur pencarian
if ($search != '') {
    $sql = "SELECT * FROM pengunjung WHERE nama_pengunjung LIKE '%$search%' OR tanggal_kunjungan LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM pengunjung";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengunjung Kafe</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style\style.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <h1>Daftar Pengunjung Kafe</h1>

    <h2>Tambah Pengunjung</h2>
    <form name="pengunjungForm" action="create.php" method="POST" onsubmit="return validateForm();">
        <label for="nama">Nama Lengkap Pengunjung:</label>
        <input type="text" id="nama" name="nama_pengunjung" required>

        <label for="tanggal">Tanggal Kunjungan:</label>
        <input type="date" id="tanggal" name="tanggal_kunjungan" required>

        <label for="meja">Nomor Meja:</label>
        <input type="number" id="meja" name="nomor_meja" required>

        <label for="menu">Menu Favorit:</label>
        <input type="text" id="menu" name="menu_favorit" required>

        <button type="submit">Tambah</button>
    </form>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Hapus Data Pengunjung?</p>
            <button id="confirmDeleteButton">Hapus</button>
            <button id="cancelButton">Batal</button>
        </div>
    </div>

    <!-- Form pencarian pengunjung -->
    <form method="GET" action="index.php">
        <input type="text" id="search" name="search" placeholder="Nama atau Tanggal (YYYY-MM-DD)">
        <button type="submit">Cari</button>
        <button type="button" onclick="clearSearch()">Reset Pencarian</button> <!-- Tombol Reset Pencarian -->
    </form>

    <table>
        <tr>
            <th>Nama Pengunjung</th>
            <th>Tanggal Kunjungan</th>
            <th>Nomor Meja</th>
            <th>Menu Favorit</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nama_pengunjung"] . "</td>
                        <td>" . $row["tanggal_kunjungan"] . "</td>
                        <td>" . $row["nomor_meja"] . "</td>
                        <td>" . $row["menu_favorit"] . "</td>
                        <td>
                            <a href='update.php?id=" . $row["id"] . "' class='edit'><i class='fas fa-edit'></i> Edit</a>
                            <a href='#' onclick='confirmDelete(" . $row["id"] . ")' class='delete'><i class='fas fa-trash'></i> Hapus</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data pengunjung</td></tr>";
        }
        ?>
    </table>

    <script src="js\script.js"></script>
</body>
</html>