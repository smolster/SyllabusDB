<?php
	require_once('orm/User.php');
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	// Get courses or usertype or assignments
		if (isset($_GET['deleteCid'])) {
			$login = $_COOKIE['login'];
			$cid = $_GET['cid'];
			$user = User::findByLogin($login);
			$unenroll = $user->unenrollByCid($cid);
			if ($unenroll) {
				header('Content-type: application/json');
				print(json_encode($unenroll));
				exit();
			}
		}
		if (isset($_GET['getCourses'])) {
		// Looking for courses
			$login = $_COOKIE['login'];
			$user = User::findByLogin($login);
			$courses = $user->getCourses();
			if ($courses === null) {
				header("HTTP/1.0 500 Server Error");
				print("Error finding courses.");
				exit();
			} else if (empty($courses)) {	// Try to find a way to send this message without success code...
				print("No courses found.");
				exit();
			} else {
				header("Content-type: application/json");
				print(json_encode($courses));
				exit();
			}
		} else if (isset($_GET['getAssignments'])) {
		// Looking for assignments
			$login = $_COOKIE['login'];
			$user = User::findByLogin($login);
			$assignments = $user->getAssignments();
			if ($assignments === null) {
				header("HTTP/1.0 500 Server Error");
				print("Error finding assignments.");
				exit();
			} else if ($assignments == 0) {	// Try to find a way to send this message without success code...
				print("No assignments found.");
				exit();
			} else {
				header("Content-type: application/json");
				print(json_encode($assignments));
				exit();
			}
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['usertype'])) {
		// Create new user
			$login = $_POST['login'];
			$password = $_POST['password'];
			$usertype = $_POST['usertype'];
		
			$new_user = User::create($login, $password, $usertype);
			if($new_user == null) {
				header("HTTP/1.0 500 Server Error");
				print("Error creating user.");
				exit();
			} else {
				header("HTTP/1.0 200 Success");
				print("Created new user!");
				exit();
			}
		}
		// Check user (login attempt)
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$user_check = User::findByLogin($login);
		if ($user_check == null) {
			header("HTTP/1.0 500 Server Error");
			print("No account with that login exists.");
			exit();
		} else {
			if ($password == $user_check->getPassword()) {
				header("Content-type: application/json");
				print($user_check->getJSON());
				exit();
			} else {
				header("HTTP/1.0 500 Server Error");
				print("We couldn't find that login/password combination in our database.");
				exit();
			}
		}
	}
?>