$(".submit").click(function() {
	$(this).closest("form").submit();
});

$('form').submit(function(event) {
	event.preventDefault();
	$.post('actions.php', $(this).serialize(), function(data) {
		switch (data) {
			case '': location.reload(); break;
			default: console.log(data);
		}
	});
})
