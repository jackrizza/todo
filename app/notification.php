<?php
if(!session_start()) {
    session_start();
}
 ?>
<script>
// request permission on page load
document.addEventListener('DOMContentLoaded', function () {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

function notifyMe(number) {
   var text = "You have left " + number+ " items on your todo list";
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    console.log("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    var notification = new Notification("todo by jack", {
          body: text,
        });
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {

      // Whatever the user answers, we make sure we store the information
      if(!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
        console.log(text);
        var notification = new Notification("todo by jack", {
          body: text,
        });
      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother him any more.
}
</script>
<?php

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

$not = $dbh->prepare("SELECT * FROM users WHERE email=:email");
$done = $not->execute([
    "email" => $_SESSION['email']
    ]);

$not = $not->rowCount();
$not = " " . $not . " ";
?>

<script>
    notifyMe(<?php echo $not?>);
</script>





