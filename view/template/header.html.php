<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="assets/css/sweetalert.css">
    <title>todo</title>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>
    <script>
        $.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
            options.async = true;
        });
    </script>
</head>
    <body>
        <?php require "navagation.html.php";?>
        <?php require 'off.screen.navagation.html.php'; ?>
        <div class="container">
