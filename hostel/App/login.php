<?php
	session_start();
	require_once '../assets/includes/connection.php';
	$errflag = 0;
	if(isset($_SESSION['user_role_id']) && isset($_SESSION['username']) && isset($_SESSION['uid']))
	{
		header('Location:index.php');
	}
	if (isset($_POST['login'])) {
		$errflag = 0;
		$username = htmlentities($_POST['username']);
		$password = mysqli_real_escape_string($dbcon,$_POST['password']);
		$password = base64_encode(md5($password));
		//echo $password."<br>";
		$query = "SELECT `user_role_id`,`username`,`id` FROM `users` WHERE `username`='$username' AND `password`='$password'";
		//echo $query."<br>";
		if ($result = @mysqli_query($dbcon,$query)) {
			//echo mysql_num_rows($result)."<br/>";
			if (mysqli_num_rows($result) == 1) {
				echo "Loggedin successfully";
				$row = mysqli_fetch_assoc($result);
				$_SESSION['username'] = $row['username'];
				$_SESSION['uid'] = $row['id'];
				$_SESSION['user_role_id'] = $row['user_role_id'];
				header('Location:index.php');


			}
			else
			{
				$errflag = 1;
				$errmsg = "Invalid Username/Password Combination";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Hostel App</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>
	
	<div align="center" style="margin-top:70px;">
		<table width=450px>
			<tr class="errmsg <?php if ($errflag == 1) {
				echo "show";
			}
			?>" >
				<td><?php echo $errmsg; ?></td>
			</tr>	
			</tr>
			<tr style="background-color:cadetblue;color:#fff;font-size:20px;text-align:center; padding:15px; height:50px;">
				<td>Admin Login Window</td>
			</tr>
			<tr style="height:100%;">
				<td>
				<div style="border:2px solid cadetblue;text-align:center;font-size:20px;">
				<br>
					<form action="login.php" method="POST">
						<label for="username" style="color: cadetblue;">Username: &nbsp</label>
						<input type="text" name="username" id="username" required /><br><br>
						<label for="password" style="color: cadetblue;">Password: &nbsp</label>
						<input type="password" name="password" id="password" required /><br><br>
						<input type="submit" name="login" class="loginbtn"  value="Log-In" />
					</form>
				<br>
				</div>
				</td>
			</tr>
			<tr class="footer">
				<td>All rights reserved @ GCOEJ</td>
			</tr>
		</table>
	</div>

</body>
</html>
	