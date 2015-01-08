// JavaScript Document


var carImgScalingFactor;
var mobileMenuShown = false;

$("input").focus(function() {
	
	if($(this).attr("type") == "text")
	{
		//The code relies on the first two characters of the class
		//Can't use the whole class as parsley may have added an error class		
		var selectedSectionClass = $(this).attr("class").substring(0,2);
				
		var selectedSectionID = selectedSectionClass + '-s';
		
		$('.register-form-section').each(function(index,element){
			if($(this).attr("id") == selectedSectionID)
			{
				$(this).animate({ opacity: 1 });
			}
			else
			{
				$(this).animate({ opacity: 0.5 });
			}
		});
	}
	else if($(this).attr("type") == "submit")
	{
	
		$('.register-form-section').each(function(index,element){
			$(this).animate({ opacity: 1 });
		});
		
	}
	
});

$(".steps-text").mouseenter(function(){
	
	//Show the detail when the mouse hovers over the heading text
	
	var headerID = '#' + $(this).attr('id') + '-header';
	var detailID = '#' + $(this).attr('id') + '-detail';
	
	//Stop any partial animation of the items (including any queued)	
	$(headerID).stop(true);
	$(detailID).stop(true);
	
	//Hide the header, then show the show (callback used to make sure it is sequential)		
	$(headerID).animate({opacity:0},500,'swing',function(){
		$(detailID).animate({opacity:1},500)});
		
});

$(".steps-text").mouseleave(function(){
	
	//Hide the detail when the mouse moves away from the heading text
	
	var headerID = '#' + $(this).attr('id') + '-header';
	var detailID = '#' + $(this).attr('id') + '-detail';
	
	//Stop any partial animation of the items (including any queued)	
	$(headerID).stop(true);
	$(detailID).stop(true);
	
	//Hide the detail, then show the header (callback used to make sure it is sequential)		
	$(detailID).animate({opacity:0},500,'swing',function(){
		$(headerID).animate({opacity:1},500)});
	
});

$(".internal-link").click(function(){
	
	var target = $(this).attr('href');
		
	//Adjust the target by the height of the navbar. Necessary to subtract (add) the height
	//of the mobile menu if it is being displayed (counts as part of the navbar
	
	var heightAdjustment = -$('#top-navbar').height() + ((screen.width < 768 && mobileMenuShown) ? $('.navbar-collapse').height() : 0);
	
	if(mobileMenuShown)
	//If the menu is displayed, hide it
	{
		$(".navbar-toggle").click();
	}
	
	//Scroll to the top of the target item
	$('html, body').animate({
			scrollTop: ($(target).offset().top + heightAdjustment)
		}, 2000);
		
});

$('#menu-list').on('hidden.bs.collapse', function () {
	mobileMenuShown = false;
});

$('#menu-list').on('shown.bs.collapse', function () {
	mobileMenuShown = true;
});

$(".FAQ-q").click(function(){
	
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
							
			});
		}
	
});

function resizeCarImg()
{
	
	var containerHeight = Math.floor($(window).height() - $('#top-navbar').height());
	var containerWidth = $(window).width();
	
	var carImgHeight;
	var carImgWidth;
		
	if((containerHeight * carImgScalingFactor) >= containerWidth)
	{
		carImgHeight = containerHeight;
		carImgWidth = Math.floor(carImgHeight * carImgScalingFactor);
	}
	else
	{
		carImgWidth = containerWidth;
		carImgHeight = Math.floor(carImgWidth / carImgScalingFactor);	
	}
	
	//var carImgClip = "rect(0px," + $(window).width() + "px," + carImgHeight + "px,0px)";
	
	$(".welcome-container").height(containerHeight);
	$(".welcome-container").width(containerWidth);
			
	//$("#welcome-car-img").css({ 'clip': carImgClip });
	$("#welcome-car-img").height(carImgHeight);
	$("#welcome-car-img").width(carImgWidth);
			
}

$(window).resize(function(e) {
	
	resizeCarImg();
	
});

$(document).ready(function() {
	
	var welcomeContainerMargin = $('#top-navbar').height() + 'px';
	$(".welcome-container").css({ 'margin-top': welcomeContainerMargin });
	
	carImgScalingFactor = $("#welcome-car-img").width() / $("#welcome-car-img").height();
	
	resizeCarImg();
	
	$(".steps-detail").each(function(index,element){
		
		var topPosition = ($(this).parent().height() / 2) - ($(this).height() / 2);
		
		$(this).css({ top: topPosition + 'px' })
	});
	
	$(".steps-header").each(function(index,element){
		
		var topPosition = ($(this).parent().height() / 2) - ($(this).height() / 2);
		
		$(this).css({ top: topPosition + 'px' })
	});

	var controller = $.superscrollorama();
	
	var stepsAnimOffset = -($(window).height()/3);
	
	controller.addTween('#laptop-text', TweenMax.from( $('#laptop-text'), 1, {css:{opacity: 0}}));
	controller.addTween('#calendar-icon', TweenMax.from( $('#calendar-icon'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	controller.addTween('#inspection-sponge-camera', TweenMax.from( $('#inspection-sponge-camera'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	controller.addTween('#computer-icon', TweenMax.from( $('#computer-icon'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	controller.addTween('#phone-wheel', TweenMax.from( $('#phone-wheel'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	controller.addTween('#money-icon', TweenMax.from( $('#money-icon'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	
	/*controller.addTween('#whyus-block1-example-callout1', TweenMax.from( $('#whyus-block1-example-callout1'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	controller.addTween('#whyus-block1-example-callout2', TweenMax.from( $('#whyus-block1-example-callout2'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	
	controller.addTween('#whyus-block3-example-callout', TweenMax.from( $('#whyus-block3-example-callout'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);
	controller.addTween('#whyus-block4-example-callout', TweenMax.from( $('#whyus-block4-example-callout'), 1, {css:{opacity: 0}}),0,stepsAnimOffset);*/
	
	controller.addTween('#whyus-line0-img', TweenMax.to( $('#whyus-line0-img'), 1, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#whyus-line1-img', TweenMax.to( $('#whyus-line1-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#whyus-line2-img', TweenMax.to( $('#whyus-line2-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#whyus-line3-img', TweenMax.to( $('#whyus-line3-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#whyus-line4-img', TweenMax.to( $('#whyus-line4-img'), 2, {css:{clip: "rect(0px 750px 150px 0px)"}}));
		
	controller.addTween('#whyus-block2-sponge', TweenMax.from( $('#whyus-block2-sponge'), 1, {css:{opacity: 0}}));
	controller.addTween('#whyus-block2-camera', TweenMax.from( $('#whyus-block2-camera'), 2, {css:{opacity: 0}}));
	controller.addTween('#whyus-block2-computer', TweenMax.from( $('#whyus-block2-computer'), 3, {css:{opacity: 0}}));
	controller.addTween('#whyus-block2-phone', TweenMax.from( $('#whyus-block2-phone'), 4, {css:{opacity: 0}}));
	controller.addTween('#whyus-block2-wheel', TweenMax.from( $('#whyus-block2-wheel'), 5, {css:{opacity: 0}}));
	controller.addTween('#whyus-block2-handshake', TweenMax.from( $('#whyus-block2-handshake'), 6, {css:{opacity: 0}}));
	
	controller.addTween('#steps-line0-img', TweenMax.to( $('#steps-line0-img'), 1, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#steps-line1-img', TweenMax.to( $('#steps-line1-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#steps-line2-img', TweenMax.to( $('#steps-line2-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#steps-line3-img', TweenMax.to( $('#steps-line3-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	controller.addTween('#steps-line4-img', TweenMax.to( $('#steps-line4-img'), 2, {css:{clip: "rect(0px 750px 100px 0px)"}}));
	
	controller.addTween('#FAQ-QM-L', TweenMax.from( $('#FAQ-QM-L'), 1, {css:{top: 300, opacity: 0}}),0,-300);
	controller.addTween('#FAQ-QM-L', TweenMax.from( $('#FAQ-QM-M'), 1, {css:{top: 300, opacity: 0}}),0,-300);
	controller.addTween('#FAQ-QM-L', TweenMax.from( $('#FAQ-QM-S'), 1, {css:{top: 300, opacity: 0}}),0,-300);
	
});