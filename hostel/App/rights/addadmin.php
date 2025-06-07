<?php
	session_start();
	require_once '../../assets/includes/connection.php';
	$page_name = "rights/addadmin.php";
	$session_user_role_id = $_SESSION['user_role_id'];
	$query = "SELECT `users`.`id` FROM `user_rights`,`users`,`roles` WHERE `user_rights`.`user_role_id` = '$session_user_role_id' AND `roles`.`path` = '$page_name' AND `roles`.`id`= `user_rights`.`role_id`";
	if ($result = mysqli_query($dbcon,$query)) {
		if (mysqli_num_rows($result) >= 1) {
		}
		else
		{
			die("You are not authorized to Visit this page!! Plzz stay Out of this!!");
		}
	}
	else
	{
		die("Unable to connect at this time bcoz of some technical errors!");
	}
	if (isset($_POST['add_admin'])) {
		$name = htmlentities($_POST['name']);
		$post = htmlentities($_POST['post']);
		$username = htmlentities($_POST['username']);
		$password = base64_encode(md5($username));

		$query1 = "INSERT INTO `users` (`id`, `username`,`post` ,`password`, `name`, `user_role_id`) VALUES (NULL, '$username', '$post','$password', '$name', '2')";
		if ($res = mysqli_query($dbcon,$query1)) {
			echo "<script> alert('Admin Added Successfully!!'); </script>";
		}
		else
		{
			$unique_error = "Duplicate entry '".$username."' for key 'username'";
			$err =  mysqli_error($dbcon);
			if ($unique_error == $err) {
				echo "<script> alert('TRy with another username!!'); </script>";
			}
			else{
				echo "<script> alert('Failed :( '); </script>";	
			}
			//Duplicate entry 'admin' for key 'username'
				
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>App | Hostel</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<script src="../../assets/js/jquery-3.1.0.js"></script>
	<script src="../../assets/js/formval.js"></script>
</head>
<body>
	<div class="header">
		Government College of Engineering, Jalgaon<br>
		<span>(An Autonomous INstitute of Govt. Of Maharashtra)</span>
	</div>
	<div id="main_menu_container">
		<div class="menu_content">
			Hostel App Admin Area <span>do the work with ease..</span>
		</div>
	</div>
	<div id="copy" class="hide">
		<div class="menu_content">
			MIS <span>do the work with ease..</span>
		</div>

	</div>
	<div class="content_section">
		<div class="sidebar">
			<?php
				$query = "SELECT `roles`.`role_name`, `roles`.`path` FROM `roles`,`user_rights` WHERE `user_rights`.`user_role_id` = '$session_user_role_id' AND `user_rights`.`role_id` = `roles`.`id`";
				if ($result = mysqli_query($dbcon,$query)) {
					while($row = mysqli_fetch_assoc($result)){
			?>
						<div class="option" ><a href="../<?php echo $row['path']; ?>" > <?php echo $row['role_name']?> </a></div>
			<?php
					}
				}
				else
				{
					echo "Query Failed ".mysqli_error($dbcon);
					session_destroy();
					die("Unable to connect right now!!");
				}
					
			?>
		</div>
		<div class="main_content_display">
			<div class="user_info">
				<div style="float:left;height:100%;display:inline-block;width:50%;margin:0px;text-align: left;font-size: 22px;">
					<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome <?php echo $_SESSION['username']?>
				</div>
				<div style="float:left;height:100%;display:inline-block;width:50%; margin:0px;text-align: right;">
					<button style="height:100%;background-color: transparent;border:0px transparent;font-size: 20px;color:cadetblue;" onclick="location.href='../changepassword.php'">Change Password</button>
					<button style="height:100%;background-color: transparent;border:0px transparent;font-size: 20px;color:cadetblue;" onclick="location.href='../logout.php'">Logout </button>
				</div>
			</div>
			<div class="workpannel" id="page_container">
				<h3>ADD ADMIN</h3>
				<form name="addadmin" action="addadmin.php" method="POST">
					<table width="500px" align="center" cellpadding="8">
						<tr>
							<td><label for="name">Name:- </label></td>
							<td><input type="text" name="name" onkeyup="valiname('addadmin','name');" id="name" required></td>
						</tr>
						<tr>
							<td><label for="post">Designation:- </label></td>
							<td><input type="text" onkeyup="validtitle('addadmin','post');" name="post" id="post" required></td>
						</tr>
						<tr>
							<td><label for="username">Username:- </label></td>
							<td>
								<input type="text" onkeyup="validusername('addadmin','username');" name="username" id="username" required>
								<div class="errmsg"></div>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="submit" name="add_admin" value="Add as Admin" />
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">
		All Rights Reserved!!!
	</div>
	<script>
		$("document").ready(function(){
			//for scrolling effect..
	    var nav = $('#main_menu_container');
	    var substitute=$('#copy');
		var no =  nav.offset().top;
	    $(window).scroll(function () {
	        if ($(this).scrollTop() > no) {
	            nav.addClass("f-nav");
	            substitute.addClass("show");
	            substitute.removeClass("hide");

	        } else {
	            nav.removeClass("f-nav");
	            substitute.removeClass("show");
	            substitute.addClass("hide");
	        }
	    });

	    });
	</script>
</body>
</html>