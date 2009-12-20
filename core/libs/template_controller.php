<?php
class Template_Controller
{
	public $template = 'template'; //default template file
	public $auto_render = true;    //check: __render() function
	
	/**
	 * Load default template
	 */
	public function __construct()
	{
		$this->template = new View($this->template);
	}
	
	/**
	 * Auto rendering if auto render is off the html will not
	 * display unless echoing the template variable or calling 
	 * the render function from controller: $this->template->render();
	 *
	 * @return	void
	 */
	public function __render()
	{
		if($this->auto_render == true) {
			$this->template->render();
		}
	}
}