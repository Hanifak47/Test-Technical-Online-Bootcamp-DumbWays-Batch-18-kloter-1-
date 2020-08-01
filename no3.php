<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hapus duplikat</title>
</head>

<body>
    <h2>hapus duplikat</h2>
    <form action="" method="post">
        <input type="text" name="huruf" size="40" placeholder="masukkan huruf" />
        <button type="submit" name="hapus">hapus duplikat</button>
    </form>
    <br>
</body>

</html>
<?php
if (isset($_POST['hapus'])) {
    huruf($_POST['huruf']);
}
function huruf($huruf)
{
    $str =  count_chars($huruf, 3);;
    echo $str;
}
?>
