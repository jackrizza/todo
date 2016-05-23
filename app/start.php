<?php
if (!session_start()) {
    session_start();
}
require 'vendor/autoload.php';
require 'passwords.php';
$_SESSION['server'] = "https://todo-jackrizza.herokuapp.com/";
$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

