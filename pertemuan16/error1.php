<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_latihan");

$query = "SELECT * FROM mahasiswas"; //sengaja dibikin salah
$hasil = mysqli_query($koneksi, $query);

while ($row = mysqli_fetch_array($hasil)) {
    echo $row['nama'] . "<br>";
}
?>