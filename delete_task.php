<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM tasks WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();

header("Location: dashboard.php");
?>