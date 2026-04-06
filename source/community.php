<?php
require "../login-system/db.php";
if(!isset($_SESSION)) session_start();

$user_name = "Guest User";
if(isset($_SESSION['logged_in'])){
    $email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();
    $user_name = $user['name'];
}

$post_query = $mysqli->query("SELECT * FROM community ORDER BY post_id DESC");

if(isset($_POST['post_button'])){
    $post_text = $mysqli->real_escape_string($_POST['post_text']);
    date_default_timezone_set("Africa/Kampala");
 	$time = date("h:i a");
    $date = date("d M, Y");
    $query = "INSERT INTO community (email, name, post_text, date, time) VALUES ('$email', '$user_name', '$post_text', '$date', '$time')";
    mysqli_query($mysqli, $query);
	header("location: community.php");
    exit();
}

if(isset($_POST['comment_button'])){
	$post_id = $_POST['postId'];
    $comment_text = $mysqli->real_escape_string($_POST['comment_text']);
    $email = $_SESSION['email'];
    $query2 = "INSERT INTO comment (post_id, email, name, comment) VALUES ('$post_id', '$email', '$user_name', '$comment_text')";
    mysqli_query($mysqli, $query2);
	header("location: community.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>UMU Student Community - Bella UMU Market</title>
</head>
<body style="background-color: var(--bg);">

<?php include "header.php" ?>
<?php include "header2.php" ?>
<?php include "sidebar.php" ?>

<div class="section-wrapper" style="margin-top: 50px; margin-bottom: 80px;">
    
    <div class="text-center" style="margin-bottom: 40px;">
        <h1 class="page-title" style="font-size: 38px;">Student Community Feed</h1>
        <p style="color: #666; font-size: 16px;">Connect, ask questions, and share updates with fellow UMU students.</p>
    </div>

	<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1) : ?>
	<div class="bella-card" style="margin-bottom: 50px; padding: 30px;">
        <h4 class="page-title" style="margin-bottom: 15px; text-transform: none;">What's on your mind?</h4>
        <form action="" method="post">
            <textarea class="form-control" name="post_text" placeholder="Share something with the UMU community..." style="height: 120px; border-radius: 12px; border: 1px solid #eee; background: #fafafa; padding: 20px; margin-bottom: 15px; font-size: 15px;" required></textarea>
            <div style="display: flex; justify-content: flex-end;">
                <button class="btn btn-accent" name="post_button" style="padding: 10px 40px; border-radius: 10px; font-weight: 700;">Post to Community</button>
            </div>
        </form>
	</div>
	<?php else: ?>
    <div class="bella-card text-center" style="margin-bottom: 50px; padding: 30px;">
        <p style="font-size: 18px; color: #666;">Want to join the conversation? <a href="signIn.php" style="color: var(--primary); font-weight: 800;">Sign in</a> to post or comment.</p>
    </div>
	<?php endif; ?>

    <div style="max-width: 800px; margin: 0 auto;">
		<?php while($post_result = mysqli_fetch_array($post_query)){ ?>
		<div class="bella-card" style="margin-bottom: 30px; padding: 0; overflow: hidden;">	
			<div style="padding: 25px; border-bottom: 1px solid #f0f0f0;">
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px;">
                    <div style="width: 45px; height: 45px; background: var(--primary); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 20px;">
                        <?= strtoupper(substr($post_result['name'], 0, 1)); ?>
                    </div>
                    <div>
                        <h4 style="margin: 0; font-weight: 800; color: var(--text);"><?= $post_result['name']; ?></h4>
                        <small style="color: #999;"><?= $post_result['date']; ?> at <?= $post_result['time']; ?></small>
                    </div>
                </div>
                <p style="font-size: 17px; line-height: 1.6; color: #444; margin-bottom: 0;"><?= $post_result['post_text']; ?></p>
            </div>

            <div style="padding: 20px 25px; background: #fdfdfd;">
                <h5 style="font-weight: 800; color: #777; margin-bottom: 20px; font-size: 14px; text-transform: uppercase; letter-spacing: 1px;">Comments</h5>
                
                <div style="padding-left: 15px; border-left: 2px solid #eee;">
                    <?php 
                    $p_id = $post_result['post_id'];
                    $comment_query = $mysqli->query("SELECT * FROM comment WHERE post_id='$p_id' ORDER BY SL ASC");
                    if($comment_query->num_rows == 0) echo "<p style='color: #bbb; font-style: italic; font-size: 14px;'>No comments yet.</p>";
                    while($comment_result = mysqli_fetch_array($comment_query)){ ?>
                    <div class="comment-inner-card" style="margin-bottom: 15px; padding: 12px 18px;">
                        <h6 style="color: var(--primary); font-weight: 800; margin-bottom: 5px; font-size: 13px;"><?= $comment_result['name']; ?></h6>
                        <p style="margin: 0; color: #555; font-size: 14px; line-height: 1.5;"><?= $comment_result['comment']; ?></p>
                    </div>
                    <?php } ?>
                </div>

                <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==1) : ?>
                <form action="" method="post" style="margin-top: 25px;">
                    <input type="hidden" name="postId" value="<?= $post_result['post_id']; ?>">
                    <div style="display: flex; gap: 10px;">
                        <input class="form-control" type="text" name="comment_text" placeholder="Write a comment..." style="border-radius: 10px; height: 45px; background: #fff; border: 1px solid #eee;" required>
                        <button class="btn btn-primary" name="comment_button" style="border-radius: 10px; padding: 0 20px; font-weight: 700;">Reply</button>
                    </div>
                </form>
                <?php endif; ?>
            </div>
    	</div>
        <?php } ?>
    </div>
</div>

<?php include "footer.php" ?>

</body>
</html>