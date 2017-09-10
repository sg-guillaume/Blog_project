<?php 

/**
* Database class Manage database connexion
* 
*/

class Database
{	
	
	const DB_NAME = 'Projet_blog_p4'; 
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASS = '';
	private static $dbInstance;

	private function __construct() {}

	public static function getDatabase()
	{

		if (self::$dbInstance === null) {
			
			self::$dbInstance = new PDO("mysql:dbname=" . self::DB_NAME . ";host =" . self::DB_HOST . ";charset=utf8", self::DB_USER, self::DB_PASS);
			self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$dbInstance;
	}

	

}