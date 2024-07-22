<!DOCTYPE html>
<html>
<head>
    <title>Marketplace</title>
</head>
<body>
    <h2>Marketplace</h2>
    <form method="POST">
        <label for="jumlahProduk">Jumlah Produk:</label>
        <input type="number" id="jumlahProduk" name="jumlahProduk" required>
        <br><br>
        <label for="hargaSatuan">Harga Satuan Produk:</label>
        <input type="number" id="hargaSatuan" name="hargaSatuan" required>
        <br><br>
        <input type="submit" value="Hitung Harga Akhir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlahProduk = $_POST["jumlahProduk"];
        $hargaSatuan = $_POST["hargaSatuan"];

        function hitungHargaAkhir($jumlahProduk, $hargaSatuan) {
            $total = $jumlahProduk * $hargaSatuan;

            if ($jumlahProduk > 20) {
                $total *= 0.80; // Diskon 20%
            } elseif ($jumlahProduk > 10) {
                $total *= 0.90; // Diskon 10%
            }

            $pengirimanGratis = $total > 500000;

            return array($total, $pengirimanGratis);
        }

        list($hargaAkhir, $pengirimanGratis) = hitungHargaAkhir($jumlahProduk, $hargaSatuan);
        echo "<p>Harga akhir untuk $jumlahProduk produk adalah Rp$hargaAkhir</p>";
        if ($pengirimanGratis) {
            echo "<p>Pengiriman gratis berlaku.</p>";
        } else {
            echo "<p>Pengiriman gratis tidak berlaku.</p>";
        }
    }
    ?>
</body>
</html>
