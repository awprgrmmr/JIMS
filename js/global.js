$("input").keypress(function(event) {
	if (event.which == 13) {
		event.preventDefault();
		var form = $(this).closest("form");
		var url = form.attr('action');
		var data = form.serialize();

		$.post(url, data, function(data) {
			if (data != '') console.log(data);
			else location.reload();
		});
	}
});

$('form').submit(function(event) {
	event.preventDefault();
	$.post($(this).attr('action'), $(this).serialize(), function(data) {
		if (data != '') console.log(data);
		else location.reload();
	});
})
