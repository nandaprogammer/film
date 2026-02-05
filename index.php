<?php 
$filmList = [
    ["Avengers: Endgame","endgame.jpg"],
    ["Spider-man: No Way Home","nowayhome.jpg"],
    ["The Batman","thebatman.jpg"],
    ["F1 Movie", "f1.jpg"]
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIOSKOP MODERN</title>

    <style>
        .carousel-item img {
            height: 450px;
            object-fit: cover;
        }
        .produk-card img{
            width:100%;
            height:200px;
            object-fit:cover;
            border-radius:20px;
        }
        .carousel-caption {
            background: rgba(0,0,0,0.5);
            padding: 20px;
            border-radius: 10px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
         <h5><a class="nav-link disabled" aria-disabled="true">BIOSKOP MODERN</a></h5>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <h5><a class="nav-link" href="#daftarfilm">Pesan Tiket</a></h5>  
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CAROUSEL -->
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/black.jpg" class="d-block w-100" alt="">
            
            
            <div class="carousel-caption d-flex flex-column 
                        align-items-center justify-content-center 
                        h-100 text-center">
                <h2 class="fw-bold">Selamat Datang Di Bioskop Modern</h2>
                <p>Tempat Terbaik Untuk Menikmati film favorit anda</p>
                <a href="#daftarfilm" class="btn btn-primary">Pesan Tiket</a>
            </div>
        </div>
    </div>
</div>

<br>

<!-- daftar film -->
<section id="daftarfilm">
    <div class="container mb-4">
        <h2 class="text-center fw-bold mb-4">Daftar Film</h2>
        <div class="row">
            <?php foreach ($filmList as $film => $tampil) { ?>
          <div class="col-md-4">
                <div class="produk-card border p-3 rounded shadow-sm h-100 text-center">
                    <img src="img/<?=$tampil[1]?>" alt="<?=$tampil[0]?>" class="d-block mx-auto">
                    <h5 class="mt-3 fw-bold"><?=$tampil[0]?></h5>
                    <a href="transaksi.php?film=<?= $film ?>" class="btn btn-primary btn-sm mt-2 w-100">
                        Pesan Tiket
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>


<!-- FOOTER -->
 <footer class="bg-dark text-light mt-5 pt-4">
    <div class="container">
        <div class="row">

            <!-- Tentang Cinema -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">BIOSKOP MODERN</h5>
                <p class="small">
                    BIOSKOP MODERN yang menyediakan berbagai film
                    terbaru dengan kualitas audio dan visual terbaik untuk pengalaman
                    menonton yang nyaman.
                </p>
            </div>

            <!-- Menu -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="index.php" class="text-light text-decoration-none">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#daftarfilm" class="text-light text-decoration-none">
                            Pesan Tiket
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Kontak Kami</h5>
                <p class="small mb-1">📍 Jl. Perintis Kemerdekaan No. 10</p>
                <p class="small mb-1">📞 0812-3456-7890</p>
                <p class="small">✉️ bioskopmodern@email.com</p>
            </div>

        </div>
<hr class="border-secondary">

        <div class="text-center pb-3">
            <small>
                &copy; <?= date("Y"); ?> BIOSKOP MODERN. All Rights Reserved.
            </small>
        </div>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
