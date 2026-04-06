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


	<title>Membership Plane| Seller</title>
</head>
<body>

	<?php include "header.php" ?>
	<?php include "sidebar.php" ?>

	<?php
	require '../login-system/db.php';
	if(!isset($_SESSION)) session_start();
	$current_plan = 'Free'; // Default
	if(isset($_SESSION['email'])){
		$email = $_SESSION['email'];
		$result = $mysqli->query("SELECT membership_plan FROM users WHERE email='$email'");
		if($result && $result->num_rows > 0){
			$user = $result->fetch_assoc();
			$current_plan = $user['membership_plan'] ?: 'Free';
		}
	}
	?>
	<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
		<?php if(isset($_SESSION['message'])): ?>
			<div class="alert alert-success text-center" style="max-width: 800px; margin: 0 auto 20px;">
				<?= $_SESSION['message'] ?>
			</div>
			<?php unset($_SESSION['message']); ?>
		<?php endif; ?>
		<div class="bella-card" style="max-width: 800px; margin: 0 auto; padding: 0; overflow: hidden; border-radius: 12px; border: 1px solid #e0e0e0; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
			
			<div style="background: #CE2626; padding: 15px; text-align: center;">
				<h3 style="color: white; margin: 0; font-weight: 600; font-size: 22px;">Membership Plan</h3>
			</div>

			<table style="width: 100%; border-collapse: collapse; text-align: center; font-size: 16px;">
				<tr style="border-bottom: 1px solid #e0e0e0;">
					<th style="width: 33.33%; padding: 20px; border-right: 1px solid #e0e0e0; text-align: left;">
						<div style="color: #F8A036; font-size: 24px; font-weight: 700; margin-bottom: 5px;">Free</div>
						<div style="color: #F8A036; font-size: 20px; font-weight: 700; margin-bottom: 5px;">USH 0</div>
						<div style="color: #F8A036; font-size: 20px; font-weight: 700;">per month</div>
					</th>
					<th style="width: 33.33%; padding: 20px; border-right: 1px solid #e0e0e0; text-align: left;">
						<div style="color: #F8A036; font-size: 24px; font-weight: 700; margin-bottom: 5px;">Basic</div>
						<div style="color: #F8A036; font-size: 20px; font-weight: 700; margin-bottom: 5px;">USH 100,000</div>
						<div style="color: #F8A036; font-size: 20px; font-weight: 700;">per month</div>
					</th>
					<th style="width: 33.33%; padding: 20px; text-align: left;">
						<div style="color: #F8A036; font-size: 24px; font-weight: 700; margin-bottom: 5px;">Plus</div>
						<div style="color: #F8A036; font-size: 20px; font-weight: 700; margin-bottom: 5px;">USH 250,000</div>
						<div style="color: #F8A036; font-size: 20px; font-weight: 700;">per month</div>
					</th>
				</tr>
				<tr>
					<td style="padding: 20px; vertical-align: top; border-right: 1px solid #e0e0e0;">
						<div style="line-height: 1.8; color: #333; margin-bottom: 25px;">
							Limited<br>Limited<br>Limited<br>Limited<br>Limited<br>Limited<br>Limited<br>Limited
						</div>
						<form method="POST" action="update_membership.php">
							<input type="hidden" name="plan" value="Free">
							<?php if($current_plan == 'Free'): ?>
								<button type="button" class="btn" style="background: #28a745; color: white; border-radius: 20px; padding: 6px 25px; font-weight: 600; font-size: 18px; cursor: default;">Current Plan</button>
							<?php else: ?>
								<button type="submit" class="btn" style="background: #F8A036; color: white; border-radius: 20px; padding: 6px 25px; font-weight: 600; font-size: 18px;">Select Plan</button>
							<?php endif; ?>
						</form>
					</td>
					<td style="padding: 20px; vertical-align: top; border-right: 1px solid #e0e0e0;">
						<div style="line-height: 1.8; color: #333; margin-bottom: 25px;">
							Unlimited<br>Unlimited<br>Unlimited<br>Unlimited<br>Limited<br>Limited<br>Limited<br>Limited
						</div>
						<form method="POST" action="update_membership.php">
							<input type="hidden" name="plan" value="Basic">
							<?php if($current_plan == 'Basic'): ?>
								<button type="button" class="btn" style="background: #28a745; color: white; border-radius: 20px; padding: 6px 25px; font-weight: 600; font-size: 18px; cursor: default;">Current Plan</button>
							<?php else: ?>
								<button type="submit" class="btn" style="background: #F8A036; color: white; border-radius: 20px; padding: 6px 25px; font-weight: 600; font-size: 18px;">Select Plan</button>
							<?php endif; ?>
						</form>
					</td>
					<td style="padding: 20px; vertical-align: top;">
						<div style="line-height: 1.8; color: #333; margin-bottom: 25px;">
							Unlimited<br>Unlimited<br>Unlimited<br>Unlimited<br>Unlimited<br>Unlimited<br>Unlimited<br>Unlimited
						</div>
						<form method="POST" action="update_membership.php">
							<input type="hidden" name="plan" value="Plus">
							<?php if($current_plan == 'Plus'): ?>
								<button type="button" class="btn" style="background: #28a745; color: white; border-radius: 20px; padding: 6px 25px; font-weight: 600; font-size: 18px; cursor: default;">Current Plan</button>
							<?php else: ?>
								<button type="submit" class="btn" style="background: #F8A036; color: white; border-radius: 20px; padding: 6px 25px; font-weight: 600; font-size: 18px;">Select Plan</button>
							<?php endif; ?>
						</form>
					</td>
				</tr>
			</table>
		</div>
	</div>


<!-- Address info start -->																		
<?php include "address.php" ?>	
<!-- Address info end -->

<?php include "footer.php" ?>

</body>
</html>