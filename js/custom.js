jQuery(document).ready(function () {
	// Mobile nav turn hamburger
		$('.hamburger').click(function(event){
			event.preventDefault();
			$("#nav").toggle().addClass('mobile-styles');;
		});
		// Hamburger update location on resize
		$(window).resize(function() {
			if ($('.hamburger').is(':visible')) {
				$('#nav').hide();
			} else {
				$('#nav').show().removeClass('mobile-styles');;			
			};	
		});
	// Humburger fly-in mobile menu
		$(window).scroll(function(){
			if($(document).scrollTop() > 146){
				$('#header').css({ 
					'top': '0',
					'left': '0',
					'position': 'fixed'
				});
				$('#header .nav-menu').css({ 
					'height': '63px'
				});
				$('#header h1').css({ 
					'top': '10px'
				}).addClass('small');
				$('#header .menu').css({ 
					'padding': '20px 0 0 0'
				}).addClass('small-menu');
				$('#header .hamburger').css({ 
					'font-size': '30px'
				});
			} else {
				$('#header').css({ 
					'position': 'absolute'
				});
				$('#header .nav-menu').css({ 
					'height': '136px'
				});
				$('#header h1').css({ 
					'top': '30px'
				}).removeClass('small');
				$('#header .menu').css({ 
					'padding': '55px 0 0 0'
				}).removeClass('small-menu');
				$('#header .hamburger').css({ 
					'font-size': '42px'
				});
			}
		});	
    // Slideshow Header - Slick
	    $('.header-slider .slides').slick({
			arrows: true,
			dots: false,
			infinite: true,
			fade: false,
			slide: 'li',
			speed: 3000,
			autoplay: false,
			autoplaySpeed: 5000,
			slidesToShow: 1,
			adaptiveHeight: true
		});
	// Ul splitter for Contact Form
		$('#gform_fields_1').each(function(i){
			var colsize = Math.round($(this).find("li").size() / 2 );
			$(this).find("li").each(function(i) {
				if (i>=colsize){ $(this).addClass('splitcol_right'); } 
			});
			$(this).find('.splitcol_right').insertAfter(this).wrapAll("<ul id='gform_fields_right' class='gform_fields top_label description_below'></ul>");
		});
	// Instafeed
	    var userFeed = new Instafeed({
	        get: 'user',
	        userId: 1552885,
	        accessToken: '1552885.467ede5.2ff7f6f0e3f94881bee8266a55336e8a',
	        resolution: 'standard_resolution',
	        sortBy: 'random',
	       	limit: '12',
	       	//links: false,
	       	template: '<a class="instafeed-image" href="{{link}}"><img src="{{image}}" /></a>'
	    });
	    userFeed.run();
	// Jquery Coookie for Modal: /js/jquery.cookie.js REQUIRED! ))
		idleTime = 0;
		jQuery(document).ready(function($){
		    $limit = 5;
		    if (jQuery.cookie('test_status') != '1') {
		        jQuery.get('/wp-content/themes/blank/modal.html', function(data) {
		            jQuery('.subs-popup').html(data);
		        });
		        function timerIncrement() {
		            idleTime = idleTime + 1;
		            if (idleTime > $limit) {
		                jQuery('.subs-popup').show();
		                idleTime = 0;
		            }
		        }
		        var idleInterval = setInterval(timerIncrement, 1000); // 1 second
		        jQuery(this).mousemove(function (e) {
		            idleTime = 0;
		        });
		        jQuery(this).keypress(function (e) {
		            idleTime = 0;
		        });
		        jQuery.cookie('test_status', '1', { expires: 30 });
		    }
		});
});