(function($){
	$(function(){

		$('.button-collapse').sideNav();
		$('.parallax').parallax();
		$('.carousel').carousel();
		$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15, // Creates a dropdown of 15 years to control year,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
		});
		$('select').material_select('destroy');
		    $('select').material_select();
		    $('.slider').slider();
		    $('.modal').modal();
  	}); // end of document ready
})(jQuery); // end of jQuery name space