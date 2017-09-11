<?php

require_once('Article.php');

/**
* Article Manager class CRUD for articles
*/


class Article_manager
{
	protected $dbInstance;

	/**
	 * @param $dbInstance 
	 */

	public function __construct($dbInstance)
	{
		$this->setDbInstance($dbInstance);
	}

	public function setDbInstance($dbInstance)
	{
		$this->dbInstance = $dbInstance;
	}

	/**
	 * 
	 */

	public function getAllArticle()
	{
		$articles = [];

		$requete = $this->dbInstance->query("SELECT id, firstname, lastname, title, content, creationDate 
											 FROM Article");

		while ($data = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$articles[] = new Article($data);
		}

		return $articles;
	}

	/**
	 * @param $id
	 */

	public function getArticle($id)
	{		
		$requete = $this->dbInstance->query("SELECT id, firstname, lastname, title, content, creationDate 
											 FROM Article 
											 WHERE id =" . $id);

		$data = $requete->fetch(PDO::FETCH_ASSOC);

		return new Article($data);
	}

	public function addArticle(Article $article)
	{
		/**
		 * Preparation requete INSERT INTO
		 * Assignation des valeurs correspondantes aux différents champs : firstname, lastname, title, content, creationDate
		 * Execution de la requete
		 */

		$requete = $this->dbInstance->prepare("INSERT INTO Article(firstname, lastname, title, content, creationDate) 
											   VALUES(:firstname, :lastname, :title, :content, NOW())");
		$requete->execute(array(
				'firstname' => $article->getFirstname(),
				'lastname'	=> $article->getLastname(),
				'title'		=> $article->getTitle(),
				'content'	=> $article->getContent()
				));

	}

	public function updateArticle(Article $article)
	{
		/**
		 * Préparation requete UPDATE
		 * Assignation des valeurs à la requete
		 * Execution de la requete
		 */

		$requete = $this->dbInstance->prepare("UPDATE Article 
											   SET firstname = :firstname, lastname = :lastname, title = title, content = :content, creationDate = NOW() WHERE id = :id");
		$requete->execute(array(
				'firstname' => $article->getFirstname(),
				'lastname'	=> $article->getLastname(),
				'title'		=> $article->getTitle(),
				'content'	=> $article->getContent(),
				'id' 		=> $article->getId()
				));
	}

	public function deleteArticle(Article $article)
	{
		/**
		 * Execution d'une requete de type DELETE
		 */
		$this->dbInstance->exec("DELETE FROM Article WHERE id = " . $article->getId());

	}
}