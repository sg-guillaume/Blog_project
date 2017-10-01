<?php 

require_once(APP_ROOT . '/Model/Database.php');
require_once(APP_ROOT . '/Model/Comment.php');
require_once(APP_ROOT . '/Model/Article.php');
require_once(APP_ROOT . '/Model/Validator.php');
require_once(APP_ROOT . '/Model/Comment_manager.php');
require_once(APP_ROOT . '/Model/Article_manager.php');

/**
 * Admin class
 */
class Admin_controler
{
    /**
     * summary
     */
    public function __construct()
    {
    	
    }

    public function adminPage()
    {   
    	$instance = Database::getdatabase();
    	$comment = new Comment_manager($instance);
    	$article = new Article_manager($instance);
    	$articles = $article->getAllArticle();
    	$comments = $comment->getReported();
    	require(APP_ROOT . '/Vue/adminpage.php');
    	return $articles;
    }

    public function testLogin($mail, $mdp)
    {
    	if (preg_match('^[a-z]*(\.|\-|\_|)[a-z]*[@][a-z]*(\.[a-z]*|)\.[a-z]{2,4}$', $mail) == 1) {
    		
    		$this->adminPage();
    	}
    }
}