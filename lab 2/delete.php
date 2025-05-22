<?php
include 'db.php';

if (isset($_GET['id'])) {
    $emp_no = $_GET['id'];
    $sql = "DELETE FROM employees WHERE emp_no='$emp_no'";
    
    if ($conn->query($sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
