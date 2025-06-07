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
			<li><a href="#">Administration Staff</a></li>
			<li><a href="hsc.php">Student Council</a></li>
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
		<div class="title">Administration Staff</div>
		<table align="center" cellpadding="8px" cellspacing="10px">
			<tr>
				<th>Name</th>
				<th>Designation</th>
				<th>Post</th>
				
				<th>Contact</th>
			</tr>
			<tr>
				<td style="text-align: left">Dr. R. P. Borkar</td>
				<td style="text-align: left">Principal</td>
				<td style="text-align: left">Overall Administrator</td>
				
				<td>201</td>
			</tr>
			<tr>
				<td style="text-align: left">Prof. A. M. Dongardive</td>
				<td style="text-align: left">Asst. Professor in Instrumentation</td>
				<td style="text-align: left">Rector</td>
				
				<td>256</td>
			</tr>
			<tr>
				<td style="text-align: left">Prof. M. B. Bhore</td>
				<td style="text-align: left">Asst. Professor in Mechanical</td>
				<td style="text-align: left">Warden, Boys Hostel 1</td>
				
				<td>237</td>
			</tr>
			<tr>
				<td style="text-align: left">Prof. W. A. Gavhane</td>
				<td style="text-align: left">Asst. Professor in Electrical</td>
				<td style="text-align: left">Warden, Boys Hostel 2</td>
				
				<td>267</td>
			</tr>
			<tr>
				<td  style="text-align: left">Prof. S. G. Kamble</td>
				<td style="text-align: left">Asst. Professor in Mechanical</td>
				<td style="text-align: left">Warden, Girls Hostel</td>
				
				<td>303</td>
			</tr>
			<tr>
				<td style="text-align: left">Shri V. H. Dukare</td>
				<td style="text-align: left">Hostel Clerk</td>
				<td style="text-align: left">Clerk (Boys Hostel)</td>
				
				<td>9545131490</td>
			</tr>
			<tr>
				<td style="text-align: left">Shri Bhadadive</td>
				<td style="text-align: left">Hostel Clerk</td>
				<td style="text-align: left">Clerk (Girls Hostel)</td>
				
				<td>-</td>
			</tr>
		</table>

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