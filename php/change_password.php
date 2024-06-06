<?php

session_start();

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check current password
    $sql = "SELECT password FROM users WHERE id='".$_SESSION['user']['id']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (password_verify($current_password, $row['password'])) {
        if ($new_password === $confirm_password) {
            $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$new_password_hashed' WHERE id='".$_SESSION['user']['id']."'";
            if ($conn->query($sql) === TRUE) {
                echo "Kata sandi berhasil diubah.";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Kata sandi baru tidak cocok.";
        }
    } else {
        echo "Kata sandi saat ini salah.";
    }
}
?>
<div class="my-account">
    <h2>Ubah Kata Sandi</h2>
    <form method="post">
        <div class="account-section">
            <label for="current_password">Kata Sandi Saat Ini:</label>
            <input type="password" id="current_password" name="current_password" required>
        </div>
        <div class="account-section">
            <label for="new_password">Kata Sandi Baru:</label>
            <input type="password" id="new_password" name="new_password" required>
        </div>
        <div class="account-section">
            <label for="confirm_password">Konfirmasi Kata Sandi Baru:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="account-section">
            <button type="submit" class="btn">Ubah Kata Sandi</button>
        </div>
    </form>
</div>
