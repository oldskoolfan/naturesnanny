$ ->
	# nav dropdowns
	unless $('html').hasClass "touch"
		dropdown = ->
			$(@).find('div').slideDown 'fast'
		slideup = ->
			$(@).find('div').slideUp 'fast'
		$('#ServicesAndPricing, #Images').on "mouseenter", dropdown
			.on "mouseleave", slideup
	
	# Our Friends slideshow
	$('#Slideshow').slidesjs
		width: 800
		height: 600
		play:
			active: false
			auto: true
			effect: "fade"
		pagination:
			active: false
			effect: "fade"
		navigation:
			active: false
			effect: "fade"