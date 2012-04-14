(function( $ ) {
  $.fn.reloadOnChange = function(url, files) {    
	$.post(url,{'files': files}, function (data) {
		if (data == "CHANGED")
		{
			location.reload(true);
		} 
		else
		{
			$('html').prepend(data);
			$().reloadOnChange(url, files);
		}
	} );
  };
})( jQuery );