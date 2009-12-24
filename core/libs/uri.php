<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Core
 */
 
class Uri
{
	private static $_Instance = null;
	private function __construct(){}
	
	public static function instance()
	{
		$class = __CLASS__;
		if(is_null(self::$_Instance)) {
			self::$_Instance = new $class();
		}
		return self::$_Instance;
	}	
	
	public function has_segments()
	{
		if(Uri::count_segments() == 0) return false;
		return true;
	}
	
	public function segments($segment = null) // 0 = first segment
	{
		$uri = $_SERVER['REQUEST_URI'];
		
		$uri = $this->split_segments($uri);
		
		if(is_null($segment)) {
			return $uri;
		}
		
		if(isset($uri[$segment])) {
			return $uri[$segment];
		}
		
		return array();
	}
	
	public function split_segments($uri)
	{
		//strip url to just segments: /controller/action/params
		$save_uri = $uri;
		
		$uri = preg_replace("/.*?\/index\.php/i", "", $uri);
		$uri = preg_replace("/\?.*/i", "", $uri);
		$uri = preg_replace("/\/$/i", "", $uri);
		$uri = preg_replace("/^\//i", "", $uri);
		$uri = trim($uri);
		
		//split segments into an array
		$uri = empty($uri) ? array() : @explode("/", $uri);
		
		if(!preg_match("/.*?\/index\.php/i", $save_uri)) {
			if(is_array($uri) && count($uri) > 0) {
				unset($uri[0]);
			}
			$new_uri = array();
			foreach($uri as $u) {
				$new_uri[] = $u;
			}
			$uri = $new_uri;
		}
		
		return $uri;
	}
	
	public function count_segments()
	{
		return count(Uri::segments());
	}
	
	public function base()
	{
		global $config;
		return (isset($config['uri']) && isset($config['uri']['base']) ? $config['uri']['base'] : null);
	}
}