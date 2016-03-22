<?php
if(!session_start()) {
    session_start();
}

if( empty($_SESSION['email']) ) {
     print "Expired";
}
else {
     print "Active";
}

?>
