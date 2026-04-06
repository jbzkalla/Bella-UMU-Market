<?php
/* Backend script for secure Administrative operations */
session_start();
require "db.php";

// Strict authorization check
if (!isset($_SESSION['logged_in']) || $_SESSION['account_type'] != 'Admin') {
    $_SESSION['message'] = "Unauthorized access attempt blocked.";
    header("location: error.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $action = $_POST['action_type'];

    if ($action == "delete_user") {
        $target_email = $mysqli->escape_string($_POST['user_email']);
        
        // Target admin accounts cannot be deleted here to prevent lockout
        $check_admin = $mysqli->query("SELECT * FROM admin WHERE email='$target_email'");
        if($check_admin->num_rows > 0) {
            echo "<script>alert('Cannot delete administrative accounts directly.'); window.location.href='../source/admin_dashboard.php';</script>";
            exit();
        }

        // Apply cascaded wipe 
        $mysqli->query("DELETE FROM users WHERE email='$target_email'");
        $mysqli->query("DELETE FROM store WHERE email='$target_email'");
        $mysqli->query("DELETE FROM sellerinfo WHERE email='$target_email'");
        $mysqli->query("DELETE FROM productlist WHERE email='$target_email'");
        $mysqli->query("DELETE FROM comment WHERE email='$target_email'");

        header("location: ../source/admin_dashboard.php");
        exit();
    }

    if ($action == "delete_product") {
        $target_pid = (int)$_POST['product_id'];
        
        $mysqli->query("DELETE FROM productlist WHERE id='$target_pid'");
        
        header("location: ../source/admin_dashboard.php");
        exit();
    }

    if ($action == "edit_user") {
        $original_email = $mysqli->escape_string($_POST['user_original_email']);
        $new_name = $mysqli->escape_string($_POST['user_name']);
        $new_email = $mysqli->escape_string($_POST['user_email']);
        $new_phone = $mysqli->escape_string($_POST['user_phone']);

        $mysqli->query("UPDATE users SET name='$new_name', email='$new_email', phone='$new_phone' WHERE email='$original_email'");

        // If email was changed, cascade it to the other tables
        if ($original_email !== $new_email) {
            $mysqli->query("UPDATE store SET email='$new_email' WHERE email='$original_email'");
            $mysqli->query("UPDATE sellerinfo SET email='$new_email' WHERE email='$original_email'");
            $mysqli->query("UPDATE productlist SET email='$new_email' WHERE email='$original_email'");
        }

        header("location: ../source/admin_dashboard.php");
        exit();
    }

    if ($action == "edit_product") {
        $target_pid = (int)$_POST['product_id'];
        $new_name = $mysqli->escape_string($_POST['product_name']);
        $new_price = (int)$_POST['product_price'];
        $new_quantity = (int)$_POST['product_quantity'];

        $mysqli->query("UPDATE productlist SET productName='$new_name', price='$new_price', quantity='$new_quantity' WHERE id='$target_pid'");

        header("location: ../source/admin_dashboard.php");
        exit();
    }
    if ($action == "activate_user") {
        $target_email = $mysqli->escape_string($_POST['user_email']);
        $mysqli->query("UPDATE users SET active=1 WHERE email='$target_email'");
        header("location: ../source/admin_dashboard.php");
        exit();
    }

    if ($action == "deactivate_user") {
        $target_email = $mysqli->escape_string($_POST['user_email']);
        $mysqli->query("UPDATE users SET active=0 WHERE email='$target_email'");
        header("location: ../source/admin_dashboard.php");
        exit();
    }

    if ($action == "bulk_deactivate") {
        if (isset($_POST['bulk_emails']) && is_array($_POST['bulk_emails'])) {
            foreach ($_POST['bulk_emails'] as $email) {
                $safe_email = $mysqli->escape_string($email);
                // Admin safety check
                $check_admin = $mysqli->query("SELECT * FROM admin WHERE email='$safe_email'");
                if ($check_admin->num_rows == 0) {
                    $mysqli->query("UPDATE users SET active=0 WHERE email='$safe_email'");
                }
            }
        }
        header("location: ../source/admin_dashboard.php");
        exit();
    }
}
?>
