<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Welcome Controller
 */
 
class Welcome_Controller extends Template_Controller
{
	public $template = 'view_test'; //template file when loading template
	
	/**
	 * Must call parent construct for template controller to work
	 *
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Default controller, Required
	 */
	public function main()
	{
		echo "This is the main controller page";
	}
	
	public function another_page()
	{
		echo "Another page :D; don't forget about private functions and what not";
	}
	
	/**
	 * Example of auto rendering being default like KohanaPHP lovely :D
	 */
	public function view_test()
	{
		$this->auto_render = false;
		echo 'this shouldnt output data';
		
		/*
		$this->view = new View('view_test');
		$this->view->data = array(
			'array' => 'of_data',
			'this'  => 'is_pretty',
			'cool'  => ':D'
		);
		
		//$this->view->render();
		echo $this->view;
		
		*/
		$this->template->data = array(
			'array' => 'of_data',
			'this'  => 'is_pretty',
			'cool'  => ':D'
		);
		echo $this->template; //__toString View class outputs the html
	}
}
?>