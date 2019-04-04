$(document).ready(function(){
	if ($(window).width() < 768) {
		$('nav.change .brand-logo picture source').attr("srcset","../assets/pilgrim.png");
	}

	else if ($(window).width() >= 768) {
		$('nav.change .brand-logo picture source').attr("srcset","../assets/WhitePilgrim.png");
		$(window).scroll(function(){
			if($(document).scrollTop() > 50){
				$('header.home nav').addClass('change');
				$('nav.change .brand-logo picture source').attr("srcset","../assets/pilgrim.png");
			}
			else if($(document).scrollTop()) {
				$('nav.change .brand-logo picture source').attr("srcset","../assets/WhitePilgrim.png");
				$('header.home nav').removeClass('change');
			}
		});
	}

	$(window).scroll(function(){
		$('.container .timeline-content:nth-child(odd) .each-description *').addClass("bounceInRight");
		$('.container .timeline-content:nth-child(even) .each-description *').addClass("bounceInLeft");
		$('.container .timeline-content:nth-child(odd) .img-timeline *').addClass("fadeInLeft");
		$('.container .timeline-content:nth-child(even) .img-timeline *').addClass("fadeInRight");
		$('.container .row .partner-img').addClass("bounceInDown");
	});
	
	$('.button-collapse').sideNav();
	$('.parallax').parallax();
	$('.carousel').carousel();
	$('.modal').modal();
	$('.slider').slider();
	$('.carousel.carousel-slider').carousel({fullWidth: true});
	$(".dropdown-button").dropdown();
	$('select').material_select();
	$('.datepicker').pickadate({
		selectMonths: true,
		selectYears: 15,
		today: 'Today',
		clear: 'Clear',
		close: 'Ok',
		container: undefined,
	});	
	$('.carousel').carousel();
	$('#modalnotif').modal('open');
	$('#modalnotif').modal('close');
	$('#modalvacancy').modal('open');
	$('#modalvacancy').modal('close');

});