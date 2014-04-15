<?php
	include "funtions.php";
	
	class UserLogin
	{
		var $username;
		var $password;
		var $rememberme;
		
		function __construct($username,$password,$rememberme)
		{
			$this->username = $username;
			$this->password = $password;
			$this->rememberme = $rememberme;
		}
		
	    function connect()
		{
			if(!empty($username && $password))
			{
			$login = mysql_query("SELECT * FROM user WHERE Username ='$username'");
			$rows = mysql_num_rows($login);
			if($rows !=0)
			{
				while($row = mysql_fetch_array($login));
				{
					$db_password = $row['PASSWORD'];
					echo $row['id'];
					echo $password." ".$db_password;
				
					if($password== $db_password)
					{
						echo "Correct Password";
						$loginOK = TRUE;
					}
					else
					{
						
						$loginOK = FALSE;
						echo "InCorrect Password";
						exit();
					
					}
				
					if($loginOK==TRUE)
					{
						if($rememberme=="on")
						{
							setcookie("username",$username,time()+7200);
						}
						else if($rememberme=="")
						{
						$_SESSION['username']=$username;
						}
					
						header("Location: userArea.php");
					}
					else
						die("<br.>"."Incorect username and Password Combination");
				}
		}
		else
			die("incorrect User Name");
	}
		else
			die("Please enter username and password");
		
}
}

?>