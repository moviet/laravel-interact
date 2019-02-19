$(document).ready( function() {
	
	$('button, .post-profile-like-btn').on('click', function(event) {
	event.preventDefault();

	var btn = $(this).closest('.post-like-btn');
	var id = $(this).attr('data-id');
	var token = $(this).attr('data-token');
	var status = $(this).attr('data-status');
	var role = $(this).attr('data-role');
	var liked = $(this).attr('data-lk');

	if (btn.hasClass('profilled') && role == 1) {
			var status = 'liked';	
	} 

	$.ajaxSetup({
			async: false,
			headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
	});
	
	$.ajax({
					url: '/post/reflect',
					type: "POST",
					data: {
							id: id, 
							token: token, 
							status: status,
							like: liked
					},
					cache: false,
					dataType: "json",
					success: function (data) {	
							if (data.msg === 'liked') {							
									$("button[name='lk" + token + "']").addClass('profilled');
									$("#thumbs" + token).removeClass('tohide').html(data.like);	 
					
							} else if (data.msg == 'unliked') { 		
									$("button[name='lk" + token + "']").removeClass('profilled');
									$("#thumbs" + token).addClass('tohide').html(data.like);
							
							} else if (data.msg == 'justunliked') { 		
								$("button[name='lk" + token + "']").removeClass('profilled');
								$("#thumbs" + token).html(data.like);
							}  
					},
					error: function(data) {
							handleRequestError(data);
					}
			})
	});

		$('.btn-upload').on('change',function() {
				var imageName  = $('#upload').prop('files')[0].name;

				$('.span-upload-filename').html(imageName);
			
				fName.replace('C:\\fakepath\\', " ");
		});
});
	