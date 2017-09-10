<?php

/**
* User class Manage users data
*/
class User
{
	/**
	 *  
	 */
	protected $id;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $password;
	protected $creationDate;

	public function __construct(Array $data)
	{
		$this->hydrate($data);
	}

	public function getId()
	{
		return $this->id;
	}

	public function getFirstname()
	{
		return $this->firstname;
	}

	public function getLastname()
	{
		return $this->lastname;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getCreationDate()
	{
		return $this->creationDate;
	}

	public function setId($id)
	{	
		if (!empty($id)) {
			$this->id = $id;
		}		
	}

	public function setFirstname($firstname)
	{
		if (!empty(trim($firstname))) {
			$this->firstname = htmlspecialchars($firstname);
		}
	}

	public function setLastname($lastname)
	{
		if (!empty(trim($lastname))) {
			$this->lastname = htmlspecialchars($lastname);
		}		
	}

	public function setEmail($email)
	{
		if (!empty(trim($email)) && $email /* répond à la regex */) {
			$this->email = htmlspecialchars($email);
		}
	}

	public function setPassword($password)
	{
		if (!empty(trim($password))) {
			$this->password = $password; //crypter le mot de passe avant insertion en bdd... crypt() ou crypt(blowfish) ?
		}		
	}

	public function setCreationDate($creationDate)
	{	
		if (!empty($creationDate)) {
			$this->creationDate = $creationDate;
		}
	}

	public function hydrate($data)
	{   
	    foreach ($data as $key => $value) {

	        $newKey = ucfirst($key);
	        $method = "set" . $newKey;

	        if (is_callable(array($this, $method))) {
	            $this->$method($value);
	        }
	    }

	    return $this;
	}
}