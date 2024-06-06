<?php
session_start();
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update user data in the database
    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id='".$_SESSION['user']['id']."'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['phone'] = $phone;
        header('Location: /my_account.php');
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<div class="my-account">
    <h2>Edit Profil</h2>
    <form method="post">
        <div class="account-section">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['user']['name']; ?>" required>
        </div>
        <div class="account-section">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" required>
        </div>
        <div class="account-section">
            <label for="phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>" required>
        </div>
        <div class="account-section">
            <button type="submit" class="btn">Simpan Perubahan</button>
        </div>
    </form>
</div>
<?php
include '../includes/footer.php';
?>
