<?php

require_once('Article.php');
require_once('Comment.php');

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
		
		$requete = $this->dbInstance->query("SELECT a.id, a.firstname, a.lastname, a.title, a.content, a.creationDate, c.id comment_id, c.firstname comment_firstname, c.lastname comment_lastname, c.content comment_content, c.creationDate comment_creationDate, c.articleId articleId
											 FROM Article a
											 LEFT JOIN Comment c
											 ON a.id = c.articleId
											 WHERE a.id =" . $id);

		$data = $requete->fetchAll(PDO::FETCH_ASSOC);
		$article = new Article([
							'id' 			=> $data[0]['id'],
							'firstname' 	=> $data[0]['firstname'],
							'lastname'		=> $data[0]['lastname'],
							'title'			=> $data[0]['title'],
							'content'		=> $data[0]['content'],
							'creationDate' 	=> $data[0]['creationDate']
							]);

		foreach ($data as $comment) {
			
			$newComment = new Comment([
							'id'			=> $comment['comment_id'],
							'firstname'		=> $comment['comment_firstname'],
							'lastname'		=> $comment['comment_lastname'],
							'content'		=> $comment['comment_content'],
							'creationDate' 	=> $comment['comment_creationDate'],
							'articleId'		=> $comment['articleId']
							]);
			$article->setComments($newComment);
		}
		return $article;
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