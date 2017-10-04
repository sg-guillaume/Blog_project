<?php
require_once(APP_ROOT . '/Model/Article_manager.php');
require_once(APP_ROOT . '/Model/Database.php');

/**
* InsertArticle_controler class
*/
class InsertArticle_controler
{
	
	public function __construct(Array $data)
	{
		$instance = Database::getDatabase();
		$requete = new Article_manager($instance);
		$requete->addArticle($data);
	}
}