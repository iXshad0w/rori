<?php 

/**
* 
*/
class Connect
{
	private static $_instance;

	public $_dbh;

	private $_user = "crow";
	private $_pass = "Melkpak33";

	private function __construct(){
		$this->_dbh = new PDO('mysql:host=localhost;dbname=TENNIS', $this->_user, $this->_pass);
	}

	static function getInstance(): Connect{
		if(!self::$_instance){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
}