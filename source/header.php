<?php

if(!isset($_SESSION)) session_start();

$userName="Sign In";
$register="Create Account";

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
  if(isset($_SESSION["active"]) && $_SESSION["active"] == 0) {
    $userName=$_SESSION['UserName']." (not active)";
  } else {
    $userName=$_SESSION['UserName'];
  }
}
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_unset();
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- new added -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  


<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  .navbar-inverse {
    background-color: var(--primary) !important;
    border: none;
    border-radius: 0;
  }
  .navbar-inverse .navbar-nav > li > a {
    color: white !important;
  }
  .navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: white !important;
    padding-top: 15px;
  }
  .img:hover{
    opacity: 0.8;
  }
</style>
</head>
<body>


<nav class="navbar-inverse" style="padding: 0;">
  <div class="container-fluid" style="display: flex; align-items: center; flex-wrap: nowrap; padding: 8px 15px;">
    
    <!-- Logo -->
    <a class="navbar-brand" href="index.php" style="padding: 0; margin: 0; height: auto; flex-shrink: 0;">
      <div class="bella-logo-wrapper">
        <div class="logo-text">
          <span class="bella">Bella UMU</span>
          <span class="market">Market</span>
        </div>
      </div>
    </a>

    <!-- Home Link -->
    <a href="index.php" style="color: white; font-weight: 700; padding: 8px 12px; text-decoration: none; white-space: nowrap; flex-shrink: 0;">
      <span class="glyphicon glyphicon-home"></span> Home
    </a>

    <!-- Search Bar -->
    <form action="search.php" method="GET" style="flex: 1; max-width: 350px; margin: 0 10px;">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search products..." name="searchQuery" id="searchQuery" style="border-radius: 20px 0 0 20px; border: none; height: 36px;">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" style="border-radius: 0 20px 20px 0; background: #F8A036; border: none; height: 36px; padding: 0 12px;">
            <span class="glyphicon glyphicon-search" style="color: white;"></span>
          </button>
        </div>
      </div>
    </form>

    <!-- Right Links -->
    <div style="display: flex; align-items: center; gap: 5px; margin-left: auto; flex-shrink: 0; flex-wrap: nowrap;">

      <?php if(!isset($_SESSION['logged_in'])) :?>
        <a href="signUp.php" style="color: white; padding: 8px 10px; text-decoration: none; white-space: nowrap; font-size: 13px;">
          <span class="glyphicon glyphicon-user"></span> <?= $register; ?>
        </a>
        <a href="signIn.php" style="color: white; padding: 8px 10px; text-decoration: none; white-space: nowrap; font-size: 13px; border-left: 1px solid rgba(255,255,255,0.3);">
          <span class="glyphicon glyphicon-log-in"></span> Sign In
        </a>
      <?php elseif ($_SESSION['logged_in']==1) :?>
        <?php $profileLink = (isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'Admin') ? 'admin_dashboard.php' : 'profile.php'; ?>
        <a href="<?= $profileLink ?>" style="color: white; padding: 8px 10px; text-decoration: none; white-space: nowrap; font-size: 13px;">
          <span class="glyphicon glyphicon-user"></span> <?= $userName; ?>
        </a>
        <a href="?logout=1" style="color: white; padding: 8px 10px; text-decoration: none; white-space: nowrap; font-size: 13px; border-left: 1px solid rgba(255,255,255,0.3);">
          Log out
        </a>
      <?php endif; ?>

      <a href="check_out_item.php" style="color: white; padding: 8px 10px; text-decoration: none; white-space: nowrap; font-size: 13px; border-left: 1px solid rgba(255,255,255,0.3);">
        <span class="glyphicon glyphicon-shopping-cart"></span> Cart (<?php echo isset($_SESSION['cart']) ? $_SESSION['cart'] : '0'; ?>)
      </a>

      <a href="new_store_description.php" style="background: #F8A036; color: #fff; border-radius: 20px; padding: 7px 16px; margin-left: 8px; font-weight: 800; text-decoration: none; white-space: nowrap; font-size: 13px; display: inline-block;">
        <span class="glyphicon glyphicon-tag"></span> Sell Items
      </a>
    </div>

  </div>
</nav>

</body>
</html>



<script>
$(document).ready(function(){
 
 $('#searchQuery').typeahead({
  source: function(query, result)
  {
   $.ajax({
    url:"searchSugg.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data)
    {
     result($.map(data, function(item){
      return item;
     }));
    }
   })
  }
 });
 
});
</script>