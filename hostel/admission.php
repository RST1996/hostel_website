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
			<li><a href="#home">Home</a></li>
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
		<div class="title">Hostel Admission Criteria:</div>
		<blockquote>
			•	The admissions are done Class wise, Branch wise and on merit basis and as per State Government reservation rules.<br/>
			•	Merit list is prepared on Marks of Odd Semester and students having no backlog Subjects. The students having backlog subjects have second choice in hostel admission.<br/>
			•	It is mandatory to pay full hostel fees before the admission.<br/>
			•	Principal reserves the right to deny or cancel admission at any stage to any student.<br/>
			•	Ragging is strictly prohibited.<br/>

		</blockquote>
		<blockquote>
			The Maharashtra Legislative Council has passed a bill (L C Bill Number ix of 1999) to prohibit ragging in educational institutions in the State of Maharashtra on 7th April 1999. As per this bill - Ragging within or outside of any educational institution is strictly prohibited.
		</blockquote>
		<blockquote>
			Whosoever directly or indirectly commits, participate or propagate ragging within or outside any educational institution shall on conviction, be punished, as per rules. Any student convicted of an Offence of ragging shall be dismissed from the educational institution and such student shall not be admitted to any other educational institution for a period of five years from the date of order of such Dismissal. 
		</blockquote>
		<div class="title">Hostel admission Fees Structure:</div>
		<table align="center" cellpadding="8px" cellspacing="10px">
			<tr>
				<th>Hostel</th>
				<th>Hostel Maintenance  fees</th>
				<th>Medical fees</th>
				<th>Caution money/Security deposite</th>
				<th>Total fees</th>
			</tr>
			<tr>
				<td class="center">Boys Hostel</td>
				<td>2000 Rs./yr</td>
				<td>75 Rs./yr</td>
				<td>2000 Rs./yr</td>
				<td class="center">4075 Rs./yr</td>
			</tr>
			<tr>
				<td class="center">Girls Hostel</td>
				<td>2000 Rs./yr</td>
				<td>75 Rs./yr</td>
				<td>2000 Rs./yr</td>
				<td class="center">4075 Rs./yr</td>
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