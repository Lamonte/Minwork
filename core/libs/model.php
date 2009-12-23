<?php
class Model
{
	public function factory($class) 
	{
		$class = $class . "_Model";
		if(class_exists($class)) {
			return new $class;
		}
		return null;
	}
	
	public function save()
	{
		Db::save($this);
	}	
}
?>