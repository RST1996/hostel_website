<?php
	session_start();
	require_once '../../assets/includes/connection.php';
	$page_name = "rights/addnotice.php";
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

	if (isset($_POST['addnotice'])) {
		$title = htmlentities($_POST['title']);
		if (isset($_FILES)) {
			if($_FILES['att_file']['type'] == "application/pdf")
			{
				$source = $_FILES['att_file']['tmp_name'];
				$temp = explode(".", $_FILES["att_file"]["name"]);
				$path = "notices/files/".round(microtime(true)) . '.' . end($temp);
				$destination = "../../".$path;
				if (move_uploaded_file($source, $destination)) {
					$uploader_id = $_SESSION['uid'];
					$query = "INSERT INTO `notices` (`id`, `title`, `path`, `uploader_id`) VALUES (NULL, '$title', '$path', '$uploader_id')";
					if ($result = mysqli_query($dbcon,$query)) {
						echo "<script> alert('Notice Added successfully!!'); </script>";
					}
					//echo "FILE UPLOADED SUCCESSFULLY!";
				}
				else
				{
					echo  "<script> alert('Notice not added!!'); </script> ";
				}
				
			}
			else
			{
				echo "<script> alert('Only pdf files are allowed!!'); </script>";
			}
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

					//echo "Query Failed ".mysql_error();
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
				<h3>Add Notice</h3>
				<table width="90%" cellpadding="8px" align="center">
					<form action="addnotice.php" name="addntc" method="POST" enctype="multipart/form-data">
					<tr>
						<td>
							<label for="title">Title</label>
						</td>
						<td>
							<input type="text" onkeyup="validtitle('addntc','title');" name="title" id="title" required/>
						</td>
					</tr>
					<tr>
						<td>
							<label for="att_file">File</label>
						</td>
						<td>
							<input type="file" name="att_file" id="att_file" required/>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="addnotice" value="Upload >>">
						</td>
					</tr>
					</form>
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
	    });
	</script>
</body>
</html>