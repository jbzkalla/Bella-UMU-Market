<?php
/* Displays user information and some useful messages */

if(!isset($_SESSION)) session_start();

require ('../login-system/db.php');


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] == 0 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Redirect Admins away from the user profile to their own dashboard
    if (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'Admin') {
        header("location: admin_dashboard.php");
        exit();
    }

    // Makes it easier to read
    $user_name = isset($_SESSION['UserName']) ? $_SESSION['UserName'] : '';
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
    $active = isset($_SESSION['active']) ? $_SESSION['active'] : 1;
    $account_type = isset($_SESSION['account_type']) ? $_SESSION['account_type'] : 'Personal';

    $result = $mysqli->query("SELECT * FROM sellerinfo WHERE email='$email'");
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome <?= htmlspecialchars($user_name) ?></title>
  
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <?php include "header.php" ?>
    <?php include "header2.php" ?>
    <?php include "sidebar.php" ?>

    <div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
        
        <p>
          <?php 
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo '<div class="alert alert-info text-center" style="max-width: 600px; margin: 0 auto 20px;">'.$_SESSION['message'].'</div>';
              unset( $_SESSION['message'] );
          }
          ?>
          </p>
          
          <?php
          if ( !$active ){
              echo
              '<div class="alert alert-warning text-center" style="max-width: 600px; margin: 0 auto 20px;">
              Account is unverified, please confirm your email by clicking on the email link!
              </div>';
          }
          ?>

          <div class="bella-card" style="max-width: 600px; margin: 0 auto; padding: 50px 30px; text-align: center; position: relative;">
            
            <div style="position: absolute; top: 20px; right: 20px; display: flex; gap: 10px;">
                <?php if (($_SESSION['account_type'])== 'Business') :?>
                  <a href="cp_seller.php" class="btn btn-primary" style="border-radius: 8px; font-weight: 700; padding: 6px 15px;"><i class="fa fa-pencil"></i> Edit</a>
                <?php endif; ?>

                <?php if (($_SESSION['account_type'])== 'Personal') :?>
                  <a href="cp_buyer.php" class="btn btn-primary" style="border-radius: 8px; font-weight: 700; padding: 6px 15px;"><i class="fa fa-pencil"></i> Edit</a>
                <?php endif; ?>
            </div>

            <div style="margin-bottom: 25px;">
                <?php if (($_SESSION['account_type'])== 'Personal') :?>
                     <img style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--primary); padding: 5px;" src="../images/car.jpg">
                <?php endif; ?>

                <?php if (($_SESSION['account_type'])== 'Business') :?>
                    <?php echo "<img style=\"width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid var(--primary); padding: 5px;\" src='../seller/sellerPic/".$user['seller_photo']."'>"; ?>
                <?php endif; ?>
            </div>

            <h2 style="font-weight: 800; color: var(--text); margin-bottom: 5px;"><?php echo $user_name; ?></h2>
            <p style="color: #666; font-size: 16px; margin-bottom: 30px;"><?= $email ?></p>
          
            <?php $_SESSION['email'] = $email ?>
            
            <div style="display: flex; gap: 15px; justify-content: center; margin-top: 20px;">
                <?php if (($_SESSION['account_type'])== 'Business') :?>
                  <a href="new_store_description.php" class="btn btn-primary" style="border-radius: 10px; font-weight: 700; padding: 12px 30px; <?= ($active == '0') ? 'pointer-events: none; opacity: 0.6;' : '' ?>"><i class="fa fa-shopping-bag"></i> Go to store</a>
                <?php endif; ?>

                <a href="../login-system/delete.php" onclick="return confirm_delete()" class="btn btn-accent" style="border-radius: 10px; font-weight: 700; padding: 12px 30px;"><i class="fa fa-trash"></i> Delete Account</a>
            </div>

          </div>
      </div>
    
    <?php include "footer.php" ?>


<script>
  
  function confirm_delete(){
        return confirm("Are you sure you want to permanently delete this data?");
    }

</script>

</body>
</html>
