<?php 
if(!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

  <title>Admin Login</title>
</head>
<body>

    <?php include "header.php" ?>
    <?php include "header2.php" ?>
    <?php include "sidebar.php" ?>

<!-- Sign In form start -->
<div class="form-container-modern" style="margin-top: 60px; margin-bottom: 100px;">
    <div class="text-center" style="margin-bottom: 30px;">
        <h1 style="color: #CE2626; font-weight: 800; font-size: 38px;">Admin Portal Login</h1>
        <p style="color: #666; font-size: 16px;">Access backend administration</p>
    </div>

    <div class="bella-card" style="padding: 40px; border-top: 5px solid #333;">
        <form action="../login-system/admin_login_action.php" method="POST">
            <label class="form-label-modern">Admin Email Address</label>
            <input class="form-input-modern" type="email" placeholder="e.g. admin@student.umu.ac.ug" name="email" required>

            <label class="form-label-modern">Admin Password</label>
            <input class="form-input-modern" type="password" placeholder="Enter administrative password" name="password" required>

            <button class="btn-accent" type="submit" style="width: 100%; height: 50px; font-size: 16px; margin-top: 15px; margin-bottom: 10px; background-color: #333; border-color: #333;">Log Into Admin Control</button>
        </form>

        <div style="text-align: center; margin-top: 25px; border-top: 1px solid #f0f0f0; padding-top: 25px;">
            <a href="signIn.php" style="color: #666; font-weight: 700; font-size: 14px; text-decoration: none;">&larr; Back to Regular Login</a>
        </div>
    </div>
</div>
<!-- Sign In form End -->

<?php include "footer.php" ?>

</body>
</html>
