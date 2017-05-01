$(document).ready(function() {

	var calendarOptions = {
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		events: [
			{
				title: 'Hello',
				start: moment().add('days', 1),
				end: moment().add('days', 2),
				color: '#333' 
			}
		]
	};

	$('#calendarWidget').fullCalendar(calendarOptions);
});