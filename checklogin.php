<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
				include("db_con.php");
				mysqli_query($con,"SET NAMES 'utf8'");
				mysqli_query($con,"SET CHARACTER SET 'utf8_unicode_ci'");
				mysqli_set_charset($con,'utf8');
			
				$myusername = $_POST['username'];
				$mypassword =$_POST['password'];
				$myusername = stripslashes($myusername);
				$mypassword = stripslashes($mypassword);
				$myusername = mysqli_real_escape_string($con,$myusername);
				$mypassword = mysqli_real_escape_string($con,$mypassword);
				//$mypassword=md5($mypassword); // Encrypted Password

				 
				$result = mysqli_query($con,"select * from users where username = '".$myusername."' and password = '".$mypassword."'") or die(mysqli_error($con));
				$i=0;
				while ($row = mysqli_fetch_array($result))
				{
	
					$i++;
				}
				if ($i==0)
				{
				
				echo "Λάθος όνομα ή/και κωδικός.Παρακαλώ περιμένετε...";
				header( "refresh:3;url=index.html" );

				
				}
				else
				{
				
					session_start();
					$_SESSION['username'] = $myusername;
					$result = mysqli_query($con,"select * from parents where username = '".$myusername."'") or die(mysqli_error($con));
					$i=0;
					while ($row = mysqli_fetch_array($result))
					{
						$_SESSION['parentid'] = $row['parentid'];
						$i++;
					}
					if ($i==0)
					{
						header('Location: grammateia.php');
					}
					else
					{
						header('Location: myclasses.php');

					}
				}
			
?>
</body>
</html>