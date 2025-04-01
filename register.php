<?php
include 'includes/auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Daftar</h1>

<hr>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="register">Daftar</button>
    </form>
    <a href="login.php">Sudah punya akun? Login disini</a>
</body>
</html>