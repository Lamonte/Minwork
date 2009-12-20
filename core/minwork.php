<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Core
 */
class Minwork
{
	/**
	 * Function loads existing controller or throws an exception
	 * if a controller/method doesn't exist
	 *
	 * @return	void
	 */
	public function load_controllers()
	{
		$controller = Request::instance()->get("c", 1); 
		if(!is_null($controller)) {
			
			require_once ROOTDIR . "web/controllers/" . strtolower($controller) . ".php";
			
			$_controller = ucfirst($controller) . '_Controller';
			$action      = Request::instance()->get("a", 1);
			$params      = Request::instance()->get("params", 1);
			$params      = is_null($params) ? array() : $params;
			
			if(!class_exists($_controller)) {
				return null; //throw exception
			}
			
			//create object and load actions if available
			$controller = new $_controller();
			
			if(!is_a($controller, 'Template_Controller')) {
				return null; //throw exception
			}
			
			if(is_null($action)) {
				$action = "main";
			}
			
			if(!method_exists($controller, $action)) {
				return null; //throw an exception
			}
			
			return call_user_func_array(array($controller, $action), $params);
		}
	}
}
?>