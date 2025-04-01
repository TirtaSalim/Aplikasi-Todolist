<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (title, user_id) VALUES (:title, :user_id)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Tambah Tugas</h1>
    <form method="POST">
        <label for="title">Judul Tugas:</label>
        <input type="text" name="title" required>
        <button type="submit">Tambah</button>
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>