<?php
session_start();

include 'config.php';

// Fetch shipment data from the database
$sql = "SELECT * FROM shipments WHERE user_id='".$_SESSION['user']['id']."'";
$result = $conn->query($sql);
?>
<div class="my-account">
    <h2>Riwayat Pengiriman</h2>
    <div class="account-section">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>No. Resi: " . $row['tracking_number'] . " - Status: " . $row['status'] . "</p>";
            }
        } else {
            echo "<p>Tidak ada riwayat pengiriman.</p>";
        }
        ?>
    </div>
</div>
