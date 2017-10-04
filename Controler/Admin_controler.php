<?php 

require_once(APP_ROOT . '/Model/Database.php');
require_once(APP_ROOT . '/Model/Comment.php');
require_once(APP_ROOT . '/Model/Article.php');
require_once(APP_ROOT . '/Model/Validator.php');
require_once(APP_ROOT . '/Model/Comment_manager.php');
require_once(APP_ROOT . '/Model/Article_manager.php');
require_once(APP_ROOT . '/Controler/Admin_controler.php');

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

    public function adminPage($errorTab = NULL)
    {   
    	$instance = Database::getdatabase();
    	$comment = new Comment_manager($instance);
    	$article = new Article_manager($instance);
    	$articles = $article->getAllArticle();
    	$comments = $comment->getReported();
        $errors = $errorTab;
    	require(APP_ROOT . '/Vue/adminpage.php');
    	return $articles;
    }

    

    public function adminConnectForm()
    {
    	require(APP_ROOT . '/Vue/admin_connect_form.php');
    }

    public function subscribeForm()
    {
        require(APP_ROOT . '/Vue/subscribe_form.php');
    }
}