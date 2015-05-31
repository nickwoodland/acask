jQuery(document).foundation();



setTimeout(function() {

	$( ".orbitwrapper" ).fadeIn(500);
	$(document).foundation('interchange', 'reflow');
	$(document).foundation('orbit', 'reflow');
	$(document).foundation('equalizer','reflow');

}, 1000);