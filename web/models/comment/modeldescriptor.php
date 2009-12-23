<?php
/**
 * Model Descriptor
 * You must always create this exact file Ex. /web/models/MODELNAME/modeldescriptor.php
 * in order for everything to work right.  Class name must always use: '_ModelDescriptor' 
 * t the end of the class name.
 */
class Comment_ModelDescriptor extends Db_Descriptor
{
	public function __construct()
	{
		$this->setSingular('comment'); //table name
		$this->setClass('Comment_Model'); //model class name Exact
		$this->add($this->newPrimaryKey('id'));  //primary id
		$this->add($this->newColumn('name'));    //Table columns in the database
		$this->add($this->newColumn('comment')); //Table columns in the database
	}
}
?>