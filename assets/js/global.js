$("input").keypress(function(event) {
	if (event.which == 13) {
		event.preventDefault();
		$(this).closest("form").submit();
	}
});

$('form').submit(function(event) {
	event.preventDefault();
	$.post($(this).attr('action'), $(this).serialize(), function(data) {
		if (data != '') console.log(data);
		else location.reload();
	});
})
