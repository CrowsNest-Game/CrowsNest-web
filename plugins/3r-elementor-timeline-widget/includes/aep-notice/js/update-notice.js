jQuery( document ).ready( function() {
	jQuery( document ).on( 'click', 'a', function(event) {
        if( jQuery(event.target).hasClass('aep-tl-never-show')) {
            var data = {
                action: 'aep_tl_never_show',
            };
        }
		jQuery.post( aep_tl_notice_params.ajaxurl, data, function() {
            if(data){
                jQuery('.aep-notice').fadeOut();
            }
		});
    });
});