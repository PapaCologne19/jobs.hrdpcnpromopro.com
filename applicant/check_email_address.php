<?php
require_once '../database/connection.php';

// Check if the username already exists
if (isset($_POST['email_address'])) {
    $email_address = $_POST['email_address'];
    
    $query = "SELECT * FROM applicant WHERE email_address = '$email_address'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        echo '<span style="color: red;">Email Address is already exists!</span>';
    } else {
        echo '<span style="color: green;">Email Address is available!</span>';
    }
}

$con->close();
?>
