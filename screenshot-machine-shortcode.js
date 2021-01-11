jQuery( document ).on( 'ready', function(){

	SSMSC_Refresh_IntervalId = self.setInterval(		

		function SSMSC_Refresh(){

			var anotherCheckIsNeeded = false;

			jQuery( '.ssm_refresh' ).each(

					function ( index, element ) {

						var a=new Image();

						a.src=jQuery( element ).attr( 'src' );

						if ( a.width != jQuery( element ).attr( 'data-width' ) ) {

							jQuery( element ).attr( 'src', jQuery( element ).attr( 'data-src' ) + '&ts=' + Math.random( 1000 ) );

							anotherCheckIsNeeded = true;

							jQuery( element ).attr( 'data-refreshcounter', jQuery( element ).attr( 'data-refreshcounter' ) + 1 );
						}

						if ( jQuery( element ).attr( 'data-refreshcounter' ) >= 10 ) {

							anotherCheckIsNeeded = false;
						}
					}
			);

			if ( anotherCheckIsNeeded === false ){

				self.clearInterval( SSMSC_Refresh_IntervalId );
			}

		}, 10000
	);
});
