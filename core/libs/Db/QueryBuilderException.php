<?php
/*
 * Created by Martin Wernståhl on 2009-08-15.
 * Copyright (c) 2009 Martin Wernståhl.
 * All rights reserved.
 */

/**
 * Exception for the event that an error occurs during query building.
 */
class Db_QueryBuilderException extends Db_Exception
{
	/**
	 * The error message.
	 * 
	 * @var string
	 */
	protected $error_message;
	
	function __construct($error_message)
	{
		parent::__construct($error_message);
		
		$this->error_message = $error_message;
	}
	
	// ------------------------------------------------------------------------

	/**
	 * Returns the query error message.
	 * 
	 * @return string
	 */
	public function getErrorMessage()
	{
		return $this->error_message;
	}
}


/* End of file QueryBuilderException.php */
/* Location: ./lib/Db */