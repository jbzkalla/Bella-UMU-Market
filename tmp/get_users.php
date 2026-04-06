<?php
$mysqli = new mysqli('localhost', 'root', '', 'e-market_place');
$res = $mysqli->query('SELECT email, password, active FROM users LIMIT 10');
while($r = $res->fetch_assoc()) {
    echo "User: " . $r['email'] . " | Pass: " . $r['password'] . "\n";
}
?>
