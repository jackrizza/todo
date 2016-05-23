<?php
if(!session_start()) {
    session_start();
}
error_reporting(0);
ini_set('display_errors', 0);

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

$ve = $dbh->prepare("SELECT * FROM users WHERE email=:email");
$done = $ve->execute([
    "email" => $_SESSION['email']
    ]);
$vels = $ve->fetchAll(PDO::FETCH_COLUMN, 3);

if($vels[0] == $_SESSION['email']) {
    echo "activeEmail";
} else {
    echo "nonActiveEmail";
}

?>
