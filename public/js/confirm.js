
$(function () {

	$('#signup').click(function(e) {
		e.preventDefault();
		var terms = $("input[type=checkbox]:checked").length;
		var form = $("form[name=register]");

			if (terms == 0) {
					alert('Please accept the terms of user');

					return false;
			} 
	});
});