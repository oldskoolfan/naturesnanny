$ ->
	unless $('html').hasClass "touch"
		dropdown = ->
			$(@).find('div').slideDown 'fast'
		slideup = ->
			$(@).find('div').slideUp 'fast'
		$('#ServicesAndPricing, #Images').on "mouseenter", dropdown
			.on "mouseleave", slideup
			