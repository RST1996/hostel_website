<?php
	session_start();
	require_once '../../assets/includes/connection.php';
	$page_name = "rights/viewnotice.php";
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

	if (isset($_REQUEST['del']) && isset($_REQUEST['path'])) {
		$delid = $_REQUEST['del'];
		$delpath = $_REQUEST['path'];
		$del_query = "DELETE FROM `notices` WHERE `id` = '$delid'";
		if ($res = mysqli_query($dbcon,$del_query)) {
			if (mysqli_affected_rows($dbcon) > 0) {
				unlink("../../".$delpath);
				echo "<script> alert('Notice Successfully deleted!!'); </script>";
				header('Location:viewnotice.php');
			}
			else
			{
				echo "<script> alert('Notice Not found!!'); </script>";
			}
		}
		else
		{
			echo "<script> alert('Failed to delete!!'); </script>";
		}
		header('Location:viewnotice.php');
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
				<h3>NOTICES</h3>
<?php
	$sel_query = "SELECT `notices`.`id`,`notices`.`title`,`notices`.`path`,`users`.`name` FROM `notices` LEFT JOIN `users` ON `notices`.`uploader_id` = `users`.`id`";
	if ($sel_res = mysqli_query($dbcon,$sel_query)) {
		if (mysqli_num_rows($sel_res) == 0) {
			echo "<h3>No Notices Found</h3>";
		}
		else
		{
?>
				<table width="90%" align="center">
					<tr>
						<th>Title</th>
						<th>Uploaded By</th>
						<th colspan="2">Action</th>
					</tr>
<?php
			while ($row = mysqli_fetch_assoc($sel_res)) {
?>
					<tr>
						<td>
							<?php echo $row['title']?>
						</td>
						<td>
							<?php echo $row['name']?>
						</td>
						<td>
							<a href="../../<?php echo $row['path']?>">View</a>
						</td>
						<td>
							<a href="?del=<?php echo $row['id']?>&path=<?php echo $row['path']?>">Delete </a>
						</td>
					</tr>
<?php				
			}
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
	</script>
</body>
</html>