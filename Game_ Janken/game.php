<?php
$pilihan = array('Batu', 'Kertas', 'Gunting');
$komputer = $pilihan[rand(0, 2)];

$result = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pilihan_pengguna = $_POST["pilihan_pengguna"];

    $result .= "Anda memilih: " . $pilihan_pengguna . "<br>";
    $result .= "Komputer memilih: " . $komputer . "<br>";

    if ($pilihan_pengguna == $komputer) {
        $result .= "Hasilnya adalah seri.";
    } elseif (
        ($pilihan_pengguna == 'Batu' && $komputer == 'Gunting') ||
        ($pilihan_pengguna == 'Kertas' && $komputer == 'Batu') ||
        ($pilihan_pengguna == 'Gunting' && $komputer == 'Kertas')
    ) {
        $result .= "Selamat! Anda menang.";
    } else {
        $result .= "Maaf, Anda kalah. Coba lagi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batu, Kertas, Gunting Game</title>
    <link rel="stylesheet" href="game.css">
    
</head>

<body>
    <div class="container">
        <div class="game-container">
            <h2>Selamat datang di Game Batu Kertas Gunting!</h2>
            <form method="post" action="">
                <label for="pilihan_pengguna">Pilih antara Batu, Kertas, atau Gunting:</label>
                <select name="pilihan_pengguna" id="pilihan_pengguna" required>
                    <option value="">Pilih salah satu..</option>  
                    <option value="Batu">Batu</option>
                    <option value="Kertas">Kertas</option>
                    <option value="Gunting">Gunting</option>
                </select>
                <br><br>
                <input type="submit" value="Submit">
            </form>
            <br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo $result;
            }
            ?>
        </div>
    </div>
</body>

</html>
