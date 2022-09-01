<?php
include_once ("../../config/koneksi.php");

$idbuku = $_GET['idbuku'];
$query = mysqli_query($kon, "DELETE FROM buku WHERE idbuku='$idbuku'");

header("location: ../../index.php");

?>