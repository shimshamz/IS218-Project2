<?php
session_set_cookie_params (0, "/~sm2292/IS218-Project2/");
session_start();

require('model/database.php');
require('model/accounts_db.php');
require('model/todos_db.php');
include('myfunctions.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (!auth ($email, $password)) {

	$message = '<p>Please Log in with the correct credentials.
				<br>Redirecting to Login page...</p>';
	$target = "index.html";
	
	redirect ($message, $target, 3);
}

$_SESSION["logged"] = true;
$_SESSION["email"] = $email;
$_SESSION["password"] = $password;

$message = 'Logging in...';
$target = "todos_manager/index.php";
redirect ($message, $target, 2);
?>