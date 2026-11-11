<?php
include "koneksi.php";

function kembali($pesan) {
    echo "<script>
            alert(" . json_encode($pesan) . ");
            document.location = 'form-input.php';
          </script>";
    exit;
}

if (isset($_POST['Submit']) && $_POST['Submit'] == "Submit") {
    $id_mahasiswa = trim($_POST['id_mahasiswa']);
    $nama         = trim($_POST['nama']);
    $jurusan      = $_POST['jurusan'];
    $alamat       = trim($_POST['alamat']);
    $telepon      = trim($_POST['telepon']);

    // Validasi data kosong
    if ($id_mahasiswa === "" || $nama === "" || $alamat === "" || $telepon === "" || $jurusan === "-") {
        kembali("Data Harap Dilengkapi!");
    }

    // Cek NIM sudah ada atau belum
    $cek = mysqli_prepare($koneksi, "SELECT id_mahasiswa FROM mahasiswa WHERE id_mahasiswa = ?");
    mysqli_stmt_bind_param($cek, "s", $id_mahasiswa);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);
    if (mysqli_stmt_num_rows($cek) > 0) {
        kembali("NIM sudah dipakai!, silahkan ganti NIM yang lain");
    }
    mysqli_stmt_close($cek);

    // Masukkan data ke tabel
    $stmt = mysqli_prepare($koneksi,
        "INSERT INTO mahasiswa (id_mahasiswa, nama, jurusan, alamat, telepon) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $id_mahasiswa, $nama, $jurusan, $alamat, $telepon);

    if (mysqli_stmt_execute($stmt)) {
        kembali("Input Data Mahasiswa Berhasil");
    } else {
        echo "Input Data Mahasiswa Gagal!, Silahkan diulangi!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header("Location: form-input.php");
    exit;
}