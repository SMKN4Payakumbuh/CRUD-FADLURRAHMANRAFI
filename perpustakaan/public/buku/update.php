<?php
include_once ("../../config/koneksi.php");

$idbuku = $_GET['idbuku'];
$sqlget = ("SELECT * FROM buku WHERE idbuku=$idbuku");
$queryget = mysqli_query($kon, $sqlget);
$data = mysqli_fetch_array($queryget);
?>

<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
        <h1>Tambah Data Buku</h1>
        <a href="../../index.php">Home</a>

        <form action="update.php" method="post" name="tambah buku">
                <table border=1>
                    <tr>
                        <td>Id buku</td>
                        <td><input type="int" name="idbuku" value ="<?php echo "$data[idbuku]"; ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Buku</td>
                        <td><input type="text" name="namabuku" value ="<?php echo "$data[namabuku]"; ?>" required></td>
                    </tr>
                    <tr>
                        <td>kategori</td>
                        <td><input type="text" name="kategori" value ="<?php echo "$data[kategori]"; ?>" required></td>
                    </tr>
                    <tr>
                        <td>penerbit</td>
                        <td><input type="text" name="penerbit" value ="<?php echo "$data[penerbit]"; ?>" required></td>
                    </tr>
                    <tr>
                        <td>tahun terbit</td>
                        <td><input type="date" name="tahunterbit" value ="<?php echo "$data[tahunterbit]"; ?>" required></td>
                    </tr>
                    <tr>
                        <td>jumlah</td>
                        <td><input type="int" name="jumlah" value ="<?php echo "$data[jumlah]"; ?>" required></td>
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

            echo "idbuku: $idbuku";

            $sqlget = "SELECT * FROM buku WHERE idbuku=$idbuku";
            $queryget = mysqli_query($kon, $sqlget);
            $cek = mysqli_num_rows($queryget);

            $sqlUpdate = "UPDATE buku 
                            SET namabuku='$namabuku', kategori='$kategori', penerbit='$penerbit', tahunterbit='$tahunterbit', jumlah='$jumlah'
                            WHERE idbuku='$idbuku'";

            $queryUpdate = mysqli_query($kon, $sqlUpdate);

            header("location: ../../index.php");

        }
        ?>
</body>
</html>