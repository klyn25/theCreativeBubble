// JavaScript Document


$(document).foundation();


$(document).ready(function(e) {
    
	//randomly chooses color for img hover on user portal
	$('.th').hover( function() {
			 var x=Math.round(0xffffff * Math.random()).toString(16);
			 var y=(6-x.length);
			 var z="000000";
			 var z1 = z.substring(0,y);
			 var color= "#" + z1 + x;
			 var shadow = "0px 0px 5px 3px";
		 
			hoverElem=this;
			//add in a slight delay to allow Internet explorer to catch up
			setTimeout( function() {
			hovercolor = $(hoverElem).css("box-shadow", shadow + ' ' + color);
			},0);
			}, function(){
					hovercolor = $(hoverElem).css("box-shadow", '0 0 0 1px rgba(0, 0, 0, 0.2)');
				});
		
		//adds functionality to the user nav
		//allows users to target tabbed areas within their portal		
		var hash = location.hash;
		var hash2 = hash.substring(1);
		
		$('#panel-1').removeClass('active');
		$('#' + hash2 +'').addClass('active');
	
	

 });
 


//*************** Ajax code  ***********************

	/*$("#addComment").click(function(event) {
		event.preventDefault();
		var userID = $("input#userID").val();
		var imgID = $("input#imgID").val();
		var discBody = $("input#discBody").val();
		var discTitle = $("input#discTitle").val();
		jQuery.ajax({
			type: "POST",
			url: "http://bitlamp.wctc.edu/~kflick/php2/Fall2015/final/discussions/create",
			dataType: 'html',
			data: {userID: userID, imgID: imgID, discBody: discBody, discTitle: discTitle},
			success: function(res) {
			if (res)
			{
			// Show Entered Value
			jQuery("div#comment").append(res);;
			}
			}
		});
	});*/
 
 
//*************** SLick Slider Code  ***********************
 var $windowWidth=$(window).width();

$( window ).resize(function() {
var $windowWidth=$(window).width();
if(($windowWidth > 1) && ($windowWidth < 640)){
$('.slick-slider').unslick();	
      $('.slick-slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          dots: false,
		  arrows: true,
        });
		
	  } else if(($windowWidth > 641) && ($windowWidth < 801)) {
$('.slick-slider').unslick();	   	
        $('.slick-slider').slick({
		  centerMode: true,
		  centerPadding: '60px',
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          dots: false,
		  arrows: true,
        });
      
    } else {
$('.slick-slider').unslick();	   	
        $('.slick-slider').slick({
		  centerMode: true,
		  centerPadding: '60px',
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          dots: false,
		  arrows: true,
        });
    }	

});  

if(($windowWidth > 1) && ($windowWidth < 640)){

      $('.slick-slider').slick({
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          dots: false,
		  arrows: true,
        });
      
    } else {
        $('.slick-slider').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          dots: false,
		  arrows: true,
        });
    }
	
	