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
			<ul id="classes" class="color">
<!--			<input id="view_classes" type="button" class="button" value="View Classes"><br><br>	-->
			</ul>
			</div>
			<input id="add_p_class" type="button" class="button" value="Add Class"><br>
			<form id="create_class_form" class="color"> Please enter your official class name:
				<input id="class_title" type="text" name="title" placeholder="i.e. COMP 426">
				<input id="create_class" type="button" class="button" value="Create Class"> 
			</form> 
			<div id="error"></div><br>
			<input id="add_assignment" type="button" class="button" value="Add Assignment"><br><br>
			<div id="assignment_form" class="color">Add Assignment: 
				<form id="assignment" class="color"> 
					<select id="cid" name="cid"></select><br>
					Date:<input id='duedate' name='duedate' type='text'><br>
					Title:<input id='title' name='title' type='text'><br>
					Description:<textarea id='description' name='description' rows='7' cols='35'></textarea> 
					<input class='button' id='create_assignment' type='button' name='create_assignment' value='Create Assignment'>
				</form>
			</div>
		</div>
		<div id="container">
			<div id="calendar"></div>
		</div>
	</body>
</html>