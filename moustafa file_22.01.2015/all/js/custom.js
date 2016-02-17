$(document).ready(function() {


	/*
    * Slider height Dinamic
    * ======================
    * */
	//var sl = $('.sl-slider-wrapper');
	//$('.sl-slider-wrapper').css({height: $('.sl-slider-wrapper').find('img').first().height()});
    //
	//$(window).resize(function(){
	//	$('.sl-slider-wrapper').css({height: sl.find('img').first().height()});
	//});

/*
* Scroll fixed menu
* =================
* */

    var headerHeight = $('header').outerHeight();
    var navHeight = $('.header').outerHeight();
    var topNav = $('header');
    var scroll;
    $(window).on('scroll' , function(){
        scroll = $(this).scrollTop();
        if(scroll > 74){
            $('body.home').css({marginTop: 83});
            $('.header', topNav).addClass('fixed').removeClass('header').stop().animate({'opacity':0.95},300);
        }
        else{
            $('body.home').css({marginTop: 0});
            $('.fixed', topNav).removeClass('fixed').addClass('header').stop().animate({'opacity':1},300);
        }
    });

/*
* Search click
* ==================
* */

    //$('.fa-search').on('click', function(){
    //    if($(this).prev().width() == 0){
    //        $(this).css({marginRight:0}).prev().css({width: 180});
    //        $('span.search').css({borderBottom: '1px solid white'});
    //    }else{
    //        $(this).css({marginRight:-8}).prev().css({width: 0});
    //        $('span.search').css({border: 0});
    //    }
    //})

/*
* Add current year
* ====================
* */
    var d = new Date();
    var n = d.getFullYear();
    $('#year').empty().append(n);
	
 /*
* ajax requests for mailchimp
* ====================
* */
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;          ///// email format check
	var ne = /^[a-zA-Z\s]+$/;
	
	var myForm = $('form[name="mc-embedded-subscribe-form"]');
	
	 myForm.on('submit', function(e) {
		e.preventDefault();
	   
		var name = $(this).find('#mce-FNAME').val();
		var email = $(this).find('#mce-EMAIL').val();
	   
	 
		if(name == '')
		{
			send_name = 0;
			
			name_error = $(this).find('#mce-FNAME').next().html('<i class="fa fa-exclamation-triangle"></i>You must enter your name').css('display','block');
			$(this).find('#mce-FNAME').css('border','1px solid #fb2a2a');
			setTimeout(function() { $(name_error).fadeOut('fast')}, 5000); 
		}
		else
		{
			if(!ne.test(name))
			{
				send_name = 0;
			
				name_error = $(this).find('#mce-FNAME').next().html('<i class="fa fa-exclamation-triangle"></i>Invalid name').css('display','block');
				$(this).find('#mce-FNAME').css('border','1px solid #fb2a2a');
				setTimeout(function() { $(name_error).fadeOut('fast')}, 5000); 
			}
			else
			{
				send_name = 1;
				$(this).find('#mce-FNAME').next().html('').css('display','none');
				$(this).find('#mce-FNAME').css('border','1px solid transparent');
			}
			
		}
		
		if(email == '')
		{
			send_mail = 0;
			mail_error = $(this).find('#mce-EMAIL').next().html('<i class="fa fa-exclamation-triangle"></i>You must enter your email address').css('display','block');
			$(this).find('#mce-EMAIL').css('border','1px solid #fb2a2a');
			setTimeout(function() { $(mail_error).fadeOut('fast')}, 5000); 
		}
		else
		{
			if(!re.test(email)) {
				send_mail = 0;
				mail_error = $(this).find('#mce-EMAIL').next().html('<i class="fa fa-exclamation-triangle"></i>Invalid email address').css('display','block');
				$(this).find('#mce-EMAIL').css('border','1px solid #fb2a2a');
				setTimeout(function() { $(mail_error).fadeOut('fast')}, 5000); 
			}
			else
			{
				send_mail = 1;
				$(this).find('#mce-EMAIL').next().html('').css('display','none');
				$(this).find('#mce-EMAIL').css('border','1px solid transparent');
			}
			
		}
		
		if(send_name != 0 && send_mail != 0)
		{
			//var send = $(this).serialize()
			$.ajax({
				type: $(this).attr('method'),
				url: $(this).attr('action'),
				data: $(this).serialize(),
				cache       : false,
				dataType    : 'json',
				contentType: "application/json; charset=utf-8",
				error       : function(err) { 
					alert("Could not connect to the registration server. Please try again later."); 
				},
				success     : function(data){
					console.log(data);
					console.log($(this).serialize());
					if (data.result != "success") {
						alert(data.msg);
					} else {
						$('.overlay').css('display','block');
						$('.modal').fadeIn(600);
					}
				}
			});
		}
		
	 });
	 
	$('.close_modal, .overlay').on('click', function(){
		$('.modal').css('display','none');
		$('.overlay').css('display','none');
		$('form[name="mc-embedded-subscribe-form"]').find('#mce-FNAME').val('');
		$('form[name="mc-embedded-subscribe-form"]').find('#mce-EMAIL').val('');
	})



	$('.gallery').find('br').remove();
	$('.gallery .gallery-item').css({"margin-right":"10px"});
	$('.gallery .gallery-item:nth-child(6n)').css({"margin-right":"0"});



	//$("select").selectBoxIt({
    //
	//	// Hides the currently selected option from appearing when the drop down is opened
	//	hideCurrent: true
    //
	//});

	/*
	* Bx Slider
	* ===================
	* */
	$('.bxslider').bxSlider();
	//$("html").niceScroll();
/*
* Loader
* =============
* */
	//onReady(function () {
	//	setTimeout(function(){
	//		$('#loading').animate({opacity: 0}, 500).hide('slow');
	//	}, 500)
	//});

})
/*
 * Light Box
 * ==============
 * */
baguetteBox.run('.about_pic');
function onReady(callback) {
	var intervalID = window.setInterval(checkReady, 1000);
	function checkReady() {
		if (document.getElementsByTagName('body')[0] !== undefined) {
			window.clearInterval(intervalID);
			callback.call(this);
		}
	}
}