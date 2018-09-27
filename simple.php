<?php 

class Logger {
	static function getInstance ()
	{
		if(self::$instance == NULL) {
			self::$instance = new Logger();
		}
		return self::$instance;
	}

	private function __construct()
	{

	}

	private function __clone()
	{

	}

	function Log($str) 
	{
		// 日志
		print $str;
	}

	static private $instance = NULL;
}

Logger::getInstance()->Log("Checkpoint");

