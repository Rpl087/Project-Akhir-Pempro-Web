<?php
session_start();
include 'includes/header.php';

// Dummy user data for demonstration purposes
$_SESSION['user'] = [
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '081234567890',
];
?>
<div class="my-account">
    <h2>Akun Saya</h2>
    <div class="account-section">
        <h3>Profil Pengguna</h3>
        <p>Nama: <?php echo $_SESSION['user']['name']; ?></p>
        <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
        <p>Nomor Telepon: <?php echo $_SESSION['user']['phone']; ?></p>
        <a href="/profile/edit_profile.php" class="btn">Edit Profil</a>
    </div>
    <div class="account-section">
        <h3>Riwayat Pengiriman</h3>
        <p>No. Resi: 1234567890 - Status: Terkirim</p>
        <p>No. Resi: 0987654321 - Status: Dalam Pengiriman</p>
        <a href="/profile/view_shipments.php" class="btn">Lihat Semua</a>
    </div>
    <div class="account-section">
        <h3>Pengaturan</h3>
        <p><a href="/profile/change_password.php" class="btn">Ubah Kata Sandi</a></p>
        <p><a href="/logout.php" class="btn">Keluar</a></p>
    </div>
</div>
<?php
include 'includes/footer.php';
?>
