var header = {
    var url : window.location.href,

    render : function(link) {
        $.get(header, function(data) {
                    $(".app").html(data);
                });
    },
    switchCase : function(url) {
        switch(url){
            case 'http://localhost:8888/':
                    this.render("view/landing.html.php");
            break;
            case 'http://localhost:8888/sign-in/hello':
                this.render("view/login.html.php");
            break;
            case 'http://localhost:8888/sign-up':
                this.render("view/signup.html.php");
            break;
            case 'http://localhost:8888/todo':
                this.render("view/todo.html.php");
            break;
            default:
                this.render("view/landing.html.php");
            break;
        }
    },
        init : function() {
        swtchCase(header.url)
    }
}

header.init();
