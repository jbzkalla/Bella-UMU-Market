<?php
/* Displays user information and some useful messages */

require '../login-system/db.php';

session_start();


	if(!isset($_SESSION['logged_in'])){
		$_SESSION['message'] = "You have to login first.";
			    header("location: error.php");

	}

	else{

	$email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    	$user = $result->fetch_assoc();

    if( $user['active'] == 0){
    	$message = "You have to activate your account first.";
		  echo "<script type='text/javascript'>alert('$message');</script>";
		  header("Refresh:0; url=profile.php");
    }

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Complete Profile | Buyer</title>
</head>
<body>
	
	<?php include "header.php" ?>
	<?php include "header2.php" ?>
	<?php include "sidebar.php" ?>

	<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
		<div class="text-center" style="margin-bottom: 40px;">
			<h1 style="color: #CE2626; font-weight: 800; font-size: 38px;">Complete Your Profile</h1>
			<p style="color: #666; font-size: 16px;">Update your personal details below</p>
		</div>

		<div class="bella-card" style="max-width: 600px; margin: 0 auto; padding: 40px;">
			<form method="" action="profile.php">
				
				<label class="form-label-modern">First name</label>
				<input class="form-input-modern" type="text" name="fName" placeholder="First name" required>
				
				<label class="form-label-modern">Last name</label>
				<input class="form-input-modern" type="text" name="lName" placeholder="Last name" required>
				
				<label class="form-label-modern">Address</label>
				<input class="form-input-modern" type="text" name="address" placeholder="Campus / Hostel Address" required>
				
				<label class="form-label-modern">Postal code</label>
				<input class="form-input-modern" type="number" name="Pcode" placeholder="Postal code" required>
				
				<button class="btn btn-accent" type="submit" name="cpbbtn" style="width: 100%; height: 50px; font-size: 16px; margin-top: 20px; font-weight: 800;"><i class="fa fa-save"></i> Save Profile Details</button>
			</form>
		</div>
	</div>


<?php include "footer.php" ?>



</body>
</html>