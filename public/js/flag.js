$(document).ready( function() {
	
		$('button, .post-like-btn').on('click', function(event) {
		event.preventDefault();

		var btn = $(this).closest('.post-like-btn');
		var id = $(this).attr('data-id');
		var token = $(this).attr('data-token');
		var status = $(this).attr('data-status');
		var role = $(this).attr('data-role');
		var account = $(this).attr('data-admin');
		var liked = $(this).attr('data-lk');
		var that = this

		if (btn.hasClass('filled') && role === 1) {
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
								admin: account,
								like: liked
						},
						cache: false,
						dataType: "json",
						success: function (data) {					
								if (data.msg === 'liked') {							
										$("button[name='lk" + token + "']").addClass('filled');
										$("#thumbs" + token).removeClass('tohide').html(data.like);	 
										$(that).attr('data-lk', data.counts);
										$(that).attr('data-status', data.thumb);
						
								} else if (data.msg == 'unliked') { 		
										$("button[name='lk" + token + "']").removeClass('filled');
										$("#thumbs" + token).addClass('tohide').html(data.like);
										$(that).attr('data-lk', data.counts);
										$(that).attr('data-status', data.thumb);
								
								} else if (data.msg == 'justunliked') { 		
										$("button[name='lk" + token + "']").removeClass('filled');
										$("#thumbs" + token).html(data.like);
										$(that).attr('data-lk', data.counts);
										$(that).attr('data-status', data.thumb);
								}  
						},
						error: function(data) {
								handleRequestError(data);
						}
				})
		});

		$('.btn-upload').on('change',function(e) {
				e.preventDefault();
				var file = document.querySelector("#upload");

				if (/\.(jpe?g|jpg|png|gif)$/i.test(file.files[0].name) === false) { 
						var imageName  = $('#upload').prop('files')[0].name;
						$('.span-upload-filename').addClass('alert-img').html('Invalid file image');

				} else {
						var imageName  = $('#upload').prop('files')[0].name;
						$('.span-upload-filename').removeClass('alert-img').html(imageName);
				}
		});
});
	