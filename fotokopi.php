<!DOCTYPE html>
<html>
<head>
    <title>Biaya Fotokopi</title>
</head>
<body>
    <h2>Hitung Total Biaya Fotokopi</h2>
    <form method="POST">
        <label for="jumlahLembar">Jumlah Lembar:</label>
        <input type="number" id="jumlahLembar" name="jumlahLembar" required>
        <input type="submit" value="Hitung Biaya">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jumlahLembar = $_POST["jumlahLembar"];

        function hitungBiayaFotokopi($jumlahLembar) {
            if ($jumlahLembar <= 100) {
                $biayaPerLembar = 150;
            } elseif ($jumlahLembar <= 500) {
                $biayaPerLembar = 120;
            } else {
                $biayaPerLembar = 100;
            }

            $totalBiaya = $jumlahLembar * $biayaPerLembar;

            if ($totalBiaya > 200000) {
                $totalBiaya *= 0.90; // Diskon 10%
            } elseif ($totalBiaya > 100000) {
                $totalBiaya *= 0.95; // Diskon 5%
            }

            return $totalBiaya;
        }

        $totalBiaya = hitungBiayaFotokopi($jumlahLembar);
        echo "<p>Total biaya untuk $jumlahLembar lembar adalah Rp$totalBiaya</p>";
    }
    ?>
</body>
</html>
