<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tracking_number = $_POST['tracking_number'];

    $sql = "SELECT * FROM shipments WHERE tracking_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tracking_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $shipment = $result->fetch_assoc();
    } else {
        $error = "Nomor resi tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelican Expedition - Cek Resi</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
    <header class="main-menu">
        <div class="container">
            <img src="img/logo.png" alt="Pelican Expedition Logo" class="logo">
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
    
    <div id="introduce">
        <h1>Hasil Pencarian Resi</h1>
        <form method="post" action="cek_resi.php">
            <input type="text" name="tracking_number" placeholder="Masukkan Nomor Resi" required>
            <button type="submit">Cek Resi</button>
        </form>
        <?php if (isset($shipment)) { ?>
            <div class="shipment-details">
                <p><strong>Nomor Resi:</strong> <?php echo htmlspecialchars($shipment['tracking_number']); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($shipment['status']); ?></p>
                <p><strong>Tanggal Pengiriman:</strong> <?php echo htmlspecialchars($shipment['shipment_date']); ?></p>
                <p><strong>Pengirim:</strong> <?php echo htmlspecialchars($shipment['sender']); ?></p>
                <p><strong>Penerima:</strong> <?php echo htmlspecialchars($shipment['receiver']); ?></p>
            </div>
        <?php } else if (isset($error)) { ?>
            <p><?php echo htmlspecialchars($error); ?></p>
        <?php } ?>
    </div>

    <footer class="footer">
        <p>&copy; 2024 Pelican Expedition. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
