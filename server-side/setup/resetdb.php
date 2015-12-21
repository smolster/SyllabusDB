<html>
	<head>
		<title>Reset Database</title>
	</head>
	<body>
		<?php
		// Connecting to database
			$conn = mysqli_connect("classroom.cs.unc.edu","smolster","Moleboy4=Moleboy4", "smolsterdb");
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
		// Dropping tables/views if they exist
			$sql = "DROP TABLE IF EXISTS Enrolled, Assignments, Courses, Users";
			
			if (mysqli_query($conn, $sql)) {
				echo "Tables dropped successfully.\n";
			} else {
				echo "Error dropping tables: " . mysqli_error($conn) . "\n";
			}
		
		// Creating tables	
			$sql = "CREATE TABLE IF NOT EXISTS Users (
					login VARCHAR(255) PRIMARY KEY,
					password VARCHAR(255) NOT NULL,
					usertype ENUM('student', 'professor') NOT NULL
					)";
					
			if (mysqli_query($conn, $sql)) {
				echo "Table Users created successfully.\n";
			} else {
				echo "Error creating table Users: " . mysqli_error($conn) . "\n";
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS Courses (
					cid INTEGER AUTO_INCREMENT PRIMARY KEY,
					login VARCHAR(255) NOT NULL,
					title VARCHAR(255) NOT NULL,
					FOREIGN KEY (login) REFERENCES Users (login)
					)";
			
			if (mysqli_query($conn, $sql)) {
				echo "Table Courses created successfully.\n";
			} else {
				echo "Error creating table Courses: " . mysqli_error($conn) . "\n";
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS Assignments (
					aid INTEGER AUTO_INCREMENT PRIMARY KEY,
					cid INTEGER NOT NULL,
					duedate DATE NOT NULL,
					title VARCHAR(255) NOT NULL,
					description TEXT,
					FOREIGN KEY (cid) REFERENCES Courses (cid)
					)";
					
			if (mysqli_query($conn, $sql)) {
				echo "Table Assignments created successfully.\n";
			} else {
				echo "Error creating table Assignments: " . mysqli_error($conn) . "\n";
			}
			
			$sql = "CREATE TABLE IF NOT EXISTS Enrolled (
					cid INTEGER NOT NULL,
					login VARCHAR(255) NOT NULL,
					FOREIGN KEY (cid) REFERENCES Courses (cid),
					FOREIGN KEY (login) REFERENCES Users (login)
					)";
					
			if (mysqli_query($conn, $sql)) {
				echo "Table Enrolled created successfully.\n";
			} else {
				echo "Error creating table Enrolled: " . mysqli_error($conn) . "\n";
			}
			
			mysqli_close($conn);
		?>
	</body>
</html