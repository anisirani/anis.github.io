<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_no = $_POST['emp_no'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $hire_date = $_POST['hire_date'];
    $birth_date = $_POST['birth_date'];

    $sql = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) 
            VALUES ('$emp_no', '$birth_date', '$first_name', '$last_name', '$gender', '$hire_date')";

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
    <title>Add Employee</title>
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
    <h2>Add Employee</h2>
    <form method="POST">
        <label>Emp No:</label><input type="text" name="emp_no" required>
        <label>First Name:</label><input type="text" name="first_name" required>
        <label>Last Name:</label><input type="text" name="last_name" required>
        <label>Gender:</label>
        <select name="gender" required>
            <option value="M">Male</option>
            <option value="F">Female</option>
        </select>
        <label>Birth Date:</label><input type="date" name="birth_date" required>
        <label>Hire Date:</label><input type="date" name="hire_date" required>
        <button type="submit">Add Employee</button>
        <a href="index.php">Back to List</a>
    </form>
</body>
</html>
