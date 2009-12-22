<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Welcome Controller
 */
 
class Welcome_Controller extends Template_Controller
{
	//Default template wrapping file
	public $template = 'template'; 
	
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
	 * Default controller, Required (Don't need to define the "a")
	 * Ex. http://localhost/minwork/index.php?c=welcome
	 */
	public function main()
	{
		echo "This is the main controller page";
		$this->template->data = array(
			'array' => 'of_data',
			'this'  => 'is_pretty',
			'cool'  => ':D'
		);
	}
	
	/**
	 * Another example page
	 * Ex. http://localhost/minwork/index.php?c=welcome&a=another_page
	 */
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
		echo 'this shouldnt output template data';
		$this->template->data = array(
			'array' => 'of_data',
			'this'  => 'is_pretty',
			'cool'  => ':D'
		);
		//echo $this->template; //__toString View class outputs the html
	}
	
	/**
	 * Example of the contact route
	 */
	public function contact()
	{
		echo "Hello, this is the contact route http://localhost/minwork/index.php/contact.html";
	}
}