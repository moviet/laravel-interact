$(document).ready(function () {

		$('.search-profile').keyup(function(e) {
					var find = $('.search-profile').val().replace(" ", "+");

					if (e.keyCode == 13 && find !== '') {						
							window.location.href = "/search/" + encodeURIComponent(find);

					} else {
							return false;
					}
		});
});
