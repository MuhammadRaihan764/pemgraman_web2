<!DOCTYPE html>
<html>
<body>

<?php
// Ganti nilai variabel ini untuk mengetes hari yang berbeda
$hari = "Friday"; 

switch ($hari) {
    case "Wednesday":
        print("Rabu <br>");
        print("Seminar Launchig Window Vista di JHCC");
        break;

    case "Thrusday":
        print("Kamis <br>");
        print("Pertemuan dengan Mahasiswa");
        break;

    case "Friday":
        print("Jum'at <br>");
        print("Jogging bersama");
        break;

    default:
        print("Sabtu <br>");
        print("Survey harga ke Dusit, Mangga Dua");
        break;
}
?>

</body>
</html>