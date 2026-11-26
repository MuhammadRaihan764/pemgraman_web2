<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan");

$query = "SELECT * FROM mahasiswas";
$hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

while ($row = mysqli_fetch_array($hasil)) {
    echo $row['nama'] . "<br>";
}
?>