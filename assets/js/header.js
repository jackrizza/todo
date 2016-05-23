var appUrl = "http://localhost:8888";
    var header = {
    init : function() {
        header.switchCase(window.location.href)
    },
    render : function(link) {
        $.get(appUrl + link, function(data) {
                    $(".app").html(data);
                });
    },
    switchCase : function(url) {
        switch(url){
            case appUrl + '/':
                header.render("/view/landing.html.php");
            break;
            case appUrl + '/sign-in/hello':
                header.render("/view/login.html.php");
            break;
            case appUrl + '/sign-up':
                header.render("/view/signup.html.php");
            break;
            case appUrl + '/todo':
            $.get(appUrl + '/app/session.php', function(data) {
                 if( data == "Expired" ) {
                     header.render("/view/no.html.php");
                 } else if (data == "Active" ) {
                     header.render("/view/todo.html.php");
                 }
             });
            break;
            case appUrl + '/sign-out':
                window.location.href = 'app/signout.php';
            break;
            default:
                header.render("/view/landing.html.php");
            break;
        }
    }
}
