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
		$controller = empty($controller) ? default_controller : $controller;
		if(!is_null($controller)) {
			
			//load controller class
			$require_file = ROOTDIR . "web/controllers/" . strtolower($controller) . ".php";
			
			if(!file_exists($require_file)) {
				throw new MinworkException("Controller file couldn't be found: ".$require_file);
			}
			
			require_once $require_file;
			
			$_controller = ucfirst($controller) . '_Controller';
			$action      = Request::instance()->get("a", 1);
			$params      = Request::instance()->get("params", 1);
			$params      = empty($params) ? array() : @explode(",", $params);
			
			$tmp_cntrl   = false;
			
			if(!class_exists($_controller)) {
				throw new MinworkException("Controller class '".$_controller."' does not exist");
			}
			
			//create object and load actions if available
			$controller = new $_controller();
			
			//if we're dealing with template class controllers
			if(is_a($controller, 'Template_Controller')) {
				$tmp_cntrl = true;
			}
			
			if(empty($action)) {
				$action = default_action;
			}
			
			if(!method_exists($controller, $action)) {
				throw new MinworkException("Controller action '$action' does not exist");
			}
			
			if(preg_match("/^_/i", $action)) {
				throw new MinworkException("Cannot access private method '$action' via uri");
			}
			
			call_user_func_array(array($controller, $action), $params);
			
			//render template if template class
			if($tmp_cntrl) {
				$controller->__render();
			}	
		}
	}
}