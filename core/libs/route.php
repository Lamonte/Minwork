<?php
/**
 * @author	MinWork Developers
 * @copyright	2009-2010
 * @package	Core
 */
 
class Route
{
	private static $_Instance = null;
	private static $_Regex = array(
		'(:num)' => '(\d+)',
		'(:any)' => '(.*)',
	);
	private static $_Masks = array();
	
	
	private function __construct(){}
	public static function instance()
	{
		$class = __CLASS__;
		if(is_null(self::$_Instance)) {
			self::$_Instance = new $class();
		}
		return self::$_Instance;
	}	
	
	public function Mask($mask, $replacement)
	{
		self::$_Masks[] = array($mask, $replacement);
	}
	
	public function start_remapping()
	{	
		//remapp url masks
		$uri = implode("/", Uri::instance()->split_segments($_SERVER['REQUEST_URI']));
		foreach(self::$_Masks as $mask) {
		
			//prep regex
			$_mask = preg_quote($mask[0], '/');
			$_mask = str_replace("-", "\-", $_mask);
			
			foreach(self::$_Regex as $key => $val) {
				$tmp_key = preg_quote($key, '/');
				$_mask = str_replace($tmp_key, $val, $_mask);
			}
			
			if(preg_match("/" . $_mask . "/i", $uri, $matches)) {
				if(isset($matches[0])) unset($matches[0]);
				foreach($matches as $key => $val) {
					$mask[1] = str_replace("$" . $key, $val, $mask[1]);
				}
				$real_uri = Uri::instance()->split_segments($mask[1]);
				
				$_GET['c'] = $real_uri[0];
				$_GET['a'] = $real_uri[1];
				
				unset($real_uri[0]);
				unset($real_uri[1]);
				
				$_GET['params'] = implode(",", $real_uri);
			}	
		}
		
	}
}