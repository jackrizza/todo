<?php
    require 'app/start.php';

    require 'views/templates/header.html.php';
?>
<div class="jumbotron">
  <h1 class="display-3">ToDo</h1>
  <hr class="m-y-2">
  <div class="app">

  </div>
  <script>
    function reloadApp(){
      $.get("views/home.php", function(data) {
        $(".app").html(data);
    });
    }
    reloadApp();
    $("#signin").submit(function(e) {

    var url = "/app/login.php"; // the script where you handle the form input.

    $.ajax({
        type: "POST",
        url: url,
        data: $("#signin").serialize(), // serializes the form's elements.
        success: function() {
            alert('reloading');
            reloadApp();
        }
    });

    $('.name').value('');

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

function reload() {
    $.get("/app/reload.php", function(data) {
        $(".names").html(data);
    });
}

function remove(number) {
    var url = "/app/remove.php"; // the script where you handle the form input.
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            'number': number
        }),
        success: function(data) {
            reload();
        }
    });
}

function done(number) {
    var url = "/app/done.php"; // the script where you handle the form input.
    $.ajax({
        type: "POST",
        url: url,
        data: ({
            'number': number
        }),
        success: function(data) {
            reload();
        }
    });
}
reload();
// this is the id of the form
$("#name").submit(function(e) {

    var url = "/app/name.php"; // the script where you handle the form input.

    $.ajax({
        type: "POST",
        url: url,
        data: $("#name").serialize(), // serializes the form's elements.
        success: function() {
            $.get("/app/reload.php", function(data) {
                $(".names").html(data);
            });
        }
    });

    $('.text').value('');

    e.preventDefault(); // avoid to execute the actual submit of the form.
});

  </script>
</div>
