<?php
$dir = "c:/xampp/htdocs/bella/E-Market-Place/source/";
$files = glob($dir . "*.php");
$count = 0;
foreach ($files as $file) {
    if (is_file($file)) {
        $content = file_get_contents($file);
        if (strpos($content, 'Bella Market') !== false) {
            $content = str_replace('Bella Market', 'Bella UMU Market', $content);
            file_put_contents($file, $content);
            $count++;
            echo "Updated " . basename($file) . "\n";
        }
    }
}

// Update comments in the community table (e-market_place)
$mysqli = new mysqli('localhost', 'root', '', 'e-market_place');
$mysqli->query("UPDATE post SET postText = REPLACE(postText, 'Bella Market', 'Bella UMU Market')");
echo "Rows updated in post: " . $mysqli->affected_rows . "\n";

$mysqli->query("UPDATE comment SET commentText = REPLACE(commentText, 'Bella Market', 'Bella UMU Market')");
echo "Rows updated in comment: " . $mysqli->affected_rows . "\n";

// Ensure a user exists with a known password (hash for 'password123')
$hashed = password_hash('password123', PASSWORD_BCRYPT);
$mysqli->query("UPDATE users SET password='$hashed' WHERE email='abidsaimon2323@gmail.com'");
echo "Updated password for abidsaimon2323@gmail.com to password123\n";

?>
