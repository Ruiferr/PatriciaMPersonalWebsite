var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var isMobile = false;

$( document ).ready(function() {

   	// mobile device detection
	if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
	    isMobile = true;
	}

	if (isMobile){
	  $(".social-icon").css({"height": "55px"});
	  $(".social .fab").css({"margin-top": "22px"});
	}


    $(".menu-bar").hover(function() {
    	if (!isMobile) {
			$(".fa-bars").toggleClass('rotate');
    	}
	});


// MENU BUTTON

	$(".menu-bar").click(function(){

		width = (window.innerWidth > 0) ? window.innerWidth : screen.width;

		if ($(".left-bar .fa-arrow-left").is(":visible")) {
			$(".left-bar .fa-arrow-left").hide();
			$(".menu-div").hide();
			$(".fa-bars").fadeIn(500);
			$(".box").fadeIn(500);
			//restore main body scroll
			$('body').css({
		    	overflow: 'auto'
			});

		}else{
			$(".fa-bars").hide();
			$(".section").hide();
			$(".box").hide();
			$(".left-bar .fa-arrow-left").fadeIn(500);
			$(".menu-div").fadeIn(500);
			//disable main body scroll
			$('body').css({
		    	overflow: 'hidden'
			});
		}



		if ($(".play-music-section").is(":visible") && $(".fa-arrow-left").is(":visible")) {

			width>740 ? $( ".close" ).animate({top: "0px"}, 1000) : null;
			$(".right-bar .fa-times").hide();	
			$(".fa-play").fadeIn(500);		
			$(".play-music-section").fadeOut(500);
			width>740 ? $(".album-selection").slideUp(500) : $(".album-selection").fadeOut(500);
		}



		if (width<740) {

			if ($(".play-music-section").is(":visible")) {
				$(".play-music-section").fadeOut(500);
				$('.main-content').show();
			}

			$(".left-bar .fa-arrow-left").is(":visible") ? $(".social").fadeOut(500) : $(".social").fadeIn(500);
			//portfolio album reset
			$(".right-bar .mobile-album-btn").fadeOut(500);
			$(".album-selection").animate({height: "0px"}, 250);
			$(".right-bar .mobile-album-btn .fa-angle-double-up").hide();
			$(".right-bar .mobile-album-btn .fa-angle-double-down").show();
		}

	});


// MENU OPTIONS & CLOSE X

	$(".select-section").click(function(){	
		$(".left-bar .fa-arrow-left").hide();
		$(".menu-div").hide();
		$(".fa-bars").fadeIn(500);
		$("." + $(this).attr('id')).fadeIn(1000);
	});


	$('.close').click(function(){
    	$(this).parents('.section').fadeOut(function(){
			//restore main body scroll
			$('body').css({
		    	overflow: 'auto'
			});
    	});
		$(".box").show();
		$(".social").show();

	});

// MUSIC PLAYER

	$(".player-menu").click(function(){

		width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
		value = $('.play-music-section').css('height');

		if (!$(".play-music-section").is(":visible")) {
			$(".fa-play").hide();	
			$(".right-bar .fa-times").fadeIn(500);					
			$(".play-music-section").fadeIn(500);
			width>740 ? $(".album-selection").slideDown(500) : null;
			width>740 ? $( ".close" ).animate({top: value}, 1000) : null;
		}else{
			$(".right-bar .fa-times").hide();	
			$(".fa-play").fadeIn(500);			
			$(".play-music-section").fadeOut(500);
			width>740 ? $(".album-selection").slideUp(500) : null;
			width>740 ? $( ".close" ).animate({top: "0px"}, 1000) : null;
		}

		//Mobile actions		
		if (width<740) {

			if ($(".player-menu .fa-times").is(":visible")) {	
				$('.main-content').hide();
				$(".social").fadeOut(500);
				$(".right-bar .mobile-album-btn").fadeIn(500);
				//disable main body scroll
				$('body').css({overflow: 'hidden'});	
			}else{	
				$('.main-content').show();
				$(".social").fadeIn(500);
				$(".right-bar .mobile-album-btn").fadeOut(500);
				$('.album-selection').hide();
				$('.box').show();
				$(".section").is(":visible") ? $('.box').hide() : $('.box').show();
				$(".section").is(":visible") ? $(".social").hide() : null;
				//restore main body scroll
				$('body').css({overflow: 'auto'});	
			}


			if ($(".left-bar .fa-arrow-left").is(":visible") && $(".play-music-section").is(":visible")) {
				$(".left-bar .fa-arrow-left").hide();
				$(".fa-bars").fadeIn(500);
				$(".menu-div").hide();
			}

		}


	});



//PORTFOLIO SECTION


	$('.portfolio-section nav button p').on('click', function(e) {
		$('.portfolio-section nav .close-projects').hide();
		$(this).closest('li').find('.close-projects').fadeIn(1000);
		$('.portfolio-section nav button p').removeClass('lined');
	    e.preventDefault();
	    $(this).addClass('lined');
	    $(".scrollPortfolio").scrollTop(0);
	});



	$(".scrollPortfolio section").click(function(){


		$('.scrollPortfolio section').css('opacity', '0.8');
	    $('.project-know-more').hide();


		$("#" + $(this).attr('class').split(' ')[1]).fadeIn(500);
		$('.scrollPortfolio').hide();
		$('.portfolio-know-more').show();

		$(".portfolio-section").scrollTop(0);
		//$(".portfolio-know-more").scrollTop(0);

	});


	$(".portfolio-know-more .back-projects").click(function(){
		$('.scrollPortfolio').show();
		$('.portfolio-know-more').hide();
	});



	$(".myBtn").click(function(){
		$("#myModal").fadeIn(500);
		$("#myModal .modal-content").empty();
		$("#myModal .modal-content").append( "<video id=\"video\" width=\"100%\" controls controlsList=\"nodownload\"><source src=\"video/"+$(this).attr('id')+"\" type=\"video/mp4\"></video>" )
	});



	$(window).click(function(e) {
		var video = document.getElementById('video');
		if (e.target.className == "modal") {
			$("#myModal").fadeOut(500);
			video.pause();
		}

	});

	$(".right-bar .mobile-album-btn").click(function(){
		$('.album-selection').show();

		if ($('.album-selection').css("height") != "0px") {
			$(".album-selection").animate({height: "0px"}, 250);
			$(".right-bar .mobile-album-btn .fa-angle-double-up").hide();
			$(".right-bar .mobile-album-btn .fa-angle-double-down").show();
		}else{
			$(".album-selection").animate({height: "200px"}, 250);
			$(".right-bar .mobile-album-btn .fa-angle-double-up").show();
			$(".right-bar .mobile-album-btn .fa-angle-double-down").hide();
		}

	});



});




function filterPortfolio(value){
  
  	$('.scrollPortfolio').show();
	$('.portfolio-know-more').hide();
    $('.project-know-more').hide();
   	//$('.scrollPortfolio').css('height', 'auto');
    $('.scrollPortfolio section').css('opacity', '0.8');


    switch(value) {
        case 'set1':
            $(".scrollPortfolio section").hide();
 			$(".scrollPortfolio button").fadeIn(500);
            $(".scrollPortfolio .set1").fadeIn(500);
            break;
        case 'set2':
            $(".scrollPortfolio section").hide();
 			$(".scrollPortfolio button").fadeIn(500);
            $(".scrollPortfolio .set2").fadeIn(500);
            break;
        case 'backMobile':
        	break
        default:
			$('.portfolio-section nav button p').removeClass('lined');
			$('.portfolio-section nav .close-projects').hide();
           	$(".scrollPortfolio section").fadeIn(500);
            $(".scrollPortfolio button").hide();           
    }

}


// called when the window is scrolled. 
         
$(function () {
    var $win = $(window);
    var	menuMobile = $(".left-bar").css("width");

        $win.scroll(function () {

		 	if ($(".social").is(":visible") && menuMobile < "740" ) {
		 		$(".social").hide();
		 	}

            if ($win.scrollTop() < 100)
                $(".social").show();

        });
});



















