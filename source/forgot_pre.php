
<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<?php include "header.php" ?>
	<?php include "header2.php" ?>

<div class="form-container-modern" style="margin-top: 60px; margin-bottom: 100px;">
    <div class="text-center" style="margin-bottom: 30px;">
        <h1 style="color: #CE2626; font-weight: 800; font-size: 38px;">Reset Password</h1>
        <p style="color: #666; font-size: 16px;">We'll sent you instructions to your email</p>
    </div>

    <div class="bella-card" style="padding: 40px;">
        <form action="../login-system/forgot.php" method="POST">
            <label class="form-label-modern">Student E-mail</label>
            <input class="form-input-modern" type="email" placeholder="Enter your registered email address" name="email" required>

            <button class="btn-accent" type="submit" style="width: 100%; height: 50px; font-size: 16px; margin-top: 10px;">Send Reset Link</button>
        </form>

        <div style="text-align: center; margin-top: 25px; border-top: 1px solid #f0f0f0; padding-top: 20px;">
            <a href="signIn.php" style="color: var(--primary); font-weight: 700; text-decoration: none;"><i class="fa fa-arrow-left"></i> Back to Login</a>
        </div>
    </div>
</div>

	<?php include "footer.php" ?>


</body>
</html>