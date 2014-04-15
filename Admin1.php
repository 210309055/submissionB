<?php


include "functions.php";
include "admin.class.php";


if($_POST['login'])
{
	$username = $_REQUEST['username'];
	$password = $_POST['password'];
	$rememberme = $_REQUEST['rememberme'];
	
	/* $query = mysql_query("SELECT * FROM admin WHERE Username='$username'");
	$rows = mysql_fetch_assoc($query);
		if($rows!=0)
		{
			echo "User is da";
			while($rows = mysql_fetch_assoc($query) !=0)
			{
				$dbusername= $rows['username'];
				$dbpassword= $rows['password'];
				echo $dbusername."Password";
				
			 if($password==$dbpassword)
				{
					 echo "You're successfully loged in ! <a href='member.php' >Click here to continue <a/>";
					 //$_SESSION['Username']=$username;
				}
			 else
				{
						 echo "Incorrect password !";
				}
			
			}
				
		}
		else
			die("User does not exist!"); */
		$admObj = new AdminLogin($username,$password ,$rememberme);
		$admObj->connect();
}

	
	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post">
  <p>Admin</p>
  <p>
    <label for="username"></label>
    <input type="text" name="username" id="username" />
  </p>
  <p>Password</p>
  <p>
    <label for="password"></label>
    <input type="password" name="password" id="password" />
  </p>
  <p>
    <input type="checkbox" name="rememberme" id="rememberme" />
    <label for="rememberme">Remember Me</label>
  </p>
  <p>
    <input type="submit" name="login" id="login" value="login" />
  </p>
</form>
</body>
</html>
