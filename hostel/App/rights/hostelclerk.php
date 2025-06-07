<?php
	session_start();
	require_once '../../assets/includes/connection.php';
	$page_name = "rights/hostelclerk.php";
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

	if (isset($_POST['update'])) {
		$name = htmlentities($_POST['name']);
		$post = htmlentities($_POST['post']);
		$password = base64_encode(md5($_POST['username']));
		$id = $_POST['id'];

		$upd_query = "UPDATE `users` SET `password`='$password',`name`='$name',`post`='$post' WHERE `id` = '$id'";

		if ($res = mysqli_query($dbcon,$upd_query)) {
			echo "<script> alert('Updated & Reset Successfuly!!'); </script>";
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
<?php
	$query1 = "SELECT `id`, `username`, `name`, `post` FROM `users` WHERE `user_role_id` = '6' ";
	if ($res = mysqli_query($dbcon,$query1)) {
		if (mysqli_num_rows($res) == 1) {
			$row1 = mysqli_fetch_assoc($res);
		}
		else{
			die('Unexpected circumstances occurd!! Plzz contact support!! :( ');
		}

	}
	else
	{
		die("Failed to load !! :( .. Try again after some time!!");
	}
?>
				<h3>HOSTEL CLERK DETAILS</h3>
				<form action="hostelclerk.php" name="clerk" method="POST">
					<table width="500px" align="center" cellpadding="8">
						<tr>
							<td><label for="name">Name:- </label></td>
							<td><input type="text" onkeyup="valiname('clerk','name');" name="name" id="name" value="<?php echo $row1['name']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="post">Designation:- </label></td>
							<td><input type="text" name="post" onkeyup="validtitle('clerk','post');" id="post" value="<?php echo $row1['post']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="username">Username:- </label></td>
							<td>
								<input type="text" name="username" id="username" value="<?php echo $row1['username']; ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="display: none"><div style="display: hidden;"><input type="hidden" name="id" value="<?php echo $row1['id']; ?>" ></div></td>
						</tr>
						<tr>
							<td >

								<input type="button" id="editbtn" name="editbtn" value="Edit" />
							</td>
							<td >
								<input type="submit" id="updatebtn" name="update" value="Save" disabled />
								
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

	    $('#editbtn').click(function(){
	        	$("#updatebtn").prop('disabled', false);
	        	$("#name").prop('readonly', false);
	        	$("#post").prop('readonly', false);
	    });

	    });
	</script>
</body>
</html>