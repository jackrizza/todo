<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    ?>
<?php
if ($_SESSION['email']) {
    # code...
    header('location : ' . $_SESSION["server"] . 'todo');
}
?>

<div class="error">
</div>

<div class="card">

    <h1>Sign In</h1>
    <form action="/" method="POST" id="signin" autocomplete="off">
        <input type="email" name="email" autocomplete="off" placeholder="john@example.com">
        <input type="password" name="password" autocomplete="off" placeholder="password">
        <br>
        <input type="submit" value="sign in">
    </form>
</div>
    <script type="text/javascript">
        $("#signin").submit(function(e) {
            var url = "/app/login.php"; // the script where you handle the form input.

            $.ajax({
                type: "POST",
                url: url,
                data: $("#signin").serialize(), // serializes the form's elements.
                success: function(data) {
                    //confirm(data);
                    if(data.toString() == "yes") {
                        window.location = "<?php echo $_SESSION['server'];?>/todo";
                    }else if(data.toString() == "no"){
                        $('.error').html(' <div class="alert alert-error">Wrong email or password<a class="close" href="#">&times;</a></div>')
                    }else {
                        swal({   title: "darn it!",   text: "you should not be seeing this. Try refreshing",   type: "error",   confirmButtonText: "Cool" });                    }
                    //swal({   title: "Sucsess!",   text: data,   type: "sucsess",   confirmButtonText: "Cool" });
                }
            });
            e.preventDefault();
        });
    </script>
<script type="text/javascript">
    (function($) {
  $.fn.alert = function() {

    return this.each(function() {
        var self = $(this);

        self.on('click', '.close', function() {
          self.remove();
        });
    });

  };
}(jQuery))

$('.alert').alert();
</script>
