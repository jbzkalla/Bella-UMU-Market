<?php if(!isset($_SESSION)) session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript" src="../js/phone_validation.js"></script>



    <style>

        .container{
            max-width: 600px;
            border: 1px solid gray;
            border-radius: 10px;
            padding: 40px;
            margin-top: 50px;
            margin-bottom: 15px;
        }

        .msg{
            margin: 30px auto;
            padding: 10px;
            border-radius: 5px;
            color: #3c763d;
            background: #dff0d8;
            border: 1px solid #3c763d;
            width: 50%;
            text-align: center;
        }

        /*li{*/
        /*font-family: 'Lobster', cursive;*/
        /*}*/
    </style>

</head>
<body>
<?php include "header.php" ?>
        <?php include "sidebar.php" ?>


    <div class="section-wrapper text-center" style="margin-top: 50px; margin-bottom: 30px;">
        <h1 class="page-title" style="font-size: 38px;">Payment Information</h1>
        <p style="color: #666; font-size: 16px;">Please enter your credit card and delivery information below securely.</p>
    </div>

    <?php if(isset($_SESSION['msg'])): ?>
        <div class="msg" style="margin: 0 auto 30px; text-align: center; max-width: 600px;">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif; ?>

    <div class="bella-card" style="max-width: 600px; margin: 0 auto 80px; padding: 40px; text-align: left;">
        <form method="POST" action="../seller/storeDeliveryInfo.php" onsubmit="return !!(phonenumber(this) && validateCardNumber(this) && cardname(this) && delname(this) && scode(this) && expiry(this))">
            
            <div class="form-group mb-4 text-center">
                <label style="font-weight: 700; color: var(--primary); font-size: 16px; margin-bottom: 10px; display: block;">Credit cards accepted</label>
                <div style="font-size: 30px; color: #555; display: inline-flex; gap: 20px; border: 1px solid #eee; padding: 15px 25px; border-radius: 12px; background: #fafafa;">
                    <label style="cursor: pointer;"><input type="radio" name="card" value="visa" required style="margin-right: 5px;"> <i class="fa fa-cc-visa" style="color: #1a1f71;"></i></label>
                    <label style="cursor: pointer;"><input type="radio" name="card" value="master" required style="margin-right: 5px;"> <i class="fa fa-cc-mastercard" style="color: #eb001b;"></i></label>
                    <label style="cursor: pointer;"><input type="radio" name="card" value="amex" required style="margin-right: 5px;"> <i class="fa fa-cc-amex" style="color: #2e77bc;"></i></label>
                    <label style="cursor: pointer;"><input type="radio" name="card" value="discover" required style="margin-right: 5px;"> <i class="fa fa-cc-discover" style="color: #ff6000;"></i></label>
                </div>
            </div>

            <div class="form-group mb-3">
                <label style="font-weight: 600; color: var(--text);">Card Number</label>
                <input class="form-control" type="number" name="cardNumber" placeholder="0000 0000 0000 0000" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
            </div>

            <div class="form-group mb-4">
                <label style="font-weight: 600; color: var(--text);">Name On Card</label>
                <input class="form-control" type="text" name="holderName" placeholder="JOHN DOE" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
            </div>

            <div class="row mb-4">
                <div class="col-md-6 form-group">
                    <label style="font-weight: 600; color: var(--text);">Expiry (MM/YYYY)</label>
                    <input type="text" class="form-control" name="expiryDate" placeholder="12/2026" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
                </div>
                <div class="col-md-6 form-group">
                    <label style="font-weight: 600; color: var(--text);">CVV (3 digits)</label>
                    <input class="form-control" type="number" name="sCode" placeholder="123" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
                </div>
            </div>

            <hr style="margin: 30px 0; border-top: 1px dashed #ccc;">

            <div class="form-group mb-3">
                <label style="font-weight: 600; color: var(--text);">Full Name</label>
                <input class="form-control" type="text" name="name" placeholder="E.g. Jane Smith" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
            </div>

            <div class="row mb-3">
                <div class="col-md-6 form-group">
                    <label style="font-weight: 600; color: var(--text);">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="student@umu.ac.ug" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
                </div>
                <div class="col-md-6 form-group">
                    <label style="font-weight: 600; color: var(--text);">Phone Number</label>
                    <input class="form-control" type="number" name="phone" placeholder="07XXXXXXXX" required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd;">
                </div>
            </div>

            <div class="form-group mb-4">
                <label style="font-weight: 600; color: var(--text);">Delivery Address</label>
                <textarea name="deliAddress" class="form-control" cols="50" rows="3" placeholder="Enter your detailed hostel or campus address..." required style="border-radius: 8px; padding: 12px; border: 1px solid #ddd; background: #fdfdfd; resize: vertical;"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-accent" style="width: 100%; border-radius: 10px; padding: 15px; font-weight: 800; font-size: 18px; display: flex; align-items: center; justify-content: center; gap: 10px;">
                <i class="fa fa-lock"></i> Submit Secure Payment
            </button>
        </form>
    </div>

    <!-- Ensure footer renders exactly like other pages -->
    <?php include "footer.php" ?>
</body>
</html>