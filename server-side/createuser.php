<!DOCTYPE html>
<html>
	<head>
		<title>Create New Account</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="../jquery-1.11.3.js"></script>
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
