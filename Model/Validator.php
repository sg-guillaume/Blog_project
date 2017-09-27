<?php 

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
    	$this->controlLastname($data['lastname']);
    	$this->controlFirstname($data['firstname']);
    	$this->controlContent($data['content']);
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

    public function getTabError()
    {
    	return $this->tabError;
    }


}