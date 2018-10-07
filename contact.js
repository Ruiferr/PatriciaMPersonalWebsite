$(function() {
	$("#contact-form").on('submit', function(event) {
		event.preventDefault();
		var $form = $(this);
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			success: function(data) {
				$("#contact-form").find("textarea").val('');
				$("#contact-form").find("input").val('');
				alert(data);
			}
		});
	});
});

