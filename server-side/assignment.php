<?php
	if ($_SERVER['REQUEST_TYPE'] == 'POST') {
		$cid = $_POST['cid'];
		$duedate = $_POST['duedate'];
		$title = $_POST['title'];
		$description = $POST['description'];
		
		$assignment = Assignment::create($aid, $cid, $duedate, $title, $description);
		if ($assignment == null) {
			header("HTTP/1.0 500 Server Error");
			print("No account with that login exists.");
			exit();
		} else {
			header("Content-type: application/json");
			print($assignment->getJSON());
			exit();
		}
	}
?>