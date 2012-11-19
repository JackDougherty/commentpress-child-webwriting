/* 
===============================================================
Javascript overrides for CommentPress Nav Below theme
===============================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
---------------------------------------------------------------
*/



// is the admin bar shown?
if ( cp_wp_adminbar == 'y' ) {

	// open style declaration
	styles = '<style type="text/css" media="screen">';

	// move down
	styles += '#header { top: 95px !important; } ';

	// close style declaration
	styles += '</style>';

	// write to page now
	document.write( styles );
	
}

