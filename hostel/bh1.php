<?php
	require_once 'assets/includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Boys Hostel 1 | GEoE, Jalgaon</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="assets/js/jquery-3.1.0.js"></script>
	<script src="assets/js/core.js"></script>
	<script src="assets/js/slider.js"></script>
</head>
<body>
	<div id="header">
		<div class="title">Boys Hostel 1</div>
		<div class="clgname">GCoEJ</div>	
	</div>
	<div id="nav_menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="#facilities">Facilities</a></li>
			<li><a href="#faculty">Faculty</a></li>
			<li><a href="#committee">Committees</a></li>
			<li><a href="rules.php">Rules</a></li>
		</ul>	
	</div>
	<div id="combine">
		<div id="notice">
			<p style="text-decoration: underline;text-align: center;">NOTICE BOARD</p>
			<ul>
<?php
	$not_query = "SELECT `title`, `path` FROM `notices` ORDER BY `id` DESC LIMIT 5";
	if ($res = mysqli_query($dbcon,$not_query)) {
		while ($row = mysqli_fetch_assoc($res)) {
?>
				<li><a  target="_blank" href="<?php echo $row['path']; ?>"><?php echo $row['title']; ?></a></li>
<?php
		}
	}
?>
			</ul>
			<div class="completelink">
				<a href="notices.php">View All</a>
			</div>
		</div>
		<div id="slides">
			<img id="slide" onMouseover="stopShow()" onMouseout="runShow()" src="assets/images/hostel1.jpg">
		</div>
	</div>
	<div id="faculty">
		<h3> Faculty Members: </h3>
		<p>
			<span>Rector:- </span>&nbsp;&nbsp;
<?php
	$sel_query = "SELECT `name`, `post`FROM `users` WHERE `user_role_id` = '7' ";
	$res = mysqli_query($dbcon,$sel_query);
	$row = mysqli_fetch_assoc($res);
	echo $row['name'].",&nbsp;&nbsp;".$row['post'];
?>
			<br><br>
			<span>Warden:- </span>&nbsp;&nbsp;
<?php
	$sel_query = "SELECT `name`, `post`FROM `users` WHERE `user_role_id` = '3' ";
	$res = mysqli_query($dbcon,$sel_query);
	$row = mysqli_fetch_assoc($res);
	echo $row['name'].",&nbsp;&nbsp;".$row['post'];
?>
			<br><br>
			<span>Hostel Clerk:- </span>&nbsp;&nbsp;
<?php
	$sel_query = "SELECT `name`FROM `users` WHERE `user_role_id` = '6' ";
	$res = mysqli_query($dbcon,$sel_query);
	$row = mysqli_fetch_assoc($res);
	echo $row['name'];
?>
			<br><br>
		</p>
	</div>
	<div id="facilities">
		<h3> Facilities</h3>
		<p>
			Following facilities are available in the hostel..<br>

			<ul>
				<li>Mess In-built Mess Facility</li>
				<li>Drinking Water Facility:- Water Purifier, Water Cooler</li>
				<li>Newspaper / Reading Room Facilities</li>
				<li>Gym Facility</li>
				<li>Security Facility</li>
			</ul>
		</p>
	</div>
	<div id="committee">
		<h3> Committees</h3>
		<p>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Each year the hostel committe (Hostel Student Council) is formed for the better administration of the hostel & to make the student as a part of the administrative body of the hostel which reptresents the students of the hostel to the administration. This committee acts as the interface between the hostel administration and the hostel students.This helps the administrative body as the well as the students to understand th scenerio in the hostel from both prespectives. <br>

		</p>
	</div>
	<div id="footer">
		<table>
			<tr>
			<td align=center>
		    <h4>Government College of Engineering, Jalgaon</h4>
			<p>NH - 6, Vidyut Colony, Jalgaon - 425001</p> </td>
		    <td align=right>
				Designed & Hosted By <br/>Department of Computer Engineering,<br/> GCOE, Jalgaon</td> 
			</tr>
			<tr>
			<td colspan=2>
				<div class="copynote">
		        	&copy;  GCOEJ | All rights reserved.
		        </div>
		    </td>
			</tr>
		</table>
	</div>
</body>
</html>