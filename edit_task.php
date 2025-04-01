<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];

    $stmt = $conn->prepare("UPDATE tasks SET title = :title WHERE id = :id");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: dashboard.php");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$task = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tugas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Edit Tugas</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <label for="title">Judul Tugas:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="dashboard.php">Kembali ke Dashboard</a>
</body>
</html>