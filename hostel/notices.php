<?php
	require_once 'assets/includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel | GEoE, Jalgaon</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body >
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
			<li><a href="hsc.php">Student Council</a></li>
			<li><a href="hsmc.php">Mess Council</a></li>
			<li><a href="downloads.php">Downloads</a></li>
		</ul>	
	</div>
	<div class="pagecontent">
		<h3>Notices</h3>
<?php
	$sel_query = "SELECT  `title`, `path`, `added_on` FROM `notices`";
	if ($sel_res = mysqli_query($dbcon,$sel_query)) {
		if (mysqli_num_rows($sel_res) == 0) {
			echo "<h3>Currently No Notices are available....</h3>";
		}
		else
		{
?>
				<table width="90%" cellpadding="8px" cellspacing="10px" align="center">
					<tr>
						<th>Title</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
<?php
			while ($row = mysqli_fetch_assoc($sel_res)) {
?>
					<tr>
						<td>
							<?php echo $row['title']?>
						</td>
						<td>
							<?php echo $row['added_on']?>
						</td>
						<td>
							<a target="_blank" href="<?php echo $row['path']?>">View</a>
						</td>
					</tr>
<?php				
			}
			echo "</table>";
		}
	}
?>
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
