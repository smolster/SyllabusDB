<?php
	require_once('orm/Course.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	// Get assignments or 'delete' or search
	if (isset($_GET['str'])) {
		$str = $_GET['str'];
		$results = Course::searchByTitle($str);
		if ($results == 0) {
			print("No results.");
			exit();
		} else {
			header('Content-type: application/json');
			print(json_encode($results));
			exit();
		}
	}
		$cid = $_GET['cid'];
		$assignments = Course::findByCid($cid)->getAssignments();
		header("Content-type: application/json");
		print (json_encode($assignments));
		exit();
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Create a course (must be professor)
		$login = $_COOKIE['login'];
			// Check if professor? //
		$title = $_POST['title'];
		$new_course = Course::create($login, $title);
		if ($new_course == null) {
			header("HTTP/1.0 500 Server Error");
			print("Could not create new class.");
			exit();
		} else {
			header("Content-type: application/json");
			print($new_course->getJSON());
			exit();
		}
	}
?>