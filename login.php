<?php
session_start();

$hashed_password = md5("mhs");
if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] === "sulthan" && md5($_POST['password']) === $hashed_password) {
        $_SESSION['loggedin'] = true;
        setcookie("user", "sulthan", time() + (86400 * 30), "/");
        header("Location: krs_mhs.php");
        exit;
    } else {
        $error_message = "Username atau Password salah!";
    }
}

include "header.php";
?>

<form action="login.php" method="post">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>

<?php
if (isset($error_message)) {
    echo "<p style='color:red;'>$error_message</p>";
}
