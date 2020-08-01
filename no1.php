<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Segitiga Pascal</title>
</head>

<body>
    <h2>Segitiga Pascal</h2>
    <form action="" method="post">
        <input type="number" name="pascal" size="40" placeholder="masukkan angka" />
        <button type="submit" name="tampil">tampil</button>
    </form>
    <br>
</body>

</html>
<?php
function pascal($nomor)
{

    for ($i = 1; $i <= $nomor; $i++) {

        for ($j = 1; $j <= $i; $j++) {
            if ($j == 1 || $j == $i) {
                $value[$i][$j] = 1;
            } else {
                $value[$i][$j] = $value[$i - 1][$j] + $value[$i - 1][$j - 1];
            }
            echo $value[$i][$j] . " ";
        }
        echo "<br>";
    }
}

if (isset($_POST['tampil'])) {
    pascal($_POST['pascal']);
}


?>
