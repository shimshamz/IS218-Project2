<?php
session_set_cookie_params (0, "/~sm2292/IS218-Project2/");
session_start();

include('view/header.php');
include ("myfunctions.php") ;

gatekeeper();

$_SESSION = array();
session_destroy();
setcookie("PHPSESSID", "", time()-3600, '/~sm2292/IS218-Project2/', "", 0, 0);

echo "<p><b>Logged out.</b></p>";
?>