<!DOCTYPE html>
<html>
	<head>
		<title>Create New Account</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="/Courses/comp426-f15/jquery-1.11.3.js"></script>
<!--		<link rel="stylesheet" href='../jquery-ui-1.11.4.custom/jquery-ui.min.css'>
		<script src='../jquery-ui-1.11.4.custom/external/jquery/jquery.js'></script>
		<script src='../jquery-ui-1.11.4.custom/jquery-ui.min.js'></script> -->
		<script src="js/createuser.js"></script>
	</head>
	<body>
		<div>
			<p class="title">Create A New Account</p>
			<form id="createnew">
				<input id="login" name="login" type="text" placeholder="New Login"><br>
				<input id="password" name="password" type="password" placeholder="New Password"><br>
				<input id="verify" type="password" placeholder="Verify Password"><br>
				I am a:<select id="usertype" name="usertype">
					<option value="student">Student</option>
					<option value="professor">Professor</option>
				</select><br>
				<input class="button" type="button" value="Create New Account">
			</form>
			<div id="error"></div>
			<a href="login.php">Login Page</a>
		</div>
	</body>
</html>