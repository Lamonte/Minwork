<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Core
 */
 
class View
{
	private $_data        = array();
	private $_view        = null;
	private $_render_data = null;
	
	/**
	 * Setup some class defaults
	 */
	public function __construct($view = 'template')
	{
		$this->_view = $view;
	}
	
	/**
	 * Newly created data added to class array so we
	 * know which data to extract when rendering the view as
	 * well as not overwrite existing class variables.
	 *
	 * @return	void
	 */
	public function __set($key, $val) {
		//TODO: throw in exception if key is a class variable
		$this->_data[$key] = $val;
	}
	
	/**
	 * Renders view file if printed to the screen
	 *
	 * @return	void
	 */
	public function __toString()
	{
		return $this->render(TRUE);
	}
	
	/**
	 * Load and render template file
	 *
	 * @return	void
	 */
	public function render($return = false)
	{
		
		//Try loading the view file then outputting it to the screen
		if(!file_exists(ROOTDIR . "web/views/" . $this->_view . ".php")) {
			//TODO: Throw exception
			return false;
		}
		
		//Save the html in a file
		ob_start();
		
		extract($this->_data);
		
		include_once ROOTDIR . "web/views/" . $this->_view . ".php";
		$this->_render_data = ob_get_contents();
		
		ob_end_clean();
		
		//do we want to return the data ?
		if($return == false) {
			echo $this->_render_data;
			$this->_render_data = null;
		} else {
			$_tmp_render_data = $this->_render_data;
			$this->_render_data = null;
			return $_tmp_render_data;
		}
	}
}