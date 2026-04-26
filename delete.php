<?php
require 'db.php';
if(confirm("Are you sure you want to delete?")) {
    // proceed delete
}

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$id]);
}

?>
