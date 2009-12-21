<?php
class MinworkException extends Exception 
{
	public function __construct($message = null)
	{
		parent::__construct($message);
	}
	
	public function handle()
	{
		$msg   = array();
		$msg[] = "Message: " . $this->getMessage();
		$msg[] = "File   : " . $this->getFile();
		$msg[] = "Line   : " . $this->getLine();
		$msg[] = "Trace  : " . $this->getTraceAsString();
		
		//load error page
		if(ERRORS_ON == true) {
			$msg = implode("<br />\n", $msg);
		
			$error_page = new View('show_errors', false);
			$error_page->data = $msg;
			$page = $error_page->render(TRUE);
			if(!$page)
				echo $msg;
			else
				echo $page;
		}
	}
}