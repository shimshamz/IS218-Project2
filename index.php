<?php
session_set_cookie_params (0, "/~sm2292/IS218-Project2/");
session_start();

include('view/header.php');
require('model/database.php');
require('model/accounts_db.php');
require('model/todos_db.php');
include('myfunctions.php');

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (!auth ($email, $password)) {

	$message = 'Email or Password is incorrect.
				<br>Redirecting to Login page...';
	$target = "https://web.njit.edu/~sm2292/IS218-Project2/index.html";
	
	redirect ($message, $target, 3);
}

$_SESSION["logged"] = true;
$_SESSION["email"] = $email;
$_SESSION["password"] = $password;

$message = 'Logging in...';
$target = "https://web.njit.edu/~sm2292/IS218-Project2/todos_manager/index.php";
redirect ($message, $target, 2);
?>