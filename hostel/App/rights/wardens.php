<?php
	session_start();
	require_once '../../assets/includes/connection.php';
	$page_name = "rights/wardens.php";
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

	if (isset($_POST['updategh'])) {
		$name = htmlentities($_POST['namegh']);
		$post = htmlentities($_POST['postgh']);
		$password = base64_encode(md5($_POST['usernamegh']));
		$id = $_POST['idgh'];

		$upd_query = "UPDATE `users` SET `password`='$password',`name`='$name',`post`='$post' WHERE `id` = '$id'";

		if ($res = mysqli_query($dbcon,$upd_query)) {
			echo "<script> alert('Updated & Reset for GH Successfuly!!'); </script>";
		}
	}

	if (isset($_POST['updatebh1'])) {
		$name1 = htmlentities($_POST['namebh1']);
		$post1 = htmlentities($_POST['postbh1']);
		$password1 = base64_encode(md5($_POST['usernamebh1']));
		$id1 = $_POST['idbh1'];

		$upd_query1 = "UPDATE `users` SET `password`='$password1',`name`='$name1',`post`='$post1' WHERE `id` = '$id1'";

		if ($res = mysqli_query($dbcon,$upd_query1)) {
			echo "<script> alert('Updated & Reset for BH1 Successfuly!!'); </script>";
		}
	}

	if (isset($_POST['updatebh2'])) {
		$name2 = htmlentities($_POST['namebh2']);
		$post2 = htmlentities($_POST['postbh2']);
		$password2 = base64_encode(md5($_POST['usernamebh2']));
		$id2 = $_POST['idbh2'];

		$upd_query2 = "UPDATE `users` SET `password`='$password2',`name`='$name2',`post`='$post2' WHERE `id` = '$id2'";

		if ($res = mysqli_query($dbcon,$upd_query2)) {
			echo "<script> alert('Updated & Reset for BH2 Successfuly!!'); </script>";
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

<!-- -----------------FOR BOYS HOSTEL 1----------------------------- -->

<?php
	$query1 = "SELECT `id`, `username`, `name`, `post` FROM `users` WHERE `user_role_id` = '3' ";
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
				<h3>BOYS HOSTEL 1 WARDEN DETAILS</h3>
				<form action="wardens.php" name="wardenbh1" method="POST">
					<table width="500px" align="center" cellpadding="8">
						<tr>
							<td><label for="name">Name:- </label></td>
							<td><input type="text" name="namebh1" onkeyup="valiname('wardenbh1','name');" id="name" value="<?php echo $row1['name']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="post">Designation:- </label></td>
							<td><input type="text" name="postbh1" onkeyup="validtitle('wardenbh1','post');" id="post" value="<?php echo $row1['post']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="username">Username:- </label></td>
							<td>
								<input type="text" name="usernamebh1" id="username" value="<?php echo $row1['username']; ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="display: none"><div style="display: hidden;"><input type="hidden" name="idbh1" value="<?php echo $row1['id']; ?>" ></div></td>
						</tr>
						<tr>
							<td >

								<input type="button" id="editbtn" name="editbtn" value="Edit" />
							</td>
							<td >
								<input type="submit" id="updatebtn" name="updatebh1" value="Save" disabled />
								
							</td>
						</tr>
					</table>

<!-- -----------------FOR BOYS HOSTEL 2 ----------------------------- -->
<?php
	$query1 = "SELECT `id`, `username`, `name`, `post` FROM `users` WHERE `user_role_id` = '4' ";
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
				<h3>BOYS HOSTEL 2 WARDEN DETAILS</h3>
				<form action="wardens.php" name="wardenbh2" method="POST">
					<table width="500px" align="center" cellpadding="8">
						<tr>
							<td><label for="name1">Name:- </label></td>
							<td><input type="text" name="namebh2" onkeyup="valiname('wardenbh2','name1');" id="name1" value="<?php echo $row1['name']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="post1">Designation:- </label></td>
							<td><input type="text" onkeyup="validtitle('wardenbh2','post1');" name="postbh2" id="post1" value="<?php echo $row1['post']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="username1">Username:- </label></td>
							<td>
								<input type="text" name="usernamebh2" id="username1" value="<?php echo $row1['username']; ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="display: none"><div style="display: hidden;"><input type="hidden" name="idbh2" value="<?php echo $row1['id']; ?>" ></div></td>
						</tr>
						<tr>
							<td >

								<input type="button" id="editbtn1" name="editbtn" value="Edit" />
							</td>
							<td >
								<input type="submit" id="updatebtn1" name="updatebh2" value="Save" disabled />
								
							</td>
						</tr>
					</table>

<!-- ----------------- FOR GIRLS HOSTEL ----------------------------- -->
<?php
	$query1 = "SELECT `id`, `username`, `name`, `post` FROM `users` WHERE `user_role_id` = '5' ";
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
				<h3>GIRLS HOSTEL WARDEN DETAILS</h3>
				<form action="wardens.php" name="wardengh" method="POST">
					<table width="500px" align="center" cellpadding="8">
						<tr>
							<td><label for="name2">Name:- </label></td>
							<td><input type="text" onkeyup="valiname('wardengh','name2');" name="namegh" id="name2" value="<?php echo $row1['name']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="post2">Designation:- </label></td>
							<td><input type="text" onkeyup="validtitle('wardengh','post2');" name="postgh" id="post2" value="<?php echo $row1['post']; ?>" readonly></td>
						</tr>
						<tr>
							<td><label for="username2">Username:- </label></td>
							<td>
								<input type="text" name="usernamegh" id="username2" value="<?php echo $row1['username']; ?>" readonly>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="display: none"><div style="display: hidden;"><input type="hidden" name="idgh" value="<?php echo $row1['id']; ?>" ></div></td>
						</tr>
						<tr>
							<td >

								<input type="button" id="editbtn2" name="editbtn" value="Edit" />
							</td>
							<td >
								<input type="submit" id="updatebtn2" name="updategh" value="Save" disabled />
								
							</td>
						</tr>
					</table>


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

	        $('#editbtn').click(function(){
	        	$("#updatebtn").prop('disabled', false);
	        	$("#name").prop('readonly', false);
	        	$("#post").prop('readonly', false);
	    });
	        $('#editbtn1').click(function(){
	        	$("#updatebtn1").prop('disabled', false);
	        	$("#name1").prop('readonly', false);
	        	$("#post1").prop('readonly', false);
	    });
	        $('#editbtn2').click(function(){
	        	$("#updatebtn2").prop('disabled', false);
	        	$("#name2").prop('readonly', false);
	        	$("#post2").prop('readonly', false);
	    });

	    });


	    });
	</script>
</body>
</html>