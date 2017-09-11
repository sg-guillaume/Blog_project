<?php

require_once(APP_ROOT . '/Model/Article.php');
require_once(APP_ROOT . '/Model/Article_manager.php');
require_once(APP_ROOT . '/Model/Database.php');

/**
* Article_controlleur
*/
class Article_controlleur
{	
	public function getAll()
	{
		$instance = Database::getDatabase();
		$requete = new Article_manager($instance);
		$articles = $requete->getAllArticle();
		require(APP_ROOT . '/Vue/articles.php');
		return $articles;
	}


}