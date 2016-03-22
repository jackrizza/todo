<?php require "app/start.php";?>
<?php require "view/template/header.html.php";?>
<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    ?>

<script>
    var url = window.location.href;
    var header = {
    init : function() {
        header.switchCase(url)
    },
    render : function(link) {
        $.get("http://localhost:8888" + link, function(data) {
                    $(".app").html(data);
                });
    },
    switchCase : function(url) {
        switch(url){
            case 'http://localhost:8888/':
                header.render("/view/landing.html.php");
            break;
            case 'http://localhost:8888/sign-in/hello':
                header.render("/view/login.html.php");
            break;
            case 'http://localhost:8888/sign-up':
                header.render("/view/signup.html.php");
            break;
            case 'http://localhost:8888/todo':
                header.render("/view/todo.html.php");
            break;
            case 'http://localhost:8888/sign-out':
                window.location.href = 'app/signout.php';
            break;
            default:
                header.render("/view/landing.html.php");
            break;
        }
    }
}

header.init();

</script>
<div class="app"></div>
<?php require "view/template/footer.html.php";?>
