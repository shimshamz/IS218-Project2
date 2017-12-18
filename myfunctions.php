<?php
function auth ($email, $password){
	global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $account = $statement->fetch();
    $statement->closeCursor();
	
	if (count($account) == 0) {
		return false;
	}
	else {
		return true;
	}
}

function redirect ($message, $url, $delay) {
	echo $message;
	header("refresh: $delay, url = $url");
	exit();
}

function gatekeeper () {
	if (!isset ($_SESSION["logged"])) {
		$message = '<p>Please Log in.
				<br>Redirecting to Login page...</p>';
		$target = "login.html";
		redirect ($message, $target, 3);
	}
}
?>