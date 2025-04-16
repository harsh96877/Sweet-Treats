<!-- login.php -->
<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === "admin" && $pass === "secret123") {
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Sweet Treats</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <header><h1>Admin Login</h1></header>
    <main style="text-align:center;">
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Login"><br><br>
            <p style="color:red;"><?php echo $error; ?></p>
        </form>
    </main>
</body>
</html>
