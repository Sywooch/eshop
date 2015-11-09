(function ( $ ) {
    $.fn.eshop = function(option) {
    	var settings = $.extend({}, $.fn.eshop.defaults);
    	if(settings[option] && arguments[1] !== null) {
    		return settings[option].replace('{0}', arguments[1]);
    	}
    	else {
    		return settings[option];
    	}
    	
    };
    
    $.fn.eshop.defaults = {};
}( jQuery ));
