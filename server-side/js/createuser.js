var login, password, verify, usertype, combo;
var url_base = "http://wwwp.cs.unc.edu/Courses/comp426-f15/users/smolster/Codiad/workspace/cs426/FinalProject/";

$(document).ready(function() {
	$(":button").click(function() {
		
		login = $("#login").val();
		password = $("#password").val();
		verify = $("#verify").val();
		usertype = $("#usertype").val();
		
		if(login==="" || password==="" || verify==="") {
			document.getElementById("error").innerHTML = "Please complete all fields.";
		} else if (password != verify) {
			document.getElementById("error").innerHTML = "Passwords do not match.";
		} else {
			new_user_info = $("form").serialize();
			
			$.ajax("user.php", {type: "POST",
										data: new_user_info,
										datatype: "json",
										success: function(data, status, jqXHR) {
											document.getElementById("error").innerHTML = jqXHR.responseText;
										//	window.location.assign('login.php');
										},
										error: function(jqXHR, status, error) {
											document.getElementById("error").innerHTML = jqXHR.responseText;
										}});
		}
	});
});