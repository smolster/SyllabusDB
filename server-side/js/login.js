var login, password;

$(document).ready(function() {
	$(":button").click(function() {
		document.getElementById("error").innerHTML = "";
		
		login = $("#login").val();
		password = $("#password").val();
		
		if(login==="" || password==="") {
			document.getElementById("error").innerHTML = "Please enter a login and a password.";
		} else {
			user_info = $("form").serialize();
			attemptLogin(user_info);
		}
	});
});

function attemptLogin (user_info) {
			$.ajax("user.php", {type: "POST",
								data: user_info,
								datatype: "json",
								success: function(data, status, jqXHR) {
									document.getElementById("error").innerHTML = "Success!";
									document.cookie="login=" + login;
									document.cookie="usertype=" + data.usertype;
									if (data.usertype == 'professor') {
										window.location.assign("Professor.php");
									} else {
										window.location.assign("Student.php");
									}
										
								},
								error: function(jqXHR, status, error) {
									document.getElementById("error").innerHTML = jqXHR.responseText;
								}});
}