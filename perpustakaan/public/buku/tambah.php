<?php
include_once ("../../config/koneksi.php")
?>

<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
        <h1>Tambah Data Buku</h1>
        <a href="../../index.php">Home</a>

        <form action="tambah.php" method="post" name="tambah buku">
                <table border=1>
                    <tr>
                        <td>Id buku</td>
                        <td><input type="int" name="idbuku" required></td>
                    </tr>
                    <tr>
                        <td>Nama Buku</td>
                        <td><input type="text" name="namabuku" required></td>
                    </tr>
                    <tr>
                        <td>kategori</td>
                        <td><input type="text" name="kategori" required></td>
                    </tr>
                    <tr>
                        <td>penerbit</td>
                        <td><input type="text" name="penerbit" required></td>
                    </tr>
                    <tr>
                        <td>tahun terbit</td>
                        <td><input type="date" name="tahunterbit" required></td>
                    </tr>
                    <tr>
                        <td>jumlah</td>
                        <td><input type="int" name="jumlah" required></td>
                    </tr>
                </table>
                <input type="submit" name="submit" value="add">
        </form>

        <?php
        if(isset($_POST['submit'])){
            $idbuku = $_POST['idbuku'];
            $namabuku = $_POST['namabuku'];
            $kategori = $_POST['kategori'];
            $penerbit = $_POST['penerbit'];
            $tahunterbit = $_POST['tahunterbit'];
            $jumlah = $_POST['jumlah'];
            include_once ("../../config/koneksi.php");

            $sqlget = "SELECT * FROM buku WHERE idbuku=$idbuku";
            $queryget = mysqli_query($kon, $sqlget);
            $cek = mysqli_num_rows($queryget);

            $insertdata = "INSERT INTO buku(idbuku,namabuku,kategori,penerbit,tahunterbit,jumlah)
                            VALUES ('$idbuku','$namabuku','$kategori','$penerbit','$tahunterbit','$jumlah')";

            $queryinsert = mysqli_query($kon, $insertdata);

            if (isset($insertdata) && $cek < 0) {
                echo "Data Berhasil Ditambahkan";
            }else if ($cek > 1) {
                echo "Data Gagal Ditambahkan";
            }
        }
        ?>
</body>
</html>