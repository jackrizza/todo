<?php require "app/start.php";?>
<?php require "view/template/header.html.php";?>
<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    $app = new \Slim\App();

    $app->map(['GET', 'POST'], '/', function() {
        require 'view/landing.html.php';
    });
    $app->map(['GET', 'POST'], '/sign-in/{error}', function($request, $response, $args) {
        session_unset($_SESSION['error']);
        $_SESSION['error'] = $args['error'];
        require 'view/login.html.php';
    });
    $app->map(['GET', 'POST'], '/sign-up', function() {
        require 'view/signup.html.php';
    });
    $app->map(['GET', 'POST'], '/todo', function() {
        if(isset($_SESSION['email'])) {
            require 'view/todo.html.php';
        } else {
            require 'view/no.html.php';
        }
    });
    $app->map(['GET', 'POST'], '/sign-out', function() {
        session_destroy();
        require 'view/landing.html.php';
    });
    $app->run();

    function home() {
        header('location : http://localhost:8888/');
    }
?>

<?php require "view/template/footer.html.php";?>
