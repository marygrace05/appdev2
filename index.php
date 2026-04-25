<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Actions</th>
    </tr>
    <?php foreach ($students as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= htmlspecialchars($s['name']) ?></td>
        <td><?= htmlspecialchars($s['email']) ?></td>
        <td><?= htmlspecialchars($s['course']) ?></td>
        <td>
            <a href="edit.php?id=<?= $s['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $s['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <a href="index.php?delete_id=<?php echo $row['id']; ?>" 
   class="btn btn-delete"
   onclick="return confirm('Are you sure?')">
   Delete
</a>
</table>
<div class="container">
    <h2>Student Records</h2>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
}

.container {
    width: 80%;
    margin: 40px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
}

/* Table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th {
    background-color: #007bff;
    color: white;
    padding: 10px;
}

table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

/* Hover effect */
table tr:hover {
    background-color: #f1f1f1;
}
.btn {
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 14px;
}

.btn-delete {
    background-color: #dc3545;
}

.btn-delete:hover {
    background-color: #c82333;
}

.btn-edit {
    background-color: #28a745;
}

.btn-edit:hover {
    background-color: #218838;
}
