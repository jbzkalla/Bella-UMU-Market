<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<!-- Custom js -->
<script type="text/javascript" src="../js/phone_validation.js"></script>  <!-- Change new -->

	<title>Sign Up</title>
</head>
<body>

<?php include "header.php" ?>
<?php include "header2.php" ?>
<?php include "sidebar.php" ?>

<div class="section-wrapper" style="margin-top: 60px; margin-bottom: 100px;">
    <div class="text-center" style="margin-bottom: 40px;">
        <h1 style="color: #CE2626; font-weight: 800; font-size: 42px;">Join Bella UMU Market</h1>
        <p style="color: #F8A036; font-size: 18px;">The premier student marketplace for Uganda Martyrs University.</p>
    </div>

<form method="post" action="../login-system/register.php" class="sign_up_form" onsubmit="return phonenumber(this)" style="max-width: 600px; margin: 0 auto;">

  <div class="bella-card" style="padding: 40px;">
    
    <div style="display: flex; gap: 20px; justify-content: center; margin-bottom: 30px; background: #fafafa; padding: 15px; border-radius: 10px;">
        <label style="cursor: pointer; display: flex; align-items: center; gap: 8px;">
            <input type="radio" name="account_type" value="Personal" required checked> Personal
        </label>
        <label style="cursor: pointer; display: flex; align-items: center; gap: 8px;">
            <input type="radio" name="account_type" value="Business" required> Business
        </label>
    </div>

    <label class="form-label-modern">Full Name</label>
    <input class="form-input-modern" type="text" placeholder="Enter your full name" name="username" required>

    <label class="form-label-modern">Student Email</label>
    <input class="form-input-modern" type="email" placeholder="e.g. name@student.umu.ac.ug" name="email" required>

    <label class="form-label-modern">Mobile Number</label>
    <input class="form-input-modern" type="number" placeholder="Mobile Number" name="phone" required>

    <label class="form-label-modern" for="psw">Password</label>
    <input class="form-input-modern" type="password" placeholder="Create a strong password" id="psw" name="password" required>

    <label class="form-label-modern">Repeat Password</label>
    <input class="form-input-modern" type="password" placeholder="Repeat Password" name="rpt_password" required>

    <div style="display: flex; gap: 20px; margin-bottom: 30px; padding-left: 5px;">
        <label style="cursor: pointer; font-weight: 500;"><input type="radio" name="gender" value="Male" required> Male</label>
        <label style="cursor: pointer; font-weight: 500;"><input type="radio" name="gender" value="Female" required> Female</label>
        <label style="cursor: pointer; font-weight: 500;"><input type="radio" name="gender" value="Other" required> Other</label>
    </div>

    <div style="margin-bottom: 25px;">
        <label style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
            <input type="checkbox" checked="checked" required>
            <span style="font-size: 14px; color: #666; text-align: left;">
                I agree to the <a href="#" data-toggle="modal" data-target="#myModal" style="color: var(--primary); font-weight: 700;">Terms & Conditions</a> and privacy policy of Bella UMU Market.
            </span>
        </label>
    </div>

     <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 align="center" class="modal-title sign_up_form_model_header">Terms & Conditions</h4>
        </div>
        <div style="height:100%;" class="modal-body">
          <p style="font-size: 20px">By choosing “I agree” below you agree to Bella UMU Market's Terms of Service.<br>
<br>
You also agree to our Privacy Policy, which describes how we process your information within the University campus environment.
<br>
Data we process:
When you set up a Bella UMU Market Account, we store information you give us like your name, email address, student ID, and telephone number.<br>
This information is used strictly to facilitate student-to-student transactions at Uganda Martyrs University (Nkozi).
</p>
        </div>
        <div class="modal-footer">
          <button style="width: 20%" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Model End -->


    <div class="clearfix">
      <button class="btn btn-accent" type="submit" name="signupbtn" style="width: 100%; height: 55px; border-radius: 12px; font-weight: 800; font-size: 16px; text-transform: uppercase;">Complete Registration</button>
    </div>
  </div>
</form>
</div>



<?php include "footer.php" ?>

</body>
</html>