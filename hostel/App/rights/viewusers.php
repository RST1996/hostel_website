<?php
	session_start();
	require_once '../../assets/includes/connection.php';
	$page_name = "rights/viewusers.php";
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
	if (isset($_REQUEST['del'])) {
		$req_del = $_REQUEST['del'];
		$role_query = "SELECT `user_role_id` FROM `users` WHERE `id` = '$req_del'";
		if ($res = mysqli_query($dbcon,$role_query)) {
			if (mysqli_num_rows($res) == 1) {
				$row = mysqli_fetch_assoc($res);
				$role = $row['user_role_id'];
				if ($role == 2) {
					$del_query = "DELETE FROM `users` WHERE `id` = '$req_del'";
					if ($res_del = mysqli_query($dbcon,$del_query)) {
						echo "<script>alert('Deleted Successfully!!');</script>";
					}
				}
				else
				{
					echo "<script>alert('Unable to delete this field.! Can only be updated in respective section!!');</script>";
				}
			}
			else
			{
				echo "<script>alert('Opps!! :( Something went wrong!!');</script>";
			}
		}
		 if($_REQUEST['del'] == 2)
		 {
		 	
		 }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>App | Hostel</title>
	<link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
	<script src="../../assets/js/jquery-3.1.0.js"></script>
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
				<h3>Users List</h3>
<?php
	$query2 = "SELECT `users`.`id`,`users`.`name`,`users`.`post`,`users`.`username`,`user_role`.`user_role_name` FROM `users` LEFT JOIN `user_role` ON `users`.`user_role_id` = `user_role`.`id`";
	if ($result2 = mysqli_query($dbcon,$query2)) {
		if (mysqli_num_rows($result2) > 0) {
?>
				<table align="center" width="90%" cellpadding="5">
					<tr>
						<th>Name</th>
						<th>Post</th>
						<th>Username</th>
						<th>Role</th>
						<th>Action</th>
					</tr>
<?php
			while ( $row2 = mysqli_fetch_assoc($result2)) {
?>

				<tr>
					<td><?php echo $row2['name']; ?></td>
					<td><?php echo $row2['post']; ?></td>
					<td><?php echo $row2['username']; ?></td>
					<td><?php echo $row2['user_role_name']; ?></td>
					<td><a href="?del=<?php echo $row2['id']; ?>" style="text-decoration: none; color: inherit;"> Delete</a></td>
				</tr>
<?php
			}
			echo "</table>";
		}
		else
		{
			echo "<h2>No User found!! </h2>";
		}
	}
?>
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