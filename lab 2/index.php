<?php
include 'db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Employee List</title>
    <style>
       body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f5f8fc; /* light blue/white background */
    color: #111;
    margin: 30px;
}

h2 {
    color: #003366;
}

form {
    margin-bottom: 20px;
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    max-width: 600px;
}

label {
    display: block;
    margin-top: 10px;
    color: #003366;
}

input[type="text"],
input[type="date"],
select {
    padding: 8px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 5px;
    box-sizing: border-box;
}

button, a.button {
    padding: 8px 14px;
    background-color: #003366;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 15px;
    display: inline-block;
}

button:hover, a.button:hover {
    background-color: #00509e;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: white;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

th {
    background-color: #003366;
    color: white;
}

td a {
    color: #0056b3;
    margin-right: 8px;
    text-decoration: none;
}

td a:hover {
    text-decoration: underline;
    color: #003366;
}

a {
    color: #003366;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <h2>Employee List</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="Search by name" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Search</button>
        <a class="button" href="create.php">Add Employee</a>
    </form>

    <table>
        <tr>
            <th>Emp No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Hire Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['emp_no'] ?></td>
                <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
                <td><?= $row['gender'] ?></td>
                <td><?= $row['hire_date'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['emp_no'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $row['emp_no'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
