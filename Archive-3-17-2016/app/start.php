<?php

if (!session_start()) {
    session_start();
}

error_reporting(0);
ini_set('display_errors', 0);

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

require 'passwords.php';
