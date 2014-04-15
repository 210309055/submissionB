<?
	include "functions.php";
	include "user.class.login.php";


	$username = $_REQUEST['username'];
	$password = $_POST['password'];
	$rememberme = $_REQUEST['rememberme'];
	
	
	$admObj = new UserLogin($username,$password,$rememberme);
	$admObj->connect();

?>