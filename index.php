<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>

    <style>
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

        .input-box {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn-delete {
            background-color: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-edit {
            background-color: green;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Student Records</h2>

    <!-- SEARCH INPUT (optional improvement) -->
    <input type="text" class="input-box" id="search" placeholder="Search name..." onkeyup="searchTable()">

    <!-- ADD STUDENT BUTTON -->
    <p>
        <a href="create.php" style="background:#007bff;color:white;padding:8px 12px;text-decoration:none;border-radius:5px;">
            + Add Student
        </a>
    </p>

    <table id="studentTable">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['course']) ?></td>
            <td>

                <a href="edit.php?id=<?= $s['id'] ?>" class="btn-edit">Edit</a>

               <a href="delete.php?delete_id=<?= $s['id'] ?>" 
   class="btn-delete"
   onclick="return confirm('Delete this record?')">
   Delete
</a>

            </td>
        </tr>
        <?php endforeach; ?>

    </table>

</div>


<script>
function searchTable() {
    let input = document.getElementById("search").value.toLowerCase();
    let rows = document.querySelectorAll("#studentTable tr");

    rows.forEach((row, index) => {
        if (index === 0) return;

        row.style.display = row.innerText.toLowerCase().includes(input)
            ? ""
            : "none";
    });
}
</script>

</body>
</html>