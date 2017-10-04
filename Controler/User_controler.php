<?php 

require_once (APP_ROOT . '/Model/Database.php');
require_once (APP_ROOT . '/Model/Validator.php');
require_once (APP_ROOT . '/Model/User_manager.php');
require_once (APP_ROOT . '/Controler/Admin_controler.php');
require_once (APP_ROOT . '/Controler/Landing_page_controler.php');


/**
* User_controler class
*/
class User_controler
{
	public function addUser(Array $data)
	{	
		$error = new Validator($data);
		$tabError = $error->getTabError();
		if (empty($tabError)) {
			$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
			$instance = Database::getDatabase();
			$requete = new User_manager($instance);
			$requete->addUser($data);
			new Landing_page_controler();
		} else {
			
		}
		

	}

	public function getAdminUser(Array $data)
	{	
		$error = new Validator($data);
		$tabError = $error->getTabError();
		if (empty($tabError)) {
			$admin = new Admin_controler();
			$admin->adminPage();
		} else {
			require_once (APP_ROOT . '/Vue/admin_connect_form.php');
		}
	}
}