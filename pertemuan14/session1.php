<?php
session_start();

$error = "";

if (isset($_POST['Login'])) {
    $user = $_POST['user'] ?? "";
    $pass = $_POST['pass'] ?? "";

    // gunakan === untuk membandingkan, bukan =
    if ($user === "rahadian" && $pass === "123") {
        $_SESSION['login'] = $user;

        echo "<h1>Anda berhasil LOGIN</h1>";
        echo "<h2>Klik <a href='session2.php'>di sini (session2.php)</a> untuk menuju ke halaman pemeriksaan session</h2>";
        exit;
    }
    $error = "Username atau password salah!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login here...</title>
</head>
<body>
    <form action="" method="post">
        <h2>Login Here...</h2>
        <?php if ($error): ?>
            <p style="color:red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        Username : <input type="text" name="user"><br>
        Password : <input type="password" name="pass"><br>
        <input type="submit" name="Login" value="Log In">
    </form>
</body>
</html>