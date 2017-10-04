<?php

require_once('Comment.php');

/**
 * Comment_manager class   CRUD for Comments
 */
class Comment_manager
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

	public function getAllComment($articleId)
	{
		$comments = [];

		$requete = $this->dbInstance->query("SELECT id, firstname, lastname, content, creationDate 
											 FROM Comment 
											 WHERE articleId =" . $articleId);

		while ($data = $requete->fetch(PDO::FETCH_ASSOC))
		{
			$comments[] = new Comment($data);
		}

		return $comments;
	}

	/**
	 * @param $id
	 */

	public function getComment($id)
	{		
		$requete = $this->dbInstance->query("SELECT id, firstname, lastname, content, creationDate 
											 FROM Comment 
											 WHERE id =" . $id);

		$data = $requete->fetch(PDO::FETCH_ASSOC);

		return new Comment($data);
	}

	public function getReported()
	{
		$reported = [];
		$requete = $this->dbInstance->query("SELECT id, firstname, lastname, content, creationDate
											 FROM Comment
											 WHERE reported = TRUE");
		while ($data = $requete->fetch(PDO::FETCH_ASSOC)) 
		{
			$reported[] = new Comment($data);
		}
		return $reported;
	}

	public function addComment(Array $data)
	{
		/**
		 * Preparation requete INSERT INTO
		 * Assignation des valeurs correspondantes aux différents champs : firstname, lastname, title, content, creationDate
		 * Execution de la requete
		 */

		$requete = $this->dbInstance->prepare("INSERT INTO Comment(firstname, lastname, content, creationDate, articleId) 
											   VALUES(:firstname, :lastname, :content, NOW(), :articleId)");
		$requete->execute(array(
				'firstname' => htmlspecialchars($data['firstname']),
				'lastname'	=> htmlspecialchars($data['lastname']),
				'content'	=> htmlspecialchars($data['content']),
				'articleId'	=> htmlspecialchars($data['articleId'])
				));

	}

	public function updateComment(Array $comment)
	{
		/**
		 * Préparation requete UPDATE
		 * Assignation des valeurs à la requete
		 * Execution de la requete
		 */

		$requete = $this->dbInstance->prepare("UPDATE Comment 
											   SET content = :content, reported = :reported, creationDate = NOW() WHERE id =" . $comment['comId']);
		$requete->execute(array(
				'content'	=> $comment['content'],
				'reported'	=> $comment['reported']
				));
	}

	public function reportUpdate($commentId)
	{	
		$requete = $this->dbInstance->prepare("UPDATE Comment 
											   SET reported = TRUE
											   WHERE id=" . $commentId);
		$requete->execute();
	}

	public function deleteComment($commentId)
	{
		/**
		 * Execution d'une requete de type DELETE
		 */
		$this->dbInstance->exec("DELETE FROM Comment WHERE id = " . $commentId);

	}
}