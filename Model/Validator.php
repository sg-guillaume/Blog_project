<?php 

require_once (APP_ROOT . '/Model/Database.php');
require_once (APP_ROOT . '/Model/User_manager.php');

/**
 * Validator class check data from Forms
 */
class Validator
{	
	protected $tabError = [];
    
    /**
     * summary
     */
    public function __construct(Array $data)
    {	
    	if (isset($data['lastname'])) {
            $this->controlLastname($data['lastname']);
        }

        if (isset($data['firstname'])) {
            $this->controlFirstname($data['firstname']);
        }
    	
        if (isset($data['content'])) {
            $this->controlContent($data['content']);
        }

        if (isset($data['artContent'])) {
            $this->controlArtContent($data['artContent']);
        }

        if (isset($data['title'])) {
            $this->controlTitle($data['title']);
        }
    	
        if (isset($data['email'])) {
            $this->controlEmail($data['email']);
        }

        if (isset($data['password'])) {
            $this->controlPassword($data['password']);
        }

        if (isset($data['validPassword'])) {
            $this->controlValidPassword($data['validPassword']);
        }

    }
    public function controlContent($content)
    {
    	if (strlen(trim($content)) < 5) {
    		$this->tabError['content'] = "Votre message est trop court.";
    	} else if (strlen(trim($content)) > 250) {
    		$this->tabError['content'] = "Votre message est trop long.";
    	}

    	if (empty(trim($content))) {
    		$this->tabError['content'] = "Il est impossible d'envoyer un commentaire vide.";
    	}
    }

    public function controlArtContent($content)
    {
        if (empty(trim($content))) {
            $this->tabError['artContent'] = "Il est impossible d'envoyer un commentaire vide.";
        }
    }

    public function controlFirstname($firstname)
    {
    	if (strlen(trim($firstname)) < 2) {
    		$this->tabError['firstname'] = "Votre prénom est trop court";
    	} else if (strlen(trim($firstname)) > 30) {
    		$this->tabError['firstname'] = "Votre prénom est trop long";
    	}

    	if (empty(trim($firstname))) {
    		$this->tabError['firstname'] = "Vous avez oublié de renseigner votre prénom.";
    	}
    }

    public function controlLastname($lastname)
    {
    	if (strlen(trim($lastname)) < 2) {
    		$this->tabError['lastname'] = "Votre nom est trop court";
    	} else if (strlen(trim($lastname)) > 30) {
    		$this->tabError['lastname'] = "Votre nom est trop long";
    	}

    	if (empty(trim($lastname))) {
    		$this->tabError['lastname'] = "Vous avez oublié de renseigner votre nom.";
    	}
    }

    public function controlTitle($title)
    {
        if (strlen(trim($title)) < 5) {
            $this->tabError['title'] = "Votre titre est trop court";
        } else if (strlen(trim($title)) > 100) {
            $this->tabError['title'] = "Votre titre est trop long";
        }

        if (empty(trim($title))) {
            $this->tabError['title'] = "Vous avez oublié de renseigner le titre.";
        }
    }

    public function controlEmail($email)
    {
        if (empty(trim($email)) /*|| !preg_match('^[a-z]*(\.|\-|\_|)[a-z]*[@][a-z]*(\.[a-z]*|)\.[a-z]{2,5}$', $email)*/) {
            $this->tabError['email'] = "L'email saisi n'est pas valide.";
        }
    }

    public function controlPassword($password)
    {
        if (empty(trim($password))) {
            $this->tabError['password'] = "Mot de passe invalide";
        }
    }

    public function controlValidPassword($password)
    {   
        $instance = Database::getDatabase();
        $user = new User_manager($instance);
        $adminUser = $user->getAdminUser();
        if (!password_verify($password, $adminUser->getPassword())) {
            $this->tabError['validPassword'] = "Mot de passe invalide";
        }
    }

    public function getTabError()
    {
    	return $this->tabError;
    }


}