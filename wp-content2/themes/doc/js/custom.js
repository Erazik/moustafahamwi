$(document).ready(function() {
//////////////////////////////////
	var h = $(window).height();
	$("#elems .post:lt(3)").css('visibility','visible').addClass('animated');
	//////////////////////////
	var headerHeight = $('header').outerHeight();
	var navHeight = $('.header').outerHeight();
	var topNav = $('header');
	var scroll;
	$(window).on('scroll' , function(){

		var bo = $(document).scrollTop();
		$("#elems .post").each(function(){
			if(bo > $(this).offset().top-800)
			{
				if($(this).hasClass('animated'))
				{

				}
				else
				{
					$(this).css('visibility','visible').addClass('animated fadeInUp');
				}
			}
		})

		scroll = $(this).scrollTop();
        bodyHeight = $('body').outerHeight()-500;
        if(scroll > 74){
            $('body.home, body.page-id-10').css({marginTop: 58});

            $('.header', topNav).addClass('fixed').removeClass('header').stop().animate({'opacity':0.95},300);
        }
        else{
            $('body.home, body.page-id-10').css({marginTop: 0});
            $('.fixed', topNav).removeClass('fixed').addClass('header').stop().animate({'opacity':1},300);
        }
        if(scroll >= bodyHeight){
            $('.flare.countloaded.visible').hide();
        } else{
            $('.flare.countloaded.visible').show();
        }
        //console.log(bodyHeight);
        //console.log(scroll);
    });


/*
* Search click
* ==================
* */

    $('.fa-search').on('click', function(){
        if($(this).prev().width() == 0){
            $(this).css({marginRight:0}).prev().show().css({width: 180});
            $('span.search').css({borderBottom: '1px solid white'});
        }else{
            $(this).css({marginRight:-8}).prev().css({width: 0}, function(){
                $(this).hide();
            });
            $('span.search').css({border: 0});
        }
    })

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
			hidd_name = $(this).find('#mce-FNAME');
			setTimeout(function() {
				$(name_error).fadeOut('fast');
				hidd_name.css({borderWidth: 0})
			}, 5000);

		}
		else
		{
			if(!ne.test(name))
			{
				send_name = 0;
			
				name_error = $(this).find('#mce-FNAME').next().html('<i class="fa fa-exclamation-triangle"></i>Invalid name').css('display','block');
				$(this).find('#mce-FNAME').css('border','1px solid #fb2a2a');
				hidd_name = $(this).find('#mce-FNAME');
				setTimeout(function() {
					$(name_error).fadeOut('fast');
					hidd_name.css({borderWidth: 0})
				}, 5000);
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
			hidd_email = $(this).find('#mce-EMAIL')
			setTimeout(function() {
				$(mail_error).fadeOut('fast');
				hidd_email.css({borderWidth: 0})

			}, 5000);
		}
		else
		{
			if(!re.test(email)) {
				send_mail = 0;
				mail_error = $(this).find('#mce-EMAIL').next().html('<i class="fa fa-exclamation-triangle"></i>Invalid email address').css('display','block');
				$(this).find('#mce-EMAIL').css('border','1px solid #fb2a2a');
				hidd_email = $(this).find('#mce-EMAIL')
				setTimeout(function() {
					$(mail_error).fadeOut('fast');
					if($( "#mce-EMAIL" ).hasClass( ".subscribe_inp" )) {
						hidd_email.css('border','1px solid #e2e2e2');
					}
					else {
						hidd_email.css({borderWidth: 0})
					}
				}, 5000);
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
    
	//	// Hides the currently selected option from appearing when the drop down is opened
		//hideCurrent: true
    
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
	
	///////////////// share icons part
	$('.fa-share-alt').on('click', function(){
		$('body').css('overflow','hidden');
		/* $('body').css('overflow','hidden').prepend(
		'<div class="overlay2">'+
		'<div class="cl_ov2"></div>'+
		'<div class="social_icons_share">'+
		'<p>Share the Passion</p>' +
		'<a target="_blank" href="https://www.facebook.com/moustafa.hamwi"><i class="fa fa-facebook-square"></i></a>'+
		'<a target="_blank" href="https://twitter.com/moustafahamwi"> <i class="fa fa-twitter-square"> </i></a>'+
		'<a target="_blank" href="https://www.linkedin.com/in/moustafahamwi"><i class="fa fa-linkedin-square"></i></a>'+
		'<a target="_blank" href="https://www.youtube.com/channel/UCGNaeUI8uj4JzGABlcmEvoA"> <i class="fa fa-youtube">   </i></a>'+
		'<a target="_blank" href="https://www.instagram.com/moustafahamwi/"><i class="fa fa-instagram"></i></a>'+
		'</div>'+
		'</div>'
		);
		closed('.cl_ov2'); */
		$('.overlay2').css('display','block');
	});
	$('.cl_ov2').on('click', function(){
		$('.overlay2').css('display','none');
		$('body').css('overflow','visible');
	})
	/* function closed(className){
		$(className).on('click', function(){
			$(this).parent().remove();
			$('body').css('overflow','visible');
		})
	} */
	///////////////// 
	////////////////// forbit posts animation for mobile
	if($(window).width() <= 992)
	{
		$('#elems .post').css('visibility','visible').removeClass('animated');
	}
	$(window).on('scroll', function(){
		if($(window).width() <= 992)
		{
			$('#elems .post').css('visibility','visible').removeClass('animated');
		}
	})

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


$('select').each(function () {

	// Cache the number of options
	var $this = $(this),
		numberOfOptions = $(this).children('option').length;

	// Hides the select element
	$this.addClass('s-hidden');

	// Wrap the select element in a div
	$this.wrap('<div class="select"></div>');

	// Insert a styled div to sit over the top of the hidden select element
	$this.after('<div class="styledSelect"></div>');

	// Cache the styled div
	var $styledSelect = $this.next('div.styledSelect');

	// Show the first select option in the styled div
	$styledSelect.text($this.children('option').eq(0).text());

	// Insert an unordered list after the styled div and also cache the list
	var $list = $('<ul />', {
		'class': 'options'
	}).insertAfter($styledSelect);

	// Insert a list item into the unordered list for each select option
	for (var i = 0; i < numberOfOptions; i++) {
		$('<li />', {
			text: $this.children('option').eq(i).text(),
			rel: $this.children('option').eq(i).val()
		}).appendTo($list);
	}

	// Cache the list items
	var $listItems = $list.children('li');

	// Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
	$styledSelect.click(function (e) {
		e.stopPropagation();
		if($(this).hasClass('active')){
			$(this).removeClass('active').next('ul.options').hide();
		}
		else {
			$(this).toggleClass('active').next('ul.options').toggle();
		}
	});

	// Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
	// Updates the select element to have the value of the equivalent option
	$listItems.click(function (e) {
		e.stopPropagation();
		$styledSelect.text($(this).text()).removeClass('active');
		$this.val($(this).attr('rel'));
		$list.hide();
		/* alert($this.val()); Uncomment this for demonstration! */
	});

	// Hides the unordered list when clicking outside of it
	$(document).click(function () {
		$styledSelect.removeClass('active');
		$list.hide();
	});
	

});
