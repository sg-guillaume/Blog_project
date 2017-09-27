<?php 
require_once(APP_ROOT . '/Model/Database.php');
require_once(APP_ROOT . '/Model/Comment.php');
require_once(APP_ROOT . '/Model/Validator.php');
require_once(APP_ROOT . '/Model/Comment_manager.php');


/**
 * Form controler
 */
class Form_controler
{
    public function insertComment($data)
    {
    	$instance = Database::getdatabase();
    	$comment = new Comment_manager($instance);
    	$comment->addComment($data);
    }



    /*public function controlComment(Array $data)
    {
    	$control = new Validator($data);
    	if ($control === TRUE) {
    		$newComment = new Comment($data);
    		$instance = Database::getdatabase();
    		$comment = new Comment_manager($instance);
    		$comment->addComment($newComment);
    		return TRUE;
    	}
    }*/
}