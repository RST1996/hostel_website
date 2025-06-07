<?php
	session_start();
	require_once '../assets/includes/connection.php';
	$errflag = 0;
	if(!isset($_SESSION['user_role_id']) || !isset($_SESSION['username']) || !isset($_SESSION['uid']))
	{
		header('Location:login.php');
	}
		$session_user_role_id = $_SESSION['user_role_id'];
		$session_uid = $_SESSION['uid'];

	if (isset($_POST['uppass'])) {
		$username =$_POST['username'];
		$oldpass =$_POST['opassword'];
		$newpass =$_POST['npassword'];
		$conpass =$_POST['cpassword'];
		if ($conpass == $newpass) {
			if ($oldpass != $newpass) {
				$oldpass = base64_encode(md5($oldpass));
				$newpass = base64_encode(md5($newpass));

				$sel_query = "SELECT `id` FROM `users` WHERE `username`='$username' AND `password`='$oldpass'";
				if ($res = mysql_query($sel_query)) {
				 	if (mysql_num_rows($res) == 1 ) {
				 		if ($session_uid == mysql_result($res, 0,'id')) {
				 			$upquery = "UPDATE `users` SET `password`='$newpass' WHERE `id` = '$session_uid'";
				 			if ($upres = mysql_query($upquery)) {
				 				echo "<script> alert('Password Successfully Updated!!'); </script>";
				 			}
				 			else{
				 				echo "<script> alert('Failed to update the password :(!!'); </script>";
				 			}
				 		}else{
				 			echo "<script> alert('Unable to identify the user!!'); </script>";
				 		}
				 	}
				 	else
				 	{
				 		echo "<script> alert('Invalid PAssword!!'); </script>";
				 	}
				 }
				 else{
				 	echo "<script> alert('Unable to identify the user!!'); </script>";
				 } 
			}
			else
			{
				echo "<script> alert('New & Old Password cannot remain same!!'); </script>";
			}
		}
		else
		{
			echo "<script> alert('Password Mismatched!!'); </script>";
			
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
		<table width="450px">
			<tr class="errmsg <?php if ($errflag == 1) {
				echo "show";
			}
			?>" >
				<td><?php echo "Error Message"; ?></td>
			</tr>	
			</tr>
			<tr style="background-color:cadetblue;color:#fff;font-size:20px;text-align:center; padding:15px; height:50px;">
				<td>Change Password Window</td>
			</tr>
<?php
	$sel_query = "SELECT `username` FROM `users` WHERE `id` ='$session_uid'";
	if ($res = mysql_query($sel_query)) {
		if (mysql_num_rows($res) == 1) {
			$username = mysql_result($res, 0,'username');
		}
		else
		{
			echo "<script> alert('Unable to identify'); </script>";
			session_destroy();
		}
	}
	else
	{
		echo "<script> alert('Something went wrong!! Plzz try again later..!!'); </script>";
		session_destroy();
	}
?>
			<tr style="height:100%;">
				<td>
				<div style="border:2px solid cadetblue;text-align:center;font-size:20px;">
				<br>
					<form name="changepass" id="changepass" action="changepassword.php" method="POST" onsubmit="return validform();">
						<table align="center" cellspacing="5px">
							<tr>
								<td align="right">
									<label for="username" style="color: cadetblue;" >Username: &nbsp</label>
								</td>
								<td>
									<input type="text" name="username" id="username" value="<?php echo $username; ?>" readonly />
								</td>
							</tr>
							<tr>
								<td align="right">
									<label for="opassword" style="color: cadetblue;">Old Password: &nbsp</label>
								</td>
								<td>
									<input type="password" name="opassword" id="opassword" required />
								</td>
							</tr>
							<tr>
								<td align="right">
									<label for="npassword" style="color: cadetblue;">New Password: &nbsp</label>
								</td>
								<td>
									<input type="password" name="npassword" id="npassword" required />
								</td>
							</tr>
							<tr>
								<td align="right">
									<label for=" cpassword" style="color: cadetblue;">Confirm Password: &nbsp</label>
								</td>
								<td>
									<input type="password" name="cpassword" id="cpassword" required />
								</td>
							</tr>
						</table>
						<br/>
						<input type="submit" name="uppass" class="loginbtn"  value="Update Password" />
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
	<script type="text/javascript">
		function validform()
		{
			var pass1 = document.forms["changepass"]["npassword"].value;
			var cpass = document.forms["changepass"]["cpassword"].value;
			var oldpass = document.forms["changepass"]["opassword"].value;
			if (pass1 == cpass ) {
				if (pass1 != oldpass) {
					return true;	
				}
				else
				{
					alert('New & Old Password cannot remain same!!');
					document.forms["changepass"]["npassword"].value = '';
					document.forms["changepass"]["cpassword"].value = '';
					document.forms["changepass"]["opassword"].value = '';
					return false;
				}
				
			}
			else
			{
				alert('Password Mismatched!!');
				document.forms["changepass"]["npassword"].value = '';
				document.forms["changepass"]["cpassword"].value = '';
				document.forms["changepass"]["opassword"].value = '';
				return false;
			}
		}
	</script>

</body>
</html>
