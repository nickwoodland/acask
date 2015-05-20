jQuery(document).foundation();



setTimeout(function() {

	$( ".orbitwrapper" ).fadeIn(500);
	$(document).foundation('interchange', 'reflow');
	$(document).foundation('orbit', 'reflow');

}, 1000);