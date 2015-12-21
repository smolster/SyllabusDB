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
			<div>Classes:<br>
				<form id="classes">
					<input id="view_classes" type="button" class="button" value="View Classes"><br><br>
				</form>
			</div>
			<div id="status"></div>
		</div>
		<div id="container">
			<div id="calendar"></div>
		</div>
	</body>
</html>