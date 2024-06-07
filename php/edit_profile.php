<?php
session_start();
include 'config.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

// Ambil data pengguna dari sesi
$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_id = $_SESSION['user_id'];

    // Update user data in the database using prepared statement
    $sql = "UPDATE users SET name = ?, email = ?, phone = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssi", $name, $email, $phone, $user_id);

        if ($stmt->execute()) {
            $_SESSION['user']['name'] = $name;
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['phone'] = $phone;
            header('Location: my_account.php');
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="main-menu">
        <div class="container">
            <img src="logo.png" alt="Pelican Expedition Logo" class="logo">   
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="delivery.html">Delivery</a></li>
                <li><a href="cek_resi.php">Cek Resi</a></li>
                <li><a href="contact.html">About Us</a></li>
                <li><a href="my_account.php">My Account</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="my-account">
        <h2>Edit Profil</h2>
        <form method="post">
            <div class="account-section">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>
            <div class="account-section">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="account-section">
                <label for="phone">Nomor Telepon:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
            </div>
            <div class="account-section">
                <button type="submit" class="btn">Simpan Perubahan</button>
            </div>
        </form>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Pelican Expedition. All rights reserved.</p>
    </footer>

</body>
</html>
