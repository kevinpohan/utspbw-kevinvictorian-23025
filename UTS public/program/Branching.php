<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Cek Umur & Bilangan</title>
    <link rel="stylesheet" href="/style/Branching.css">
</head>
<body>

    <div class="container">
        <h1>Branching dalam Pemrograman</h1>
        <p>
            Branching adalah proses pengambilan keputusan dalam program berdasarkan suatu kondisi.
            Contoh di bawah ini menunjukkan cara menentukan kategori umur dan mengecek bilangan positif/negatif.
        </p>

        <div class="box-container">
            <div class="card">
                <h2>Cek Kategori Umur</h2>
                <form method="POST">
                    <input type="number" name="umur" required placeholder="Masukkan Umur">
                    <button type="submit" name="cek_umur">Cek</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cek_umur"])) {
                    $umur = $_POST["umur"];
                    $kategori = ($umur < 13) ? "Anak-anak" : (($umur >= 13 && $umur <= 19) ? "Remaja" : "Dewasa");
                    echo "<p class='result'>Umur <b>$umur</b> termasuk kategori <b>$kategori</b></p>";
                }
                ?>
            </div>

            <div class="card">
                <h2>Cek Bilangan Positif/Negatif</h2>
                <form method="POST">
                    <input type="number" name="bilangan" required placeholder="Masukkan Bilangan">
                    <button type="submit" name="cek_bilangan">Cek</button>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cek_bilangan"])) {
                    $bilangan = $_POST["bilangan"];
                    $status = ($bilangan > 0) ? "Positif" : (($bilangan < 0) ? "Negatif" : "Nol");
                    echo "<p class='result'>Bilangan <b>$bilangan</b> adalah <b>$status</b></p>";
                }
                ?>
            </div>
        </div>

        <a href="/Home.html" class="btn-home">Kembali ke Home</a>
    </div>

</body>
</html>
