<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Bilangan Genap & Ganjil</title>
    <link rel="stylesheet" href="/style/Looping.css">
</head>
<body>

    <div class="container">
        <h1>🔢 Cek Bilangan Genap & Ganjil</h1>
        <p> Looping adalah proses perulangan suatu blok kode secara otomatis hingga memenuhi kondisi tertentu. Ini adalah contoh program menggunkaan looping. <br> Masukkan rentang angka untuk melihat bilangan genap dan ganjil.</p>

        <form method="POST">
            <input type="number" name="start" required placeholder="Dari">
            <input type="number" name="end" required placeholder="Sampai">
            <button type="submit">  Tampilkan  </button>
        </form>

        <div class="result-box">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $start = $_POST["start"];
                $end = $_POST["end"];

                if ($start > $end) {
                    echo "<p class='error'>⚠️ Angka awal harus lebih kecil dari angka akhir!</p>";
                } else {
                    $genap = [];
                    $ganjil = [];
                    for ($i = $start; $i <= $end; $i++) {
                        if ($i % 2 == 0) {
                            $genap[] = $i;
                        } else {
                            $ganjil[] = $i;
                        }
                    }
                    echo "<p><b>Bilangan Genap:</b> " . implode(", ", $genap) . "</p>";
                    echo "<p><b>Bilangan Ganjil:</b> " . implode(", ", $ganjil) . "</p>";
                }
            }
            ?>
        </div>

        <!-- Tombol Kembali ke Home -->
        <a href="/Home.html" class="btn-home"> Kembali ke Home</a>
    </div>

</body>
</html>
