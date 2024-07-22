<!DOCTYPE html>
<html>
<head>
    <title>Zombie vs Plant</title>
</head>
<body>
    <h2>Zombie vs Plant</h2>
    <form method="POST">
        <label for="jenisZombie">Jenis Zombie:</label>
        <input type="text" id="jenisZombie" name="jenisZombie" required>
        <input type="submit" value="Tentukan Tindakan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jenisZombie = $_POST["jenisZombie"];

        function tindakanPemain($jenisZombie) {
            switch ($jenisZombie) {
                case "Regular Zombie":
                    return "Gunakan Peashooter!";
                case "Conehead Zombie":
                    return "Gunakan Snow Pea!";
                case "Buckethead Zombie":
                    return "Gunakan Repeater!";
                case "Newspaper Zombie":
                    return "Gunakan Cherry Bomb!";
                case "Football Zombie":
                    return "Gunakan Jalapeno!";
                default:
                    return "Jenis zombie tidak diketahui.";
            }
        }

        $tindakan = tindakanPemain($jenisZombie);
        echo "<p>Tindakan untuk $jenisZombie: $tindakan</p>";
    }
    ?>
</body>
</html>
