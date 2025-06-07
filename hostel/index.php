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
		<div class="title">About Hostels...</div>
		<blockquote>
			Government College of Engineering, Jalgaon is a well-known college in the north Maharashtra university region. So many students from different regions of the state & country are perceiving their studies in this college. To provide accommodation facilities for such students, Government College of Engineering, Jalgaon has hostel facilities. College has 3 hostels within its campus which includes 2 for boys and 1 for girls. The Hostel Facilities are very good and the environment in the hostel is also suitable to flourish.  
		</blockquote>
		
		<p>Below is the list of hostels and their inkate capacities..</p>
		<table align="center" cellpadding="8px" cellspacing="10px">
			<tr>
				<th>Sr.No.</th>
				<th>Hostel</th>
				<th>Intake</th>
			</tr>
			<tr>
				<td class="center">1</td>
				<td><a href="bh1.php">Boys Hostel 1</a></td>
				<td class="center">180</td>
			</tr>
			<tr>
				<td class="center">2</td>
				<td><a href="bh2.php">Boys Hostel 2</a></td>
				<td class="center">180</td>
			</tr>
			<tr>
				<td class="center">3</td>
				<td><a href="gh.php">Girls Hostel</a></td>
				<td class="center">105</td>
			</tr>
		</table>
		<div class="title">Facilities</div>
		<p>Following facilities are available in the hostel</p>
		<ul>
			<li>Co-operative basis Student Mess Facility for each hostel</li>
			<li>Basic amenities like cot, table, chair, cupboard in Student rooms</li>
			<li>Drinking Water Facility : Water Purifier, Water Cooler</li>
			<li>Gymkhana ground near the hostel for playing</li>
			<li>Wi-Fi Internet connectivity for 24 hours</li>
			<li>Newspaper / Reading Room Facilities</li>
			<li>Gym Facility: near the hostel for morning and evening.</li>
			<li>Security Facility : 24*7 Security</li>
		</ul>
		<blockquote>
			Student messes are run on co-operative basis. The students are provided with basic amenities like cot, table, chair, cupboard in their rooms. The rooms are spacious, airy, and illuminated with the surroundings landscaped with greenery. Students’ common rooms have TV sets. The water supply is for 24 hours. The college gymkhana ground is near the hostel for playing cricket, hockey, volley ball, football, basketball, tennis and jogging. Wi-Fi Internet connectivity is also provided in every room for 24 hours. Gym Facility is near the hostel for morning and evening. The hostel campus maintenance like cleaning /sweeping, pest control is out sourced. The electrical repairs, and security services are round the clock.
		</blockquote>
		<div class="title">Dispensary</div>
		<blockquote>A facility of visiting doctor with a separate dispensary block within the hostel premises is available. Separate Doctors are available for boys and girls.</blockquote>
		
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
		<div class="title">Student Committees (Hostel Council)</div>
		<blockquote>
			      Each year the hostel committee (Hostel Student Council) is formed for the better administration of the hostel & to make the student as a part of the administrative body of the hostel which represents the students of the hostel to the administration. This committee acts as the interface between the hostel administration and the hostel students. This helps the administrative body as the well as the students to understand the scenario in the hostel from both prospective.
		</blockquote>
		<div class="title">Rules and Regulations:</div>
		<blockquote>
		Ragging is strictly prohibited. The Maharashtra Legislative Council has passed a bill (L C Bill Number ix of 1999) to prohibit ragging in educational institutions in the State of Maharashtra on 7th April 1999. As per this bill - 
		Ragging within or outside of any educational institution is strictly prohibited. 
		Whosoever directly or indirectly commits, participates in, abets or progagates ragging within or outside any educational institution shall on conviction, be punished, as per the rules. 
		Any student convicted of an offence of ragging shall be dismissed from the educational institution and such student shall not be admitted to any other educational institution for a period of five years from the date of order of such dismissal.
		</blockquote>
		<div class="title">WARNING:</div>
		<blockquote>
		RAGGING of students, physically or mentally, is a blackspot on the society and is a cognisable offence. The students who have to face ragging can lose their mental stability and can spoil their lives. All the students are requested not to do such inhuman &amp; cruel act and eradicate this evil from the society completely. If any student, is found involved in ragging of juniors or any student, then matter will be handled very seriously. The student may be rusticated and the case may be handed over to the Police.
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