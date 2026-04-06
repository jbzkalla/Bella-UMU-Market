<?php
$mysqli = new mysqli('localhost', 'root', '', 'e-market_place');
$mysqli->query("UPDATE community SET post_text = REPLACE(post_text, 'Bella Market', 'Bella UMU Market')");
echo "Rows updated in community: " . $mysqli->affected_rows . "\n";

$mysqli->query("UPDATE comment SET comment = REPLACE(comment, 'Bella Market', 'Bella UMU Market')");
echo "Rows updated in comment: " . $mysqli->affected_rows . "\n";

$hashed = password_hash('password123', PASSWORD_BCRYPT);
$mysqli->query("UPDATE users SET password='$hashed' WHERE email='abidsaimon2323@gmail.com'");
echo "Updated password for admin\n";
?>
