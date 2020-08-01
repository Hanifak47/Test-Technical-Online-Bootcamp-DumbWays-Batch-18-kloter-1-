<?php
$konek = mysqli_connect("localhost", "root", "", "dumbways");
$hero = query("SELECT * FROM heroes_db");
//query
function query($query)
{
    global $konek;

    $kolom = [];
    $result = mysqli_query($konek, $query);
    while ($isi = mysqli_fetch_assoc($result)) {
        $kolom[] = $isi;
    }
    return $kolom;
}
//tambah data
function tambah($data)
{
    global $konek;
    $name = htmlspecialchars($data["name"]);
    $type_id = htmlspecialchars($data["type_id"]);
    $gambar = upload();

    if (!$gambar) {
        return false;
    }
    $query = "INSERT INTO heroes_db VALUES('','$name','$type_id','$gambar')";
    $query2 = "INSERT INTO type_id VALUES('','$type_id')";
    mysqli_query($konek, $query);
    mysqli_query($konek, $query2);
    return mysqli_affected_rows($konek);
}

//upload poto
function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuran = $_FILES['gambar']['size'];
    $gagal = $_FILES['gambar']['error'];
    $tempn = $_FILES['gambar']['tmp_name'];


    if ($gagal == 4) {
        echo "<script> alert('tidak ada gambar yang diupload');</script>";
        return false;
    }

    $validitas = ['jpg', 'jpeg', 'png'];

    $ekstensi = explode('.', $namafile);

    $ekstensi = strtolower(end($ekstensi));

    if (!in_array($ekstensi, $validitas)) {
        echo "<script> alert('yang anda upload bukan gambar')</script>";
        return false;
    }

    if ($ukuran > 1000000) {
        echo "<script>alert('ukuran gambar terlalu besar')</script>";
        return false;
    }

    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $ekstensi;
    move_uploaded_file($tempn, 'img/' . $namabaru);
    return $namabaru;
}

//tekan tombol tambah
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        //redirect ke menu utama
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href='no4.php';
        </script>";
    } else {
        //redirect ke menu utama
        echo "<script>
        alert('data gagal ditambahkan');
        document.location.href='no4.php';
        </script>";
    }
}
//method hapus
function hapus($data)
{
    global $konek;

    $query = "DELETE FROM heroes_db WHERE id=$data";

    mysqli_query($konek, $query);
    return mysqli_affected_rows($konek);
}
//tekan tombol hapus
if (isset($_POST['hapus'])) {
    if (hapus($_POST["del"]) > 0) {
        echo "<script> alert('data berhasil dihapus');
    document.location.href='no4.php';
    </script>";
    } else {
        echo "<script> alert('data gagal dihapus'); 
    document.location.href='no4.php';</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <h2>Tambah Data Hero</h2>
    <!-- form tambah/edit -->
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nim">Name :</label>
                <input type="text" name="name" id="name" required autocomplete="off">
                <br>
                <br>
            </li>
            <li>
                <label for="type_id">type id :</label>
                <input type="text" name="type_id" id="type_id" required autocomplete="off">
                <br>
                <br>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar" require>
                <br>
                <br>
            </li>
            <li>
                <button type="submit" name="submit">Tambah data</button>
            </li>
        </ul>
    </form>

    <!-- list hero -->
    <div id="container">


        <div class="container">
            <div class="row">
                <?php foreach ($hero as $h) : ?>

                    <div class="row row-cols-2">
                        <div class="card" style="width: 18rem;">
                            <img src="img/<?= $h["gambar"]; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $h['name']; ?></h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><?= $h['type_id']; ?></li>
                            </ul>
                            <div class="card-body">
                                <form action="" method="post">
                                    <input type="hidden" name="del" value="<?= $h['id']; ?>">
                                    <button type="submit" name="hapus">hapus</button>
                                </form>
                                <a href="no4edit.php?id=<?= $h["id"] ?>;">edit</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>
