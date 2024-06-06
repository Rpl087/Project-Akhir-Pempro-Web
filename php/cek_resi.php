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
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelican Expedition - Cek Resi</title>
    <link rel="stylesheet" href="style.css"/>
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
                <li><a href="cek_resi.html">Cek Resi</a></li>
                <li><a href="contact.html">About Us</a></li>

            </ul>
        </nav>
    </header>
    
    <div id="introduce">
        <h1>Hasil Pencarian Resi</h1>
        <?php if (isset($shipment)) { ?>
            <div class="shipment-details">
                <p><strong>Nomor Resi:</strong> <?php echo $shipment['tracking_number']; ?></p>
                <p><strong>Status:</strong> <?php echo $shipment['status']; ?></p>
                <p><strong>Tanggal Pengiriman:</strong> <?php echo $shipment['shipment_date']; ?></p>
                <p><strong>Pengirim:</strong> <?php echo $shipment['sender']; ?></p>
                <p><strong>Penerima:</strong> <?php echo $shipment['receiver']; ?></p>
            </div>
        <?php } else if (isset($error)) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>
    </div>

    <script src="script.js"></script>
</body>
</html>
