<?php
require('model/database.php');
require('model/accounts_db.php');
include('myfunctions.php');

$fname = filter_input(INPUT_POST, 'fname');
$lname = filter_input(INPUT_POST, 'lname');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');
$year = filter_input(INPUT_POST, 'year');
$month = filter_input(INPUT_POST, 'month');
$day = filter_input(INPUT_POST, 'day');
$birthday = "$year-$month-$day";
$choice = $_POST["choice"];
if ($choice == "M") {
	$gender = "male";
}
else {
	$gender = "female";
}

if ($fname == NULL || $fname == FALSE ||
	$lname == NULL || $lname == FALSE ||
	$email == NULL || $email == FALSE ||
	$password == NULL || $password == FALSE ||
	$phone == NULL || $phone == FALSE ||
	$birthday == NULL || $birthday == FALSE ||
	$choice == NULL || $choice == FALSE) {
        $error = "Invalid data. Check all fields and try again.";
        include('errors/error.php');
    } else { 
        add_account($email, $fname, $lname, $phone, $birthday, $gender, $password);
		$message = 'Account Created.<br>Transferring back to Login Page...';
		$target = "index.html";
		redirect ($message, $target, 3);
    }




?>