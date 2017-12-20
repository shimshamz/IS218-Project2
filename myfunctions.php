<?php
function auth ($email, $password){
	global $db;
    $query = 'SELECT * FROM accounts
              WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":password", $password);
    $statement->execute();
    $account = $statement->fetchAll();
    $count = $statement->rowCount();
	if ($count == 0) {
		$retVal = false;
	}
	else {
		$retVal = true;
	}
	$statement->closeCursor();
	return $retVal;
}

function redirect ($message, $url, $delay) {
	echo "<div id='parSpinner'><p><b>$message</b></p><div id='spinner'></div></div></div></body></html>";
	header("refresh: $delay, url = $url");
	exit();
}

function gatekeeper () {
	if (!isset ($_SESSION["logged"])) {
		$message = 'Please Log in.
				<br>Redirecting to Login page...';
		$target = "https://web.njit.edu/~sm2292/IS218-Project2/index.html";
		redirect ($message, $target, 3);
	}
}
?>