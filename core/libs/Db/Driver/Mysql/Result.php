<?php
/*
 * Created by Martin Wernståhl on 2009-05-31.
 * Copyright (c) 2009 Martin Wernståhl.
 * All rights reserved.
 */

class Db_Driver_Mysql_Result extends Db_Result
{
	public function count()
	{
		return isset($this->num_rows) ? $this->num_rows : $this->num_rows = @mysql_num_rows($this->resource);
	}
	
	public function seek($n)
	{
		return ($n >= $this->count()) ? false : mysql_data_seek($this->resource, $n);
	}
	
	public function freeResult()
	{
		if (is_resource($this->resource))
		{
			mysql_free_result($this->resource);
			$this->resource = FALSE;
		}
	}
	
	public function next()
	{
		return mysql_fetch_object($this->resource);
	}

	public function nextArray()
	{
		return mysql_fetch_assoc($this->resource);
	}
	
	public function metadata()
	{
		$ret = array();
		// get encoding, so we can see if we need to correct for utf8
		$charset = mysql_client_encoding($this->dbh);
		$i = 0;
		
		while($field = mysql_fetch_field($this->resource))
		{
			$d = new stdClass();
			
			$d->name = $field->name;
			$d->type = $field->type;
			$d->default = $field->def;
			
			// get real length (eg. 45 for VARCHAR(45))
			$d->length = mysql_field_len($this->resource, $i);
			
			// convert to boolean
			$d->unsigned = $field->unsigned ? true : false;
			$d->primary_key = $field->primary_key ? true : false;
			
			// correct for utf8, mysql returns the number of bytes - not characters as it should
			if($charset == 'utf8' && in_array($d->type, array('string', 'blob')))
			{
				// mysql's utf8 blocks are 3 bytes in length
				$d->length = $d->length / 3;
			}
			
			// get auto_increment status:
			$t = mysql_field_flags($this->resource, $i);
			$d->auto_inc = strpos($t, 'auto_increment') !== false ? true : false;
			
			$ret[$d->name] = $d;
			
			$i++;
		}
		
		return $ret;
	}
}

/* End of file result.php */
/* Location: ./lib/drivers/mysql */