<?php
	require_once 'assets/includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel | GCoE, Jalgaon</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	Import materialize.css-->
	<!-- <link type="text/css" rel="stylesheet" href="vendors/materialize/css/materialize.min.css"  media="screen,projection"/> -->
	<script src="assets/js/jquery-3.1.0.js"></script>
	<script src="assets/js/core.js"></script>
	<!-- <script type="text/javascript" src="vendors/materialize/js/materialize.min.js"></script> -->
	<script src="assets/js/slider.js"></script>
</head>
<body onload=Loading()>
	<div id="header">
		<div class="title"> Hostels </div>
		<div class="clgname">GCoEJ</div>	
	</div>
	<div id="nav_menu">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="rules.php">Rules &amp; Regulations</a></li>
			<!-- <li id="ddwrapper"><a href="#events">Hostels</a>
			<div class="dropdown">
				<a href="bh1.php">Boys Hostel 1</a>
				<a href="bh2.php">Boys Hostel 2</a>
				<a href="gh.php">Girls Hostel</a>
			</div>
			</li> -->
			<li><a href="admission.php">Admission</a></li>
			<li><a href="admin_staff.php">Administration Staff</a></li>
			<li><a href="#">Student Council</a></li>
			<li><a href="hsmc.php">Mess Council</a></li>
			<li><a href="downloads.php">Downloads</a></li>
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
	<div id="about">
		<div class="title">Student Committees (Hostel Council)</div>
		<blockquote>
			      Each year the hostel committee (Hostel Student Council) is formed for the better administration of the hostel & to make the student as a part of the administrative body of the hostel which represents the students of the hostel to the administration. This committee acts as the interface between the hostel administration and the hostel students. This helps the administrative body as the well as the students to understand the scenario in the hostel from both prospective.
		</blockquote>
		
		
	</div>
	<div id="footer">
		<table>
			<tr>
			<td align=center>
		    <h4>Government College of Engineering, Jalgaon</h4>
			<p>NH - 6, Vidyut Colony, Jalgaon - 425001</p> </td>
		    <td align=right>
				Designed &amp; Hosted By <br/>SDC, Department of Computer Engineering,<br/> GCOE, Jalgaon</td> 
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
	<script src="assets/js/jquery-3.1.0.js"></script>
	<script src="assets/js/core.js"></script>
</body>
</html>