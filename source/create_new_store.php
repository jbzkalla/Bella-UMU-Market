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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

	<title>Creating new store</title>
</head>
<body>

	<?php include "header.php" ?>
		<?php include "sidebar.php" ?>

	<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
		<div class="bella-card" style="max-width: 600px; margin: 0 auto; padding: 50px 40px; text-align: center;">
			<div style="font-size: 50px; color: var(--primary); margin-bottom: 20px;">
				<i class="fa fa-shopping-bag"></i>
			</div>
			<h2 style="color: #CE2626; font-weight: 800; font-size: 32px; margin-bottom: 15px;">Name Your Store</h2>
			<p style="color: #666; font-size: 16px; margin-bottom: 30px; line-height: 1.6;">
				Choose a unique name for your new store. This name will be displayed to customers and used across your seller dashboard.
			</p>

			<form method="post" action="../login-system/store-register.php">
				<div class="form-group" style="text-align: left; margin-bottom: 25px;">
					<label class="form-label-modern" style="justify-content: center;">Store Name</label>
					<input class="form-input-modern text-center" type="text" name="store_name" placeholder="E.g., Campus Bookstore" required style="font-size: 18px; font-weight: 600; padding: 15px;">
				</div>
				<button type="submit" class="btn btn-accent" style="width: 100%; padding: 15px; font-size: 18px; font-weight: 800; border-radius: 12px;">Create My Store <i class="fa fa-arrow-right" style="margin-left: 10px;"></i></button>
			</form>
		</div>
	</div>

<?php include "footer.php" ?>



</body>
</html>