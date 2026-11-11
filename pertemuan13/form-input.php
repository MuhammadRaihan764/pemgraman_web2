<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
    <style>
        table { font-family: Verdana, Arial, sans-serif; font-size: 12px; }
        input, select { font-size: 12px; height: 22px; }
    </style>
</head>
<body>
<form action="action-input-data.php" method="POST" name="form-input-data">
    <table width="760" align="center" cellpadding="0" cellspacing="0">
        <tr height="46">
            <td width="10%"></td>
            <td width="25%"></td>
            <td width="65%"><font color="orange" size="2">Form Input Data Mahasiswa</font></td>
        </tr>
        <tr height="46">
            <td></td>
            <td>ID Mahasiswa / NIM</td>
            <td><input type="text" name="id_mahasiswa" size="35" maxlength="15"></td>
        </tr>
        <tr height="46">
            <td></td>
            <td>Nama</td>
            <td><input type="text" name="nama" size="50" maxlength="30"></td>
        </tr>
        <tr height="46">
            <td></td>
            <td>Jurusan</td>
            <td>
                <select name="jurusan">
                    <option value="-">- Pilih Jurusan -</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Teknik Mesin">Teknik Mesin</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Komputer Akuntansi">Komputer Akuntansi</option>
                </select>
            </td>
        </tr>
        <tr height="46">
            <td></td>
            <td>Alamat</td>
            <td><input type="text" name="alamat" size="50" maxlength="30"></td>
        </tr>
        <tr height="46">
            <td></td>
            <td>No. Telp</td>
            <td><input type="text" name="telepon" size="20" maxlength="12"></td>
        </tr>
        <tr height="46">
            <td></td>
            <td></td>
            <td>
                <input type="submit" name="Submit" value="Submit">
                <input type="reset" name="reset" value="Cancel">
            </td>
        </tr>
    </table>
</form>
</body>
</html>