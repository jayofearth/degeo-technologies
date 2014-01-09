<?

include 'HTML_Resources.php';

$this->HTML_Resources = new HTML_Resources;

/**
 * Queuing a Stylesheet
 */
$this->HTML_Resources->queue_stylesheet( 'stylesheet.css' );

/**
 * Queuing a Script for the <head> tag
 */
$this->HTML_Resources->queue_script( 'javascript-file.js', 'header' );

/**
 * Queuing a Script for the end of the <body> tag
 */
$this->HTML_Resources->queue_script( 'javascript-file.js', 'footer' );