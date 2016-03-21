<?php

function password($pass) {
	$salt = '23sdf2f';
	$pepper = '234sdf2';
	$pass = $salt . $pass . $pepper;
	return $password = hash('sha512', $pass);
}

?>
