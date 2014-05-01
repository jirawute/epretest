var textObject = {	
		delay : 0,
		effect : 'replace',
		classColour : 'blink',
		flash : function(obj, effect, delay) {
			if (obj.length > 0) {
				if (obj.length > 1) {
					jQuery.each(obj, function() {
						effect = effect || textObject.effect;
						delay = delay || textObject.delay;
						textObject.flashExe($(this), effect, delay);					
					});
				} else {
					effect = effect || textObject.effect;
					delay = delay || textObject.delay;
					textObject.flashExe(obj, effect, delay);
				}
			}
		},
		flashExe : function(obj, effect, delay) {
			var flash = setTimeout(function() {
				switch(effect) {
					case 'replace':
					obj.toggle();
					break;
					case 'colour':
					obj.toggleClass(textObject.classColour);
					break;
				}
				textObject.flashExe(obj, effect, delay);
			}, delay);
		}
	};