<?php
include 'db.php';

if (isset($_GET['id'])) {
    $emp_no = $_GET['id'];
    $result = $conn->query("SELECT * FROM employees WHERE emp_no='$emp_no'");
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_no = $_POST['emp_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $hire_date = $_POST['hire_date'];
    $birth_date = $_POST['birth_date'];

    $sql = "UPDATE employees SET 
            first_name='$first_name', last_name='$last_name', gender='$gender',
            birth_date='$birth_date', hire_date='$hire_date' 
            WHERE emp_no='$emp_no'";

    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>
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
    <h2>Edit Employee</h2>
    <form method="POST">
        <input type="hidden" name="emp_no" value="<?= $row['emp_no'] ?>">
        <label>First Name:</label><input type="text" name="first_name" value="<?= $row['first_name'] ?>" required>
        <label>Last Name:</label><input type="text" name="last_name" value="<?= $row['last_name'] ?>" required>
        <label>Gender:</label>
        <select name="gender" required>
            <option value="M" <?= $row['gender'] == 'M' ? 'selected' : '' ?>>Male</option>
            <option value="F" <?= $row['gender'] == 'F' ? 'selected' : '' ?>>Female</option>
        </select>
        <label>Birth Date:</label><input type="date" name="birth_date" value="<?= $row['birth_date'] ?>" required>
        <label>Hire Date:</label><input type="date" name="hire_date" value="<?= $row['hire_date'] ?>" required>
        <button type="submit">Update Employee</button>
        <a href="index.php">Back to List</a>
    </form>
</body>
</html>
