<html>
<head>
<title>Contoh Counter</title>
</head>

<body>
<?php
$nama_file = "counter.dat";

// Cek apakah file counter.dat sudah ada
if (file_exists($nama_file)) {
    // Jika ada, buka file untuk dibaca
    $berkas = fopen($nama_file, "r");
    $pencacah = (int) trim(fgets($berkas, 255));
    $pencacah++;
    fclose($berkas);
} else {
    // Jika belum ada, mulai dari 1
    $pencacah = 1;
}

// Simpan nilai pencacah terbaru ke file
$berkas = fopen($nama_file, "w");
fputs($berkas, $pencacah);
fclose($berkas);

// Tulis ke halaman web
print("Anda pengunjung ke-" . $pencacah . "<br>\n");
?>
</body>

</html>