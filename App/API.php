<?php 

/**
* 
*/
class API extends Request
{
	static $_key;

	private function __construct(){}

	public static function validate(){	
		self::allowHeaders();
		if (!isset($_SERVER["API_KEY"]) || !self::validateKey($_SERVER["API_KEY"])){
			self::error(403);
		}
	}

	public static function validateKey(string $key): bool{
		if ($key) {
			$dbh = Connect::getInstance()->_dbh;
			$q = "SELECT api FROM users WHERE api = :key";
			$stmt = $dbh->prepare($q);
			$stmt->bindValue(":key", $key, PDO::PARAM_STR);
			$stmt->execute();
			if ($stmt->rowCount()) {
				self::$_key = $key;
				return true;
			}
		}
		return false;
	}

	public static function generateKey(): string{
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
			mt_rand( 0, 0xffff ),
			mt_rand( 0, 0x0fff ) | 0x4000,
			mt_rand( 0, 0x3fff ) | 0x8000,
			mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
	}
}