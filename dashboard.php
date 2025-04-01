<?php
session_start();
include 'includes/db.php';
include 'includes/functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$user_id = $_SESSION['user_id'];
$tasks = getTasks($conn, $user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div>  <h1>Dashboard</h1> </div>

    <hr>
    <a href="add_task.php">Tambah Tugas</a>
    <a href="logout.php">Logout</a>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php echo htmlspecialchars($task['title']); ?>
                <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a>
                <a href="delete_task.php?id=<?php echo $task['id']; ?>">Hapus</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>