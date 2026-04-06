<?php

require "../login-system/db.php";

if(!isset($_SESSION)) session_start();

$email = $_SESSION['email'];
$result = $mysqli->query("SELECT * FROM store WHERE email='$email'");
$result2 = $mysqli->query("SELECT * FROM sellerinfo WHERE email='$email'");

$user = $result->fetch_assoc();

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1){
    $store_name = $user['store_name'];
}
else{
    header("location:index.php");
}

		$fileName1 = "";
		$fileName2 = "";
		$fileName3 = "";
		$fileName4 = "";
		$address="";
		$category="";
		$postal_code="";
        $store_description="";

		if(isset($_POST['submit'])){
			
            if(!empty($_FILES['sellerPic']['name'])) {
			    $fileName1= time()."_profile_".$_FILES['sellerPic'] ['name'];
			    $source = $_FILES['sellerPic'] ['tmp_name'];
			    $destination= "sellerPic/".$fileName1;
			    move_uploaded_file($source,$destination);
            }
		
            if(!empty($_FILES['sellerDoc']['name'])) {
			    $fileName2= time()."_doc_".$_FILES['sellerDoc'] ['name'];
			    $source = $_FILES['sellerDoc'] ['tmp_name'];
			    $destination= "sellerDoc/".$fileName2;
			    move_uploaded_file($source,$destination);
            }

            if(!empty($_FILES['storePic']['name'])) {
			    $fileName3= time()."_banner_".$_FILES['storePic'] ['name'];
			    $source = $_FILES['storePic'] ['tmp_name'];
			    $destination= "storePic/".$fileName3;
			    move_uploaded_file($source,$destination);
            }

			if(!empty($_FILES['storeLogo']['name'])) {
			    $fileName4= time()."_logo_".$_FILES['storeLogo'] ['name'];
			    $source = $_FILES['storeLogo'] ['tmp_name'];
			    $destination= "storePic/".$fileName4;
			    move_uploaded_file($source,$destination);
            }


			$address = $mysqli->escape_string($_POST['address']);
			$category = $mysqli->escape_string($_POST['category']);
			$postal_code = $mysqli->escape_string($_POST['Postalcode']);
			$store_description = $mysqli->escape_string($_POST['description']);
            $store_name = isset($_POST['store_name']) ? $mysqli->escape_string($_POST['store_name']) : $mysqli->escape_string($user['store_name']);
			
			// New fields for student personal details
			$name = $mysqli->escape_string($_POST['name']);
			$phone = $mysqli->escape_string($_POST['phone']);

			// Update users table
			$mysqli->query("UPDATE users SET name='$name', phone='$phone' WHERE email='$email'");
			$_SESSION['UserName'] = $name; // Keep session updated

			if ($result2->num_rows > 0){
				$query = "UPDATE sellerinfo SET address='$address',category='$category',postal_code='$postal_code'";
                if (!empty($fileName1)) $query .= ", seller_photo='$fileName1'";
                if (!empty($fileName2)) $query .= ", seller_nid='$fileName2'";
                $query .= " WHERE email='$email'";
                $mysqli->query($query);
			}else{
			    $query = " INSERT INTO `sellerinfo` (`email`,`address`,`category`,`postal_code`,`seller_photo`,`seller_nid`) VALUES ('$email','$address','$category','$postal_code','$fileName1','$fileName2')";
                $mysqli->query($query);
			}


			if ($result->num_rows > 0) {
					$query2 = "UPDATE store SET store_description='$store_description', store_name='$store_name'";
                    if (!empty($fileName3)) $query2 .= ", store_banner='$fileName3'";
					if (!empty($fileName4)) $query2 .= ", store_logo='$fileName4'";
                    $query2 .= " WHERE email='$email'";
			        $mysqli->query($query2);

	        $message = "Your profile has been updated successfully.\\nThank you.";
      	    echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0; url=../source/new_store_description.php");
			}else{
				$query2 = "INSERT INTO store (`email`,`store_banner`,`store_logo`,`store_description`,`store_name`) VALUES ('$email','$fileName3','$fileName4','$store_description','$store_name') ";
			    $mysqli->query($query2);

	        $message = "Your profile update successfully.\\nThank you.";
      	    echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh:0; url=../source/new_store_description.php");
			}

		}	

?>