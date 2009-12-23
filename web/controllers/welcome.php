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
	 * Ex. http://localhost/minwork/index.php/welcome/
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
	 * Example of the database library
	 */
	public function insert_comment()
	{
		//saves new row in the database
		$comment = new Comment_Model();
		$comment->name = "Lamonte";
		$comment->comment = "This is a test comment X";
		$comment->save();
		
		/** MySQL Table for this to work
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM
		*/
		
		//Also check out the models folder
		//PS:: Open config.php to enable to use of the models/database class and 
		//insert your database details
		
		/*
		$comment = Model::factory('comment');
		$comment->name = "Lamonte_test";
		$comment->save();
		*/
	}
	
	/**
	 * Another example page
	 * Ex. http://localhost/minwork/index.php/welcome/another_page/
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
		echo "Hello, this is the contact route http://localhost/minwork/contact.html";
		echo "<form method='post' action='http://localhost/minwork/contact.html'><input type='test' name='data'><input type='submit' value='submit' /></form>";
		if($_POST) {
			print_r($_POST);
		}
	}
}