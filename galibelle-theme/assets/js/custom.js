jQuery(document).ready(function($){
	
	// mobilmenu
	$( '#dl-menu' ).dlmenu();

	// slider home
	$('.carousel').carousel({
	  interval: false
	});
	$('.carousel').bcSwipe({ threshold: 50 });



}); //end ready