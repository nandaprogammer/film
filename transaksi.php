<?php
// ================= DATA FILM =================
$id = $_GET['film'] ?? 0;

$filmList = [
    ["Avengers: Endgame", "endgame.jpg"],
    ["Spider-man: No Way Home", "nowayhome.jpg"],
    ["The Batman", "thebatman.jpg"],
    ["F1 Movie", "f1.jpg"]
];

if (!isset($filmList[$id])) $id = 0;

$namaFilm = $filmList[$id][0];
$gambar   = $filmList[$id][1];

// ================= INPUT =================
$jam      = $_POST['jam'] ?? '';
$ruangan  = $_POST['ruangan'] ?? '';
$jumlah   = $_POST['jumlah'] ?? '';
$payment  = $_POST['payment'] ?? '';
$total    = '' ;
$admin = 0;


// ================= PROSES HITUNG =================
if (isset($_POST['hitung']) || isset($_POST['pesan'])) {

    // harga
    if ($ruangan == 'vip') {
        $harga = 150000;
    } else {
        $harga = 75000;
    }
    // biaya admin
    $admin = 2500 * (int)$jumlah;

     if ($payment == 'Dana') {
        $biayaAdmin = 1500;
    } elseif ($payment == 'OVO') {
        $biayaAdmin = 2000;
    } elseif ($payment == 'Gopay') {
        $biayaAdmin = 2500;
    } else {
          $biayaAdmin = 0;
    }

    

    // total
    if ($jumlah > 0) {
        $total = ($harga * (int)$jumlah) + $admin + $biayaAdmin;
    }
}

 if (isset($_POST['pesan'])) {
    echo "<script>
        alert(
            'PESANAN BERHASIL\\n\\n' +
            'Film: $namaFilm\\n' +
            'Jam Tayang: $jam\\n' +
            'Jenis Ruangan: $ruangan\\n' +
            'Jumlah Tiket: $jumlah\\n' +
            'Metode Pembayaran: $payment: Biaya Admin +($biayaAdmin)\\n' +
            'Biaya Admin: Rp $admin\\n' +
            'Total: Rp $total'
        );
        window.location.href = 'index.php';
    </script>";
}





?>

<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Pesan Tiket - <?= $namaFilm ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
         <h5><a class="nav-link disabled" aria-disabled="true">BIOSKOP MODERN</a></h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                   <h5><a class="nav-link active" href="index.php">Home</a></h5>
                </li>
        </div>
    </div>
</nav>

<div class="container mt-5">
<div class="card p-4">


<div class="text-center mb-3">
    <img src="img/<?= $gambar ?>" width="150">        
</div>

<h3 class="text-center mb-4">Pesan Tiket - <?= $namaFilm ?></h3>

<form method="post">

<!-- JAM TAYANG -->
<label class="fw-bold">Jam Tayang</label><br>
<div class="mb-3">
    <input type="radio" name="jam" value="12:00" <?= $jam=='12:00'?'checked':'' ?>> 12:00
    <input type="radio" name="jam" value="16:00" <?= $jam=='16:00'?'checked':'' ?>> 16:00
    <input type="radio" name="jam" value="18:00" <?= $jam=='18:00'?'checked':'' ?>> 18:00
</div>

<!-- RUANGAN -->
<label class="fw-bold">Ruangan</label><br>
<div class="mb-4">
    <input type="radio" name="ruangan" value="vip" <?= $ruangan=='vip'?'checked':'' ?>>
    VIP - 150.000 <br>

    <input type="radio" name="ruangan" value="reguler" <?= $ruangan=='reguler'?'checked':'' ?>>
    Reguler - 75.000
</div>


<!-- METODE PEMBAYARAN -->
<label class="fw-bold">Metode Pembayaran</label>
<div class="mb-4">

    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment" value="Dana"
        <?= $payment == 'Dana' ? 'checked' : '' ?>>
        <label class="form-check-label">
            DANA (Admin Rp 1.500)
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment" value="OVO"
        <?= $payment == 'OVO' ? 'checked' : '' ?>>
        <label class="form-check-label">
            OVO (Admin Rp 2.000)
        </label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" name="payment" value="Gopay"
        <?= $payment == 'Gopay' ? 'checked' : '' ?>>
        <label class="form-check-label">
            GoPay (Admin Rp 2.500)
        </label>
    </div>

</div>


<!-- JUMLAH -->
<input class="form-control mb-3" type="number" name="jumlah"
       value="<?= $jumlah ?>" placeholder="Jumlah Tiket">

<!-- HITUNG -->
<button name="hitung" class="btn btn-primary w-20 mb-3">
    Hitung
</button>

<!-- TOTAL -->
<input class="form-control mb-3" value="<?= $total ?>"
       placeholder="Total Harga" readonly>

<!-- PESAN -->
<button name="pesan" class="btn btn-success w-20">
    Pesan
</button>

</form>

</div>
</div>

</body>
</html>
