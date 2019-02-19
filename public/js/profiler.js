$(function() {

	var profile_alerts = $('#alert').hide();

	$(document).on('change','.profile-upload',function(){

			var img = $('input[type=file]').prop('files')[0];

			var forms = new FormData();
			forms.append('profile', img);

			$.ajaxSetup({
					async: false,
					headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
			});

			$.ajax({
						url: '/photo/post',
						type: "POST",
						enctype: 'multipart/form-data',
						data: forms,
						contentType: false,
						processData: false,
						dataType: 'json',
						success: function (data) {	
								if (data.alerts == 'success') {			
										console.log(data);					
										$('#alert').find('#new-alert').addClass('alert-green').html(data.msg);
										profile_alerts.show();								
										$('#photo-profile').attr('src', data.send);
								} 
						},
						error: function(data) {
							var response = JSON.parse(data.responseText);
							console.log(data);
							$('#alert').find('#new-alert').addClass('alert-red').text(response.message);
							profile_alerts.show();
						}
				})
		});

		$('#friend').on('click', function() {
			$('#my-friend').animate({
				scrollLeft: '+=100'
			}, 300, 'swing');

		});

		$('#find-more-friend').on('click', function() {
			$('#find-friend').animate({
				scrollLeft: '+=100'
			}, 300, 'swing');

		});

		$('#wait-new-friend').on('click', function() {
			$('#wait-friend').animate({
				scrollLeft: '+=100'
			}, 300, 'swing');

		});

		$('#approve-new-friend').on('click', function() {
			$('#new-friend').animate({
				scrollLeft: '+=100'
			}, 300, 'swing');

		});
});