<<<<<<< HEAD
$(document).ready(function(){
	
=======
// $(document).ready(function(){
// 	$('.dropdown').hover(function()
// 	{
// 		$('.dropdown-menu',this).stop(true,true).fadeIn("fast");
// 			$(this).toggleClass('open');
// 			$(b,this).toggleClass(caret caret-up);
// 	}
// 	function()
// 	{

// 	});
// })

$(document).ready(function(){
	$(document).on('click', '.list_img_detail', function(e) {
		// e.preventDefault();
		// $(this).css('border', 'solid 3px red');
		// var src_this=$(this).attr('src');
		// $('#at_img').attr('src',src_this);


			e.preventDefault();
		$(this).parent().addClass('addshadow');
		var src_this=$(this).attr('src');
		$('#at_img').attr('src',src_this);
		$(this).parent().prevAll().removeClass('addshadow');
		$(this).parent().nextAll().removeClass('addshadow');
		
		

		
	
		

	});
>>>>>>> c4f78230ae314b6e5dfcadc13d39a15aa7f5dad8
})