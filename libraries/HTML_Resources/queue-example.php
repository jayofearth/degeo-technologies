<?

include 'HTML_Resources.php';

$HTML_Resources = new HTML_Resources;

/**
 * Queuing a Stylesheet
 */
$HTML_Resources->queue_stylesheet( 'stylesheet.css' );

/**
 * Queuing a Script for the <head> tag
 */
$HTML_Resources->queue_script( 'javascript-file.js', 'header' );

/**
 * Queuing a Script for the end of the <body> tag
 */
$HTML_Resources->queue_script( 'javascript-file.js', 'footer' );
