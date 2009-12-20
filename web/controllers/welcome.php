<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Welcome Controller
 */
 
class Welcome_Controller extends Template_Controller
{
	public function main()
	{
		echo "This is the main controller page";
	}
	
	public function another_page()
	{
		echo "Another page :D; don't forget about private functions and what not";
	}
}
?>