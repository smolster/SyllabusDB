$.ajax("user.php", {type: 'GET',
							datatype: 'json',
							data: 'getAssignments=1',
							success: function(data) {
								postEvents(data);
							}
	});

function postEvents(assignments) {
	for (i = 0; i < assignments.length; i++) {
		var event = {id:	assignments[i].aid,
					title:	assignments[i].title,
					start:	assignments[i].duedate
		};
		$.fullCalendar('renderEvent', event, true);
	}
}