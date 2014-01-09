<?

/**
 * Queues HTML Resources for loading to the output buffer
 * To add resources see the queue_stylesheet and queue_script methods
 * To load HTML to the buffer see the get_stylesheets, get_header_scripts and get_footer_scripts methods
 * @author http://degeotechnologies.com/
 */
class HTML_Resources {
	
	public $stylesheets = array();
	public $header_scripts = array();
	public $footer_scripts = array();
	
	/**
	 * Add a stylesheet to the queue
	 * @param (string) $url - the url resource to be loaded
	 * @param (string) $rel - the relationship to be used in the html tag
	 * @return (bool) true
	 */
	public function queue_stylesheet( $url, $rel = 'stylesheet' ) {
		$this->stylesheets[] = array(
			'url' => $url,
			'rel' => $rel
		);
		
		return true;
	} // function
	
	/**
	 * Add a script to the queue
	 * @param (string) $url - the url resource to be loaded
	 * @param (string) $location - where in the html document to load the script
	 * @return (bool) true
	 */
	public function queue_script( $url, $location = 'footer' ) {
		switch( $location ):
			case 'header':
				$this->header_scripts[] = $url;
				break;
			case 'footer':
			default:
				$this->footer_scripts[] = $url;
				break;
		endswitch;
		
		return true;
	} // function
	
	/**
	 * Echos out the Stylesheets
	 */
	public function get_stylesheets() {
		echo $this->get_stylesheets_html();
	} // function
	
	/**
	 * Get the Stylesheets HTML from the queue
	 * @return (string) $html - the html to be sent to the output buffer
	 */
	public function get_stylesheets_html() {
		$html = '';
		
		foreach( $this->stylesheets as $resource ):
			$html .= $this->get_stylesheet_html( $resource['url'], $resource['rel'] );
		endforeach;
		
		return $html;
	} // function
	
	/**
	 * Echos out the Header Scripts
	 */
	public function get_header_scripts() {
		echo $this->get_header_scripts_html();
	} // function
	
	/**
	 * Get the Header Scripts HTML from the queue
	 * @return (string) $html - the html to be sent to the output buffer
	 */
	public function get_header_scripts_html() {
		return $this->get_scripts_html( $this->header_scripts );
	} // function
	
	/**
	 * Echos out the Footer Scripts
	 */
	public function get_footer_scripts() {
		echo $this->get_footer_scripts_html();
	} // function
	
	/**
	 * Get the Footer Scripts HTML from the queue
	 * @return (string) $html - the html to be sent to the output buffer
	 */
	public function get_footer_scripts_html() {
		return $this->get_scripts_html( $this->footer_scripts );
	} // function
	
	/**
	 * Get the Scripts HTML from the queue
	 * @param (array) $scripts - the scripts array to be used as the queue
	 * @return (string) $html - the html to be sent to the output buffer
	 */
	public function get_scripts_html( $scripts = array() ) {
		$html = '';
		
		foreach( $scripts as $resource ):
			$html .= $this->get_script_html( $resource );
		endforeach;
		
		return $html;
	} // function
	
	/**
	 * Get the Stylesheet HTML for a resource
	 * @param (string) $url - the url resource to be used
	 * @param (string) $rel - the relation to be used
	 * @return (string) $html - the html to be sent to the output buffer
	 */
	public function get_stylesheet_html( $url, $rel = 'stylesheet' ) {
		return "<link type=\"text/css\" rel=\"{$rel}\" href=\"{$url}\" />\r\n";
	} // function
	
	/**
	 * Get the Script HTML for a resource
	 * @param (string) $url - the url resource to be used
	 * @return (string) $html - the html to be sent to the output buffer
	 */
	public function get_script_html( $url ) {
		return "<script type=\"text/javascript\" src=\"{$url}\"></script>\r\n";
	} // function
	
} // class