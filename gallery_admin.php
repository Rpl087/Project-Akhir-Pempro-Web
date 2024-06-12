<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Pelican Expedition</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="konten">
    <header class="main-menu">
        <div class="container">
            <img src="img/logo.png" alt="Pelican Expedition Logo" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="home_admin.php">Home</a></li>
                <li><a href="gallery_admin.php">Gallery</a></li>
                <li><a href="manajemen_pengiriman.php">Manajemen</a></li>
                <li><a href="contact_admin.php">About Us</a></li>
                <li><a href="my_account_admin.php">My Account</a></li>
            </ul>
        </nav>
    </header>

    <div class="slider">
        <img src="img/foto_1.jpg" alt="foto_dok_1" class="slide">
        <img src="img/foto_2.jpg" alt="foto_dok_2" class="slide">
        <img src="img/foto_3.jpg" alt="foto_dok_3" class="slide">
        <img src="img/foto_4.jpg" alt="foto_dok_4" class="slide">
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <script src="script.js"script>
    <script>
        let slideIndex = 0;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            const slides = document.getElementsByClassName("slide");
            if (n >= slides.length) {slideIndex = 0}
            if (n < 0) {slideIndex = slides.length - 1}
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }
    </script>
    
    <footer class="footer">
        <p>&copy; 2024 Pelican Expedition. All rights reserved.</p>
    </footer>
    
    <script src="script.js"script>

</body>
</body>
</html>