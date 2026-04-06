<?php

if(!isset($_SESSION)) session_start();

require_once "../login-system/db.php";

$male = "Men\'s Fashion";
$female = "Women\'s Fashion";
$baby = "Baby\'s Fashion";
$phone = "Phone and Tablets";
$sport = "Sports and Travels";

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .secondary-nav {
        background: white;
        border-bottom: 2px solid var(--primary);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        padding: 5px 0;
    }
	.li-item {
		margin: 0 20px;
	}
	.nav-link-item {
		color: #555 !important;
        font-weight: 700 !important;
        text-transform: uppercase;
        font-size: 13px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        padding: 15px 10px !important;
	}
	.nav-link-item:hover {
		color: var(--primary) !important;
        background: transparent !important;
        transform: translateY(-2px);
	}
</style>

</head>
<body>
	<nav class="secondary-nav">
		<div class="container-fluid">
		    <ul class="nav navbar-nav" style="width: 100%; display: flex; justify-content: center; float: none;">
				 <li class="li-item" ><a class="nav-link-item" href="subIndex.php?pCat=<?= $male; ?>" > Men's Fashion </a></li>
				 <li class="li-item"><a class="nav-link-item" href="subIndex.php?pCat=<?= $female; ?>"> Women's Fashion </a></li>
				 <li class="li-item"><a class="nav-link-item" href="subIndex.php?pCat=<?= $baby; ?>"> Baby's Fashion </a></li>
				 <li class="li-item"><a class="nav-link-item" href="subIndex.php?pCat=<?= $phone; ?>"> Phone & Tablets</a></li>
				 <li class="li-item"><a class="nav-link-item" href="subIndex.php?pCat=<?= $sport; ?>"> Sports & Travels</a></li>
				 <li class="li-item"><a class="nav-link-item" href="allC.php" style="color: var(--accent) !important;"> All Categories</a></li>
		   </ul>
		</div>
	</nav>

</body>
</html>