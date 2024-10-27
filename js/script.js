function closeModal() {
    var modal = document.getElementById("deleteModal");

    // Hapus kelas fade-in dan tambahkan fade-out
    modal.classList.remove("fade-in");
    modal.classList.add("fade-out");

    // Setelah animasi fade-out selesai, sembunyikan modal
    setTimeout(function() {
        modal.classList.remove("show");
    }, 300); // Waktu sesuai durasi animasi fade-out
}

// Tutup modal jika pengguna mengklik di luar modal
window.onclick = function(event) {
    var modal = document.getElementById("deleteModal");
    if (event.target == modal) {
        closeModal();
    }
}

    function confirmDelete(id) {
    var modal = document.getElementById("deleteModal");
    var confirmButton = document.getElementById("confirmDeleteButton");

    // Tampilkan modal dengan fade-in
    modal.classList.add("fade-in", "show");
    modal.classList.remove("fade-out");

    confirmButton.onclick = function() {
        window.location.href = 'delete.php?id=' + id;
    };

    // Tambahkan event untuk tombol Batal dan X
    document.getElementById("cancelButton").onclick = function() {
        closeModal();
    };

    document.getElementsByClassName("close")[0].onclick = function() {
        closeModal();
    };
}

// Fungsi untuk membersihkan pencarian
function clearSearch() {
    document.getElementById("search").value = ''; // Hapus nilai di kolom pencarian
    window.location.href = 'index.php'; // Refresh ke halaman index tanpa parameter pencarian
}

    function validateForm() {
        var nama = document.forms["pengunjungForm"]["nama_pengunjung"].value;
        var tanggal = document.forms["pengunjungForm"]["tanggal_kunjungan"].value;
        var meja = document.forms["pengunjungForm"]["nomor_meja"].value;
        var menu = document.forms["pengunjungForm"]["menu_favorit"].value;
        
        if (nama == "" || tanggal == "" || meja == "" || menu == "") {
            alert("Semua kolom harus diisi.");
            return false;
        }

        if (meja <= 0) {
            alert("Nomor meja harus lebih dari 0.");
            return false;
        }

        return true;
    }