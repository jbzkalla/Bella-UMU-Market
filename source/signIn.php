<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">



  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Sign In</title>
</head>
<body>

    <?php include "header.php" ?>
    <?php include "header2.php" ?>
      <?php include "sidebar.php" ?>

<!-- Sign In form start -->
<div class="form-container-modern" style="margin-top: 60px; margin-bottom: 100px;">
    <div class="text-center" style="margin-bottom: 30px;">
        <h1 style="color: #CE2626; font-weight: 800; font-size: 38px;">Login to Bella UMU Market</h1>
        <p style="color: #666; font-size: 16px;">Access your student marketplace account</p>
    </div>

    <div class="bella-card" style="padding: 40px;">
        <form action="../login-system/login.php" method="POST" id="login">
            <label class="form-label-modern">E-mail Address</label>
            <input class="form-input-modern" type="email" placeholder="e.g. name@student.umu.ac.ug" name="email" required>

            <label class="form-label-modern">Password</label>
            <input class="form-input-modern" type="password" placeholder="Enter your secret password" name="password" required>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                <label style="cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 500; font-size: 14px; margin-bottom: 0;">
                    <input type="checkbox" checked="checked"> Remember me
                </label>
                <a href="forgot_pre.php" style="color: #CE2626; font-weight: 700; font-size: 14px; text-decoration: none;">Forgot Password?</a>
            </div>

            <button class="btn-accent" type="submit" style="width: 100%; height: 50px; font-size: 16px; margin-bottom: 10px;">Sign In</button>
        </form>

        <div style="text-align: center; margin-top: 25px; border-top: 1px solid #f0f0f0; padding-top: 25px;">
            <p style="color: #666; margin-bottom: 15px;">New to the marketplace?</p>
            <a href="signUp.php" class="btn" style="width: 100%; height: 50px; background-color: white; border: 2.5px solid var(--primary); border-radius: 50px; color: var(--primary); font-weight: 800; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease; margin-bottom: 15px;">Create Student Account</a>
            
            <a href="admin_login.php" class="btn" style="width: 100%; height: 50px; background-color: #F8A036; border: 2.5px solid #F8A036; border-radius: 50px; color: white; font-weight: 800; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.3s ease;"><i class="fa fa-lock" style="margin-right: 8px;"></i> Administrator Portal</a>
        </div>
    </div>
</div>
<!-- Sign In form End -->



<?php include "footer.php" ?>


</body>
</html>