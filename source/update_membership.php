<?php
require '../login-system/db.php';
session_start();

if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in before upgrading your membership!";
    header("location: ../login-system/error.php");    
    exit();
}

if(isset($_POST['plan'])){
    $plan = $mysqli->escape_string($_POST['plan']);
    $email = $_SESSION['email'];
    
    // Valid plans
    $valid_plans = ['Free', 'Basic', 'Plus'];
    
    if(in_array($plan, $valid_plans)){
        $query = "UPDATE users SET membership_plan='$plan' WHERE email='$email'";
        if($mysqli->query($query)){
            $_SESSION['message'] = "Your membership has been successfully updated to $plan!";
        } else {
            $_SESSION['message'] = "Database error: Could not update membership.";
        }
    } else {
        $_SESSION['message'] = "Invalid membership plan selected.";
    }
}

header("location: member_plane.php");
?>
