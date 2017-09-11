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

	public function getAllComment()
	{
		$comments = [];

		$requete = $this->dbInstance->query("SELECT id, firstname, lastname, content, creationDate 
											 FROM Comment");

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

	public function addComment(Comment $comment)
	{
		/**
		 * Preparation requete INSERT INTO
		 * Assignation des valeurs correspondantes aux différents champs : firstname, lastname, title, content, creationDate
		 * Execution de la requete
		 */

		$requete = $this->dbInstance->prepare("INSERT INTO Comment(firstname, lastname, content, creationDate) 
											   VALUES(:firstname, :lastname, :content, NOW())");
		$requete->execute(array(
				'firstname' => $comment->getFirstname(),
				'lastname'	=> $comment->getLastname(),
				'content'	=> $comment->getContent()
				));

	}

	public function updateComment(Comment $comment)
	{
		/**
		 * Préparation requete UPDATE
		 * Assignation des valeurs à la requete
		 * Execution de la requete
		 */

		$requete = $this->dbInstance->prepare("UPDATE Comment 
											   SET firstname = :firstname, lastname = :lastname, content = :content, creationDate = NOW() WHERE id = :id");
		$requete->execute(array(
				'firstname' => $comment->getFirstname(),
				'lastname'	=> $comment->getLastname(),
				'content'	=> $comment->getContent(),
				'id' 		=> $comment->getId()
				));
	}

	public function deleteComment(Comment $comment)
	{
		/**
		 * Execution d'une requete de type DELETE
		 */
		$this->dbInstance->exec("DELETE FROM Comment WHERE id = " . $comment->getId());

	}
}