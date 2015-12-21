var assignments = [];
$(document).ready(function() {
	// Get courses
	$.ajax("user.php", {type: 'GET',
						datatype: "json",
						data: 'getCourses=1',
						success: function(data) {
							// data contains the JSON object containing an array of the users classes
							loadClasses(data);
						},
						error: function(jqXHR, status, error) {
							// This function will be called if this ajax HTTP request encounters an error.
							// jqXHR.responseText represents an error message that I've created server-side.
							document.getElementByID('error').innerHTML = jqXHR.responseText;
						}
	});
	// Get assignments
	$.ajax("user.php", {type: 'GET',
						data: 'getAssignments=1',
						datatype: 'json',
						success: function(data) {
							postEvents(data); //Post assignments
        				},
        				error: function(jqXHR, status, error) {
        					document.getElementById('error').innerHTML = jqXHR.responseText;
        				}
    });
    
	$('#add_p_class').on("click", function(evt){
	    document.getElementById("create_class_form").style.display = "inline";
	})
	
	$('#add_s_class').on("click", function(evt){
	    document.getElementById("search").style.display = "inline";
	})
	
	$('#create_class').on("click", function(evt){
		title = $('#class_title').val();
    	if (title === "") {
    		document.getElementById('error').innerHTML = "Please enter a title.";
    	} else {
    		new_class = $('#create_class_form').serialize();
    		createClass(new_class);
    		document.getElementById("create_class_form").style.display = "none";
    	}
	})
	
	$('#delete_class').on("click", function(evt){
	    document.getElementById("delete_form").style.display = "inline";
	})
	
	$('#confirm_delete').on("click", function(evt){
	    document.getElementById("delete_form").style.display = "none";
	    delete_info = "cid=" + $('#delete_cid').val() + "&deleteCid=1";
	    $.ajax("user.php", {type: 'GET',
	    					data: delete_info,
	    					datatype: 'json',
	    					success: function(data) {
	    						document.getElementById('results').innerHTML = "Cid " +data.cid+ " deleted";
	    						location.reload(true);
	    					}
	    })
	})
	
	$('#add_assignment').on("click", function(evt){
	    document.getElementById("assignment_form").style.display = "inline";
	})
	
//	$('#create_assignment').on("click", function(evt){
//	    document.getElementById("assignment_form").style.display = "none";
//	})
	
	$('#searchbutton').on("click", function(e) {
		title = $('#searchbox').val();
		if (title === "") {
			document.getElementById('results').innerHTML = 'Please search for a course.'
		} else {
			str = "str=" + title
			$.ajax("course.php", {type: 'GET',
									datatype: 'json',
									data: str,
									success: function (data) {
										for(i = 0; i < data.length; i++) {
												$('#results').append('<p>' + data[i].title + '</p>')
										}
									}
			})
		}
	})
	 
	$('#create_assignment').on("click", function(e) {
		date = $("#duedate").val();
		title = $("#title").val();
		description = $("#description").val();
		cid = $("#cid").val();
		
		assignment_info = $('#assignment').serialize();
		$.ajax("assignment.php", {type: 'POST',
								data: assignment_info,
								datatype: 'json',
								success: function (data) {
									location.reload(true);
								}
		})
	})
	$('#add_assignment').on("click", function(e) {
		document.getElementById("assignment_form").style.display = "inline";
	})
	
	function postEvents(data) {
		assignments = [];
		for (i = 0; i < data.length; i++) {
			var event = {id:	data[i].aid,
						title:	data[i].title,
						start:	data[i].duedate,
						desc: data[i].description,
						allDay: true//,
					///	color: red //rgb(20*intval(data[i].cid), 20*intval(data[i].cid), 20*intval(data[i].cid))
			};
			assignments.push(event);
		}
		
		$('#calendar').fullCalendar({
				        // put your options and callbacks here
				        header: {
				        	left: 'prev,next today',
				        	center: 'title',
				        	right: 'month'
				        },
				        editable: true,
				        height: 550,
				        theme: true,
				        events: assignments,
				        eventClick: function(event) {
					        if (event.desc) {
					            alert(event.desc);
					        }
					    }
		});
	}
	
	
});


function search(type) {
	showElem("search_bar");
}

function display(usertype) {
	if(usertype == "student") {
    	$("#status").load("Student.php"); 
    }
	if(usertype == "professor") {
		$("#status").load("Professor.php");
	}
}


function loadClasses(data) {
	for (i=0; i<data.length; i++) {
		var cid = data[i].cid;
		var title = data[i].title;
		$("#classes").prepend('<li name="class" value=' + cid + '>' + title + '</li><br>');
		$("#cid").append('<option value="' + cid + '">' + title + '</option>');
		$("#delete_cid").append('<option value=' + cid + '>' + title + '</option>');
	}
}


function createClass(new_title) {
	$.ajax("course.php", {	type: 'POST',
							data: new_title,
							datatype: 'json',
							success: function(data, status, jqXHR) {
								loadClasses(data);
								location.reload(true);
							},
							error: function(jqXHR, status, error) {
								document.getElementById('error').innerHTML = jqXHR.responseText;
							}
	});
}