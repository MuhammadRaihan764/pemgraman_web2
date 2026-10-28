<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container{
            width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 10px;
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=date]{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .btn{
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn:hover{
            background: darkblue;
        }

        .info{
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <form method="POST">

        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing" required>

        <label>Umum</label>
        <input type="number" name="umum" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>

    </form>

    <?php

    // Koneksi ke database
    mysqli_report(MYSQLI_REPORT_OFF);
    $conn = mysqli_connect("localhost", "root", "", "calon_mhs");
    if(!$conn){
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if(isset($_POST['simpan'])){

        $tgl_input = $_POST['tgl_input'];
        $kode = strtoupper($_POST['kode']);
        $nama = $_POST['nama'];
        $jk = $_POST['jk'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];

        // Tempat dan tanggal lahir digabung jadi satu kolom ttl
        $ttl = $tempat_lahir . ", " . $tgl_lahir;

        $mat = $_POST['mat'];
        $bing = $_POST['bing'];
        $umum = $_POST['umum'];

        // Hitung rata-rata
        $rata = ($mat + $bing + $umum) / 3;

        // Menentukan keterangan
        if($rata >= 70){
            $keterangan = "Lulus";
        }elseif($rata >= 60){
            $keterangan = "Cadangan";
        }else{
            $keterangan = "Tidak Lulus";
        }

        // Simpan ke database
        $stmt = mysqli_prepare($conn, "INSERT INTO calon_mhs
            (kode, nama, jenis_kelamin, ttl, asal_sekolah, pekerjaan_ortu, matematika, inggris, umum, rata_rata, keterangan)
            VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        mysqli_stmt_bind_param($stmt, "ssssssdddds",
            $kode, $nama, $jk, $ttl, $asal_sekolah, $pekerjaan_ortu, $mat, $bing, $umum, $rata, $keterangan);

        if(mysqli_stmt_execute($stmt)){
            echo "<p style='color:green'>Data berhasil disimpan.</p>";
        }else{
            echo "<p style='color:red'>Gagal menyimpan: " . htmlspecialchars(mysqli_stmt_error($stmt)) . "</p>";
        }
    }

    // Ambil semua data dari database
    $query = mysqli_query($conn, "SELECT * FROM calon_mhs ORDER BY id ASC");

    $jumlah_pendaftar = 0;
    $jumlah_lulus = 0;
    $jumlah_tidak_lulus = 0;

    echo "
    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>JK</th>
            <th>TTL</th>
            <th>Asal Sekolah</th>
            <th>Pekerjaan Ortu</th>
            <th>Tempat Tes</th>
            <th>MAT</th>
            <th>B. Inggris</th>
            <th>Umum</th>
            <th>Rata-rata</th>
            <th>Keterangan</th>
        </tr>";

    $no = 1;
    while($row = mysqli_fetch_assoc($query)){

        $jumlah_pendaftar++;
        if($row['keterangan'] == "Lulus"){
            $jumlah_lulus++;
        }else{
            $jumlah_tidak_lulus++;
        }

        // Menentukan tempat tes berdasarkan kode
        $kode_awal = substr($row['kode'],0,1);

        if($kode_awal == "A"){
            $tempat_tes = "Gedung A";
        }elseif($kode_awal == "B"){
            $tempat_tes = "Gedung B";
        }elseif($kode_awal == "V"){
            $tempat_tes = "Viktor";
        }else{
            $tempat_tes = "Tidak Diketahui";
        }

        echo "
        <tr>
            <td>".$no++."</td>
            <td>".htmlspecialchars($row['kode'])."</td>
            <td>".htmlspecialchars($row['nama'])."</td>
            <td>".htmlspecialchars($row['jenis_kelamin'])."</td>
            <td>".htmlspecialchars($row['ttl'])."</td>
            <td>".htmlspecialchars($row['asal_sekolah'])."</td>
            <td>".htmlspecialchars($row['pekerjaan_ortu'])."</td>
            <td>$tempat_tes</td>
            <td>".($row['matematika']+0)."</td>
            <td>".($row['inggris']+0)."</td>
            <td>".($row['umum']+0)."</td>
            <td>".number_format($row['rata_rata'],2)."</td>
            <td>".htmlspecialchars($row['keterangan'])."</td>
        </tr>";
    }

    echo "</table>";

    echo "
    <div class='info'>
        <h3>Rekap Data:</h3>
        <p>Jumlah Pendaftar : <b>$jumlah_pendaftar</b></p>
        <p>Jumlah Peserta Lulus : <b>$jumlah_lulus</b></p>
        <p>Jumlah Tidak Lulus : <b>$jumlah_tidak_lulus</b></p>
    </div>
    ";

    echo "
    <div class='info'>
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata ≥ 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata < 60 = Tidak Lulus</li>
        </ul>
    </div>
    ";

    ?>

</div>

</body>
</html>