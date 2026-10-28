<?php
$con = mysqli_connect("localhost", "root", "", "lat_dbase");
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

mysqli_query($con, "UPDATE tbl_mhs SET Age = '37'
WHERE FirstName = 'Glenn' AND LastName = 'Gandari'");

mysqli_close($con);
?>