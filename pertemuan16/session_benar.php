<?php
session_start();
$_SESSION['login'] = "admin";
?>
<html>
<head><title>Tes</title></head>
<body>
<?php echo "Hallo " . $_SESSION['login']; ?>
</body>
</html>