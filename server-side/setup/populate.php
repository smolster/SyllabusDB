<!DOCTYPE html>
<html>
	<head>
		<title>Populate</title>
	</head>
	<body>
		<?php
			$mysqli = new mysqli("classroom.cs.unc.edu", "smolster", "Moleboy4=Moleboy4", "smolsterdb");
			
			$insert = $mysqli->query("INSERT INTO Users VALUES ('pfarber', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('kjohnson', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('jdoe', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('pdow', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('pmolster', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('cfolt', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('sjobs', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('bobama', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('jbush', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('mdodson', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('bsmith', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('lgill', 'password', 'student')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('kmp', 'password', 'professor')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('fuchs', 'password', 'professor')");
			$insert = $mysqli->query("INSERT INTO Users VALUES ('gb', 'password', 'professor')");
			
			$insert = $mysqli->query("INSERT INTO Courses (login, title) VALUES ('kmp', 'COMP401: Introduction to Programming')");
			$insert = $mysqli->query("INSERT INTO Courses (login, title) VALUES ('kmp', 'COMP426: Advanced Web Programming')");
			$insert = $mysqli->query("INSERT INTO Courses (login, title) VALUES ('gb', 'COMP521: Files and Databases')");
			$insert = $mysqli->query("INSERT INTO Courses (login, title) VALUES ('fuchs', 'COMP411: Computer Organization')");
			
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (1, 'prfarber')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (1, 'kjohnson')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (1, 'jdoe')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (1, 'pdow')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (1, 'lgill')");
			
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (2, 'pmolster')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (2, 'cfolt')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (2, 'sjobs')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (2, 'bobama')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (2, 'jbush')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (2, 'lgill')");
			
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (3, 'bobama')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (3, 'mdodson')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (3, 'bsmith')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (3, 'jbush')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (3, 'lgill')");
			
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'pfarber')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'mdodson')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'jdoe')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'bsmith')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'bobama')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'cfolt')");
			$insert = $mysqli->query("INSERT INTO Enrolled VALUES (4, 'lgill')");
			
			
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (1, '2016-01-29', 'Midterm 1', 'Midterm 1 will cover chapters 1-6. Topics to focus study on will be released two weeks before the exam.')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (1, '2016-01-25', 'Assignment 1', 'Assignment 1: Java Review: Please design a fully operational four-function calculator UI using standard MVC techniques in Java.')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (1, '2016-02-05', 'Assignment 2', 'Assignment 2: CSS Fun: Please create your own CSS stylesheet for the following webpage using at least 10 selectors<link here>')");
										
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title)
										VALUES (2, '2016-01-26', 'Midterm 1')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (2, '2016-02-02', 'Lab 2', 'Lab 2 due at start of class.')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title)
										VALUES (2, '2016-02-02', 'Guest Lecture')");
										
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (3, '2016-01-26', 'Homework #1 Due', 'Problems: 6.1--12, 14, 26, 32a-c; 6.3--6a-d, 10, 18, 20, 42)");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (3, '2016-01-28', 'Homework #2 Due', 'Problems: 7.1--8, 12, 22, 36; 7.2--10, 19, 24, 25')");
			
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title)
										VALUES (4, '2016-01-29', 'No Class--Work on Projects')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (4, '2016-02-01', 'Project Presentations', 'Presenting today: P. Farber & M. Dodson')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (4, '2016-02-03', 'Project Presentations', 'Presenting today: J. Doe & B. Smith')");
			$insert = $mysqli->query("INSERT INTO Assignments (cid, duedate, title, description)
										VALUES (4, '2016-02-05', 'Project Presentations', 'Presenting today: B. Obama & C. Folt')");
			
			$mysqli->close();
			
			echo 'Database Populated.';
		?>
	</body>
</html>