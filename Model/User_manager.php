<?php

require_once('User.php');

/**
* User_manager class
*/
class User_manager
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

	public function addUser(Array $data)
	{	
		$requete = $this->dbInstance->prepare("INSERT INTO User(firstname, lastname, email, password, creationDate) 
											   VALUES(:firstname, :lastname, :email, :password, NOW())");
		$requete->execute(array(
				'firstname' => $data['firstname'],
				'lastname'	=> $data['lastname'],
				'email'		=> $data['email'],
				'password'	=> $data['password']
				));
	}

	public function getAdminUser()
	{
		$requete = $this->dbInstance->query("SELECT firstname, lastname, password FROM User WHERE admin = TRUE");
		$adminUser = $requete->fetch(PDO::FETCH_ASSOC);
		return new User($adminUser);
	}
}