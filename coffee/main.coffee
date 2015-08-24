window.timeouts = []

$ ->
	# nav dropdowns
	unless $('html').hasClass "touch"
		dropdown = (el) ->
			$(el).find('div').slideDown 'fast'
		slideup = (el) ->
			$(el).find('div').slideUp 'fast'
		$('#ServicesAndPricing, #Images').on "mouseenter", ->
				id = $(@).attr "id"
				unless window.timeouts[id]?
					window.timeouts[id] = setTimeout dropdown, 500, @
				else
					clearTimeout window.timeouts[id]
					window.timeouts[id] = null
			.on "mouseleave", ->
				id = $(@).attr "id"
				clearTimeout window.timeouts[id]
				window.timeouts[id] = null
				slideup @
	
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