<?php
$konek = mysqli_connect("localhost", "root", "", "dumbways");
$id = $_GET['id'];

$temp = mysqli_query($konek, "SELECT * FROM heroes_db WHERE id =$id");
$hero = mysqli_fetch_array($temp);

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

function ubah($data)
{
    global $konek;
    $id = $data["id"];
    //htmlspecialchars mencegah inputan dengan tag html berjalan
    $name = htmlspecialchars($data["name"]);
    $type_id = htmlspecialchars($data["type_id"]);
    $gambarlama = $data["gambarlama"];
    //cek apakah user upload gambar baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarlama;
    } else {
        $gambar = upload();
    }
    //query insert data menggunakan variabel yang ada
    $query = "UPDATE heroes_db SET name='$name', type_id='$type_id', gambar='$gambar' WHERE id=$id";
    //menjalankan query
    mysqli_query($konek, $query);
    //mengetahui baris yang terdampak karena operasi query
    return mysqli_affected_rows($konek);
}

//cek apakah submit berhasil atau tidak
if (isset($_POST["ubahdata"])) {
    //penggunaan method tambah pada kelas functions.php dengan parammeter 
    //post(bertipe array karena terdiri dari banyak data(dari menu form))
    if (ubah($_POST) >= 0) {
        //redirect ke menu utama
        echo "<script>
        alert('data berhasil diubah');
        document.location.href='no4.php';
        </script>";
    } else {
        //redirect ke menu utama
        echo "<script>
        alert('data gagal diubah');
        document.location.href='no4.php';
        </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myfriends</title>
</head>

<body>
    <h2>Ubah Data Hero</h2>

    <!-- form tambah/edit -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $hero["id"] ?>">
        <!-- jika gambar tidak diubah maka mengirimkan gambar yang diperoleh dari pengiriman nama gambar lama -->
        <input type="hidden" name="gambarlama" value="<?= $hero["gambar"] ?>">
        <ul>
            <li>
                <label for="nim">Name :</label>
                <input type="text" name="name" id="name" required autocomplete="off" value="<?= $hero["name"] ?>">
                <br>
                <br>
            </li>
            <li>
                <label for="type_id">type id :</label>
                <input type="text" name="type_id" id="type_id" required autocomplete="off" value="<?= $hero["type_id"] ?>">
                <br>
                <br>
            </li>
            <li>
                <label for="gambar">Gambar :</label>
                <img src="img/<?= $hero["gambar"] ?>" alt="" width="40"><br>
                <input type="file" name="gambar">
                <br>
                <br>
            </li>
            <li>
                <button type="submit" name="ubahdata">ubah data</button>
            </li>
        </ul>
    </form>
</body>

</html>
