<?php
include '<php>config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $nama_pengirim = $_POST['nama_pengirim'];
    $alamat_asal = $_POST['alamat_asal'];
    $nama_penerima = $_POST['nama_penerima'];
    $alamat_tujuan = $_POST['alamat_tujuan'];
    $layanan = $_POST['layanan'];

    // Buat SQL untuk menyimpan data ke dalam tabel shipments
    $sql = "INSERT INTO shipments (sender, sender_address, receiver, receiver_address, service) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama_pengirim, $alamat_asal, $nama_penerima, $alamat_tujuan, $layanan);

    // Jalankan query SQL
    if ($stmt->execute()) {
        // Data berhasil disimpan, lakukan tindakan lain jika diperlukan
        echo "Data pengiriman berhasil disimpan.";
    } else {
        // Jika terjadi kesalahan saat menyimpan data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup statement dan koneksi database
    $stmt->close();
    $conn->close();
}
?>
