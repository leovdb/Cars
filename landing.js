// JavaScript Document


var carImgScalingFactor;
var mobileMenuShown = false;

function isMobileWidth() {
    return $('#mobile-indicator').is(':visible');
}

$('#register-form-button').click(function(e) {
	
	ga('send', 'event', 'Form', 'Submit');
	
});

function inputChanged(e)
{
	if($(e.target).hasClass('changed'))
	{
		
	}
	else
	{
		$(e.target).addClass('changed');
		ga('send', 'event', 'Form', 'Change', $(e.target).attr('name'));
	}

};

$('input').change(function(e) {
	
	//Register a change with Google Analytics
	
	inputChanged(e);
	
});

$('select').change(function(e) {
	
	//Register a change with Google Analytics
	
	inputChanged(e);
	
});

$(".internal-link").click(function(e){
	
	e.preventDefault();
	
	var target = $(this).attr('href');
		
	if($(this).hasClass('call-to-action-link'))
	{
		ga('send', 'event', 'Link', 'Click', 'CTA');
				
	}
	else
	{
		ga('send', 'event', 'Link', 'Click', target);
		
	}
		
	//Adjust the target by the height of the navbar. Necessary to subtract (add) the height
	//of the mobile menu if it is being displayed (counts as part of the navbar
	
	var heightAdjustment = 0;
	
	//Scroll to the top of the target item
	$('html, body').animate({
			scrollTop: ($(target).offset().top + heightAdjustment)
		}, 1000);
		
	
});

$('#register-form-condition').change(function (e) {
    
	if($(this).val() == null)
	{
		$(this).addClass("empty");
		
	}
    else $(this).removeClass("empty")
});


function scrollToTop(element, margin)
{
	var windowBottom;
	var windowTop;
	
	var elementTop = $(element).offset().top;
	var elementBottom = elementTop + $(element).height();
	
	if($('body').scrollTop() > 0)
	{
		windowTop = $('body').scrollTop();
		windowBottom = windowTop + $(window).height();
	}
	else
	{
		windowTop = $('html').scrollTop();
		windowBottom = windowTop + $(window).height();
	}
				
	/*if(windowTop > (elementTop + margin))
	{
		var scrollPos = elementTop - margin;
		
		$('html, body').animate({
			scrollTop: scrollPos
		}, 300);
	}*/
	
	var scrollPos = elementTop - margin;
		
	$('html, body').animate({
			scrollTop: scrollPos
		}, 300);
		
	/*else if(windowBottom < (elementBottom + margin))
	{
		var scrollPos = elementBottom - $(window).height() + margin;
		
		$('html, body').animate({
			scrollTop: scrollPos
		}, 300);	
	}*/
};

var conditionFocused = false;

$('#register-form-condition').focus(function () {
    
	if(!conditionFocused)
	{
		ga('send', 'event', 'Form', 'Focus', 'condition');
		conditionFocused = true;
	}
	
	$('#condition-popup').css('z-index','999');
	
	if(isMobileWidth())
	{
		scrollToTop('#condition-popup',0);
	}
	
		
});

$('#register-form-condition').change(function(e) {
	
	/*if(isMobileWidth())
	{
		$('#condition-popup').stop()
		$('#condition-popup').fadeOut();
		
	}
	else
	{*/
		$('#condition-popup').css('z-index','-999');
	//}
	
});

$('#register-form-condition').focusout(function () {
    
	/*if(isMobileWidth())
	{
		$('#condition-popup').stop()
		$('#condition-popup').fadeOut();
		
	}
	else
	{*/
		$('#condition-popup').css('z-index','-999');
	//}
	
	
});

/*$(".FAQ-q").click(function(){
	
	//Animate the answers when a question is clicked
	
	//Setup Q&A IDs for the clicked question
	var aID = '#' + $(this).attr('id') + '-a';
	var qID = '#' + $(this).attr('id');
	
	//If the answer is already shown for this question, hide it
	if($(aID).hasClass('opened')){
		$(aID).removeClass('opened');
		$(aID).slideUp(500);
	}
	
	//Otherwise, show this answer and hide any other opened answers
	else {
			
			//Hide any opened answer for another question
			$(".FAQ-a").removeClass('opened');
			$(".FAQ-a").slideUp(300);
			
			//Show this answer (the class 'opened' is added to distinguish it in future			
			$(aID).addClass('opened');
			$(aID).slideDown(300, 'swing', function(){
			
			//If the answer is not entirely shown on screen, scroll so it is
			var aBottom = $(aID).offset().top + $(aID).height();
			var windowBottom;
			
			if($('body').scrollTop() > 0)
			{
				windowBottom = $('body').scrollTop() + $(window).height();
			}
			else
			{
				windowBottom = $('html').scrollTop() + $(window).height();
			}
						
			if(windowBottom < (aBottom + 30))
			{
				var scrollPos = aBottom - $(window).height() + 30;
				
				$('html, body').animate({
					scrollTop: scrollPos
				}, 300);	
			}
			
			ga('send', 'event', 'FAQ', 'Click', qID);
									
			});
		}
	
});*/

var ctaIsVisible = false;

function checkCallToAction()
{
	//Display the call to action button once the relevant item is visible
	
	var ctaShouldBeVisible = false;
	
	if(!isMobileWidth())
	{
	 
		var windowBottom;
		var windowTop;
				
		if($('body').scrollTop() > 0)
		{
			windowTop = $('body').scrollTop() + $('#top-navbar').height();
			windowBottom = $('body').scrollTop() + $(window).height();
		}
		else
		{
			windowTop = $('html').scrollTop() + $('#top-navbar').height();
			windowBottom = $('html').scrollTop() + $(window).height();
		}
		
		ctaShouldBeVisible = (windowTop > ($('#CTA-top-table').offset().top) + $('#CTA-top-table').outerHeight(true)) && ((windowTop < $('#get-started').offset().top) && (windowBottom < $('#register-form-button').offset().top));

	}
    
	if (ctaShouldBeVisible && !ctaIsVisible) {
          ctaIsVisible = true;
          $('#call-to-action').fadeIn(500);
		  
    } else if (ctaIsVisible && !ctaShouldBeVisible) {
          ctaIsVisible = false;
          $('#call-to-action').fadeOut(500);
    }
	
};

var gaScrollWhatWeDo = false;
var gaScrollWhatYouDo = false;
var gaScrollQuote = false;

function checkAnalyticScrollEvents()
{
	bottom = $(window).height() + $(window).scrollTop();
	height = $(document).height();
	
	effectiveTop = $(window).scrollTop();
	
	if((effectiveTop >= $('#what-we-do').offset().top) && !gaScrollWhatWeDo)
	{
		ga('send', 'event', 'Page', 'Scroll', 'What we do');
		gaScrollWhatWeDo = true;
	}
	
	if((effectiveTop >= $('#what-you-do').offset().top) && !gaScrollWhatYouDo)
	{
		ga('send', 'event', 'Page', 'Scroll', 'What you do');
		gaScrollWhatYouDo = true;
	}
	
	if((bottom >= $('#register-form-button').offset().top) && !gaScrollQuote)
	{
		ga('send', 'event', 'Page', 'Scroll', 'Register');
		gaScrollQuote = true;
	}
		
};

$(window).scroll(function(){
     
	checkAnalyticScrollEvents();
	checkCallToAction();
	 
});

$(document).ready(function() {
	
	//Send event that the page has loaded
	ga('send', 'event', 'Loaded', 'Page');
	
});