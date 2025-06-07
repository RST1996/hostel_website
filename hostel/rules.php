<?php
	require_once 'assets/includes/connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel | Rules </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="assets/js/jquery-3.1.0.js"></script>
	<script src="assets/js/core.js"></script>
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
			<li><a href="#">Rules &amp; Regulations</a></li>
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
	<div id="rules_section">
		<h2 align="center" style="text-decoration: underline;font-size: 2.1em;">HOSTEL RULES AND REGULATIONS</h2>
		<p >
			<ul style="padding-left: 50px;padding-right: 50px;text-align: justify;" >
				<li>Students must occupy rooms specifically allotted to them. They are not allowed to change rooms except with the written permission of the Warden/ Chief Warden. However, students can pair up as per their choice within first few days. They may contact their Hostel Warden for this purpose.</li><br>
				<li>Change of accommodation from one hostel to another during a term is generally not permitted. Allotment made to a student is subject to cancellation if he/she fails to occupy the room in the prescribed time. Students will also forfeit their rooms if they fail to clear all their dues to the hostel by the appointed day. In such cases they will be asked to vacate the hostel.</li><br>
				<li>The Warden or Rector reserves the right to break or open the rooms in case of any violation of hostel rules, suspected unlawful activities or on the basis of security risk perceived.</li><br>
				<li>Once a student vacates the hostel, he/she will not be re-allotted hostel accommodation for a minimum period of 6 months. Every attempt will be made to provide hostel accommodation to all students.</li><br>
				<li>When there is a vacant seat in the room, the duplicate key of the room must be deposited with the Clerk of the block to facilitate allotment of the vacant seat to another student.</li><br>
				<li>No student should stay away from his/her room during the night except with prior written permission of the warden. Any student, who wishes to leave the campus temporarily or otherwise, should obtain the permission of warden in writing. Those applying for permission must state the date and time of his/her intended departure and return as well as the destination and enter all these details in the in-out register maintained in every hostel.</li><br>
				<li>Students are requested to avoid singing aloud, shouting or making all types of noises which are likely to distract the attention of those who may be studying in their rooms or hostel libraries.</li><br>
				<li>Pets of all kinds are prohibited inside the hostel. Feeding stray dogs or cats in the hostel premises is not permitted.</li><br>
				<li>The students are advised not to keep large amount of cash or valuables in the room. The student is responsible for the safety of his/ her belongings inside the room.</li><br>
				<li>Any damage/breakage to hostel property will be charged to the occupants of the room/ block with a fine. Disciplinary action will also be initiated.</li><br>
				<li>Cooking in hostel rooms is not permitted.</li><br>
				<li>Playing of loud music and disturbing the quite atmosphere by any other means is not permitted as it disturbs the fellow hostel mates. You may use earphones while listening to music. Playing any kind of outdoor games inside the hostels/corridors is not permitted.</li><br>
				<li>Neither is partying in the rooms, in the corridors or anywhere in the hostel permitted whatever be the occasion.</li><br>
				<li>RAGGING IN ANY FORM IS STRICTLY PROHIBITED INSIDE AND OUTSIDE THE CAMPUS. STRICT ACTION WILL BE TAKEN AGAINST THE DEFAULTERS. NO LENIENCY WILL BE SHOWN TO THE OFFENDERS. SUSPENSION AND OR WITHDRAWAL FROM THE HOSTEL/ COLLEGE IS ONE OF THE ACTIONS TAKEN PROMPTLY
THE MAHARASHTRA LEGISLATIVE COUNCIL HAS PASSED A BILL (L C BILL NUMBER IX OF 1999) TO PROHIBIT RAGGING IN EDUCATIONAL INSTITUTIONS IN THE STATE OF MAHARASHTRA ON 7TH APRIL 1999. AS PER THIS BILL - RAGGING WITHIN OR OUTSIDE OF ANY EDUCATIONAL INSTITUTION IS STRICTLY PROHIBITED. SUPREME COURT HAS ALSO DEFINED RAGGING AS A CRIMINAL OFFENCE.
WHOSOEVER DIRECTLY OR INDIRECTLY COMMITS, PARTICIPATES IN, ABETS OR PROGAGATES RAGGING WITHIN OR OUTSIDE ANY EDUCATIONAL INSTITUTION SHALL ON CONVICTION, BE PUNISHED, AS PER THE RULES.<br/>ANY STUDENT CONVICTED OF AN OFFENCE OF RAGGING SHALL BE DISMISSED FROM THE EDUCATIONAL INSTITUTION AND SUCH STUDENT SHALL NOT BE ADMITTED TO ANY OTHER EDUCATIONAL INSTITUTION FOR A PERIOD OF FIVE YEARS FROM THE DATE OF ORDER OF SUCH DISMISSAL.
</li><br>
			</ul>
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
	<script src="assets/js/jquery-3.1.0.js"></script>
	<script src="assets/js/core.js"></script>
</body>
</html>