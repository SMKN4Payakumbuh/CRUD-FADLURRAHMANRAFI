<?php
error_reporting(0);
include_once ("config/koneksi.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
</head>
<body>
<h1>Data Buku</h1>
        <a href="public/buku/tambah.php">Tambah Data</a>
        <form action="" method="POST">
            <input type="text" name="query" placeholder="Masukkan Nama Buku">
            <input type="submit" nama="cari" value="search">
        </form>
        
    <table border=1>
        <tr>
            <th>id buku</th>
            <th>nama buku</th>
            <th>kategori</th>
            <th>penerbit</th>
            <th>tahun terbit</th>
            <th>jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php
             $query = $_POST['query'];
            if($query != ''){
                $ambildata = mysqli_query ($kon, "SELECT * from buku where namabuku like '".$query."' "); 
            }else{
                $ambildata = mysqli_query ($kon, "SELECT * from buku"); 
            }
            while($userambildata = mysqli_fetch_array($ambildata)){
                echo "<tr>";
                    echo "<td>$userambildata[idbuku]</td>";
                    echo "<td>$userambildata[namabuku]</td>";
                    echo "<td>$userambildata[kategori]</td>";
                    echo "<td>$userambildata[penerbit]</td>";
                    echo "<td>$userambildata[tahunterbit]</td>";
                    echo "<td>$userambildata[jumlah]</td>";
                    echo "<td> <a href='public/buku/update.php?idbuku=$userambildata[idbuku]'>Edit</a> | <a href='public/buku/delete.php?idbuku=$userambildata[idbuku]'>Hapus</a></td>";
                   echo "</tr>";
            }
        ?>
    </table>
</body>
</html>