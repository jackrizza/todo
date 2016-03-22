<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    ?>
<div class="errors"></div>
<div class="card">
    <h1>Sign Up</h1>
    <form action="/" method="POST" id="signup">
        <input type="email" name="email" id="email" placeholder="john@example.com" autocomplete="off">
        <input type="email" name="email-confrim" id="confemail" placeholder="confirm email" autocomplete="off">
        <input type="password" name="password" placeholder="password" autocomplete="off">
        <br>
        <input type="submit" value="sign up">
    </form>
</div>
<script>
    $(document).ready(function(){
        function emailCheckAjax() {
            var url = "/app/emailCheck.php"; // the script where you handle the form input.
            var result = $.ajax({
                async: false,
                type: "POST",
                url: url,
                data: $("#email").serialize(),  // serializes the form's elements.
                success: function(data) {
                    return data;
                }
            }).responseText;
            console.log(result);
            return result;
        }
        function checkEmail() {
            if(emailCheckAjax() == "ok") {
                console.log(emailCheckAjax());
                return true;
            } else {
                return false;
            }
        }
        function cea() {
            var email = document.getElementById("email").value
            var confemail = document.getElementById("confemail").value
            if(email != confemail) {
                return false;
            } else {
                return true;
            }
        }
        $("#signup").submit(function(e) {
            swal({   title: "Looks good!",   text: "Sign Up pending, hold on tight", type: "success",   timer: 1500,   showConfirmButton: false });
            var url = "/app/signup.php"; // the script where you handle the form input.
            if(cea()){
                if (checkEmail()) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#signup").serialize(), // serializes the form's elements.
                        success: function(data) {
                            if(data.toString() == "done") {
                               swal({   title: "Woo Hoo!",   text: "You now have a account", type: "success",   timer: 1500,   showConfirmButton: false });
                               window.location = "<?php echo $_SESSION['server'];?>sign-in/hello";
                            }else {
                               swal({   title: "Uh Ohh!",   text: "Something went wrong. We'll look into it!", type: "error",   timer: 1500,   showConfirmButton: false });
                            }
                        }
                    });
                }else {
                    sweetAlert("Sorry...", "The email that you pick is already in use", "error");
                }
            } else {
                sweetAlert("Sorry...", "The emails are not matching", "error");
            }
            e.preventDefault();
        });
    })
</script>
