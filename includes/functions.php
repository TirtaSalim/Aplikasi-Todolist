<?php
function getTasks($conn, $user_id) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>