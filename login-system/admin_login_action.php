<?php
session_start();
require "db.php";

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM admin WHERE email='$email'");

if ( $result->num_rows == 0 ){ 
    $_SESSION['message'] = "Admin user with that email doesn't exist!";
    header("location: error.php");
} else { 
    $user = $result->fetch_assoc();
    // The admin passwords from your DB dump were plain-text so we do a direct match
    if ($_POST['password'] == $user['password']) {
        $_SESSION['email'] = $user['email'];
        $_SESSION['UserName'] = $user['name'];
        $_SESSION['account_type'] = 'Admin';
        $_SESSION['logged_in'] = 1;
        header("location: ../source/admin_dashboard.php");
    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
?>
