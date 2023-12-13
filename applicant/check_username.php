<?php
require_once '../database/connection.php';

// Check if the username already exists
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    
    $query = "SELECT * FROM applicant WHERE username = '$username'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        echo '<span style="color: red;">Username already exists!</span>';
    } else {
        echo '<span style="color: green;">Username available!</span>';
    }
}

$con->close();
?>
