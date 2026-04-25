<?php
require 'db.php';

if (isset($_GET['delete_id']) && !empty($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit();

} else {
    header("Location: index.php");
    exit();
}