<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Diskon Jos</title>
</head>

<body>
    <h2>Diskon Dumbways</h2>
    <form action="" method="post">
        <select name="diskon">
            <option value="">--Pilih Diskon--</option>
            <option value="1">DumbWaysJos</option>
            <option value="2" selected>DumbWaysMantap</option>
        </select>
        <input type="number" name="angka" size="40" placeholder="masukkan angka" />
        <button type="submit" name="hitung">Hitung Diskon</button>
    </form>
    <br>
</body>

</html>
<?php
function hitung($diskon, $belanja)
{
    //diskon dumbwaysjos
    if ($diskon == 1) {
        //minim belanja 50k
        if ($belanja >= 50000) {
            $maksdiskon = $belanja * 21.1 / 100;

            //jika maksdiskon dibawah 20k
            if ($maksdiskon <= 20000) {
                echo "total belanja anda " . $belanja . " anda mendapatkan diskon sebesar " . $maksdiskon . " total belanja anda " . ($belanja - $maksdiskon);
                //jika diskon diatas 20k
            } else {
                echo "total belanja anda " . $belanja . " anda mendapatkan diskon sebesar 20000 total belanja anda " . ($belanja - 20000);
            }
        }
        //diskon dumbwaysmantap
    } else if ($diskon == 2) {
        if ($belanja >= 80000) {
            $maksdiskon = $belanja * 30 / 100;

            //jika maksdiskon dibawah 20k
            if ($maksdiskon <= 40000) {
                echo "total belanja anda " . $belanja . " anda mendapatkan diskon sebesar " . $maksdiskon . " total belanja anda " . ($belanja - $maksdiskon);
                //jika diskon diatas 20k
            } else {
                echo "total belanja anda " . $belanja . " anda mendapatkan diskon sebesar 40000 total belanja anda " . ($belanja - 40000);
            }
        }
    }
}

if (isset($_POST['hitung'])) {
    $diskon = $_POST['diskon'];

    hitung($diskon, $_POST['angka']);
}


?>
