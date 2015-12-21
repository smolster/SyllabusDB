<!DOCTYPE html>
<html>
	<head>
		<title>Your Syllabi</title>
		<link rel="stylesheet" type="text/css" href="SyllabusDB.css">
		<script src="/Courses/comp426-f15/jquery-1.11.3.js"></script>
		<script src="js/SyllabusDB.js"></script>
		<link rel='stylesheet' href='../fullcalendar-2.5.0/fullcalendar.css' />
		<link rel="stylesheet" href='../jquery-ui-1.11.4.custom/jquery-ui.min.css'>
		<script src='../jquery-ui-1.11.4.custom/external/jquery/jquery.js'></script>
		<script src='../jquery-ui-1.11.4.custom/jquery-ui.min.js'></script>
		<script src='../fullcalendar-2.5.0/lib/jquery.min.js'></script>
		<script src='../fullcalendar-2.5.0/lib/moment.min.js'></script>
		<script src='../fullcalendar-2.5.0/fullcalendar.js'></script>
	</head>
	<body>
		<div id="sidebar">
			<div><div class="text">Classes:</div><br>
				<ul id="classes">
	<!--			<input id="view_classes" type="button" class="button" value="View Classes"><br><br>	-->
				</ul>
			</div>
			<input id="add_s_class" type="button" class="button" value="Add Class"><br>
			<div id="search">
				<input id='searchbox' type='text' name='title' placeholder='Search by class title'>
				<input id='searchbutton' type='button' value='Search'>
				<br>
				<div id="results"></div>
			</div>
			<input id="delete_class" type="button" class="button" value="Delete Class"><br><br>
			<div id="delete_form">Delete Class: 
				<form id="delete"> 
					<select id="delete_cid" name="cid"></select><br>
					<input class='button' id='confirm_delete' type='button' name='confirm_delete' value='Confirm Delete'>
				</form>
			</div>
		</div>
		<div id="container">
			<div id="calendar"></div>
		</div>
	</body>
</html>