<?php
if(!session_start()) {
    session_start();
}
//error_reporting(0);
//ini_set('display_errors', 0);

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

$ve = $dbh->prepare("SELECT * FROM users WHERE email=:email");
$done = $ve->execute([
    "email" => $_SESSION['email']
    ]);
var_dump($ve->fetchAll());
$vels = $ve->fetchAll();
var_dump(boolval($vels['confirm_email']));

if(boolval($vels['confirm_email'])) {
    echo "ture";
} else {
    echo "false";
}
?>
