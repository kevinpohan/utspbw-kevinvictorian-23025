<?php
session_start();
if (!isset($_SESSION["nama_list"])) {
    $_SESSION["nama_list"] = ["Andi", "Budi", "Citra", "Dian"];
}

// Tambah Nama
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["tambah_nama"])) {
    $nama_baru = trim($_POST["nama"]);
    if (!empty($nama_baru)) {
        $_SESSION["nama_list"][] = ucfirst(strtolower($nama_baru));
    }
}

// Hapus Semua Nama
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["hapus_nama"])) {
    $_SESSION["nama_list"] = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <link rel="stylesheet" href="/style/Array.css">
</head>
<body>

    <div class="container">
        <h1> Array </h1>
        <p>Array adalah struktur data yang menyimpan sekumpulan elemen dengan tipe data yang sama dalam satu variabel, diakses menggunakan indeks.</p>

        <div class="box">
            <h2>Tambah Nama</h2>
            <form method="POST">
                <input type="text" name="nama" required placeholder="Masukkan Nama Baru">
                <button type="submit" name="tambah_nama">Tambah</button>
            </form>
        </div>

        <div class="box">
            <h2>📋 Daftar Nama</h2>
            <ul>
                <?php if (!empty($_SESSION["nama_list"])): ?>
                    <?php foreach ($_SESSION["nama_list"] as $nama): ?>
                        <li><?php echo htmlspecialchars($nama); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="empty">Belum ada nama dalam daftar.</p>
                <?php endif; ?>
            </ul>
            <form method="POST">
                <button type="submit" name="hapus_nama" class="btn-delete"> Hapus Semua</button>
            </form>
        </div>

        <div class="box">
            <h2>Cari Nama</h2>
            <form method="POST">
                <input type="text" name="huruf" maxlength="1" required placeholder="Masukkan Huruf Pertama">
                <button type="submit">Cari</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["huruf"])) {
                $huruf = strtolower($_POST["huruf"]);
                $hasil = array_filter($_SESSION["nama_list"], function($nama) use ($huruf) {
                    return strtolower($nama[0]) === $huruf;
                });

                if (count($hasil) > 0) {
                    echo "<p><b>Nama yang diawali huruf '$huruf':</b> " . implode(", ", $hasil) . "</p>";
                } else {
                    echo "<p class='error'>⚠️ Tidak ada nama yang diawali huruf '$huruf'.</p>";
                }
            }
            ?>
        </div>

        <a href="/Home.html" class="btn-home"> Kembali ke Home</a>
    </div>

</body>
</html>
