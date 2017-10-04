<?php

require_once(APP_ROOT . '/Model/Comment.php');
require_once(APP_ROOT . '/Model/Comment_manager.php');
require_once(APP_ROOT . '/Model/Database.php');

/**
 * Comment_controleur
 */
class Comment_controler
{
    public function getAll()
    {
        $instance = Database::getdatabase();
        $requete = new Comment_manager($instance);
        $comments = $requete->getAllComment();
        require(APP_ROOT . '/Vue/comments.php');
        return $comments;
    }

    public function reportedComment($commentId)
    {
    	$instance = Database::getdatabase();
    	$requete = new Comment_manager($instance);
    	$requete->reportUpdate($commentId);
    }

    public function getOne($id, $error = NULL)
    {   
        $tabError = $error;
        $instance = Database::getDatabase();
        $requete = new Comment_manager($instance);
        $comment = $requete->getComment($id);
        require(APP_ROOT . '/Vue/one_comment.php');
        //return $comment;      
    }

    public function deleteComment($commentId)
    {
        $instance = Database::getdatabase();
        $requete = new Comment_manager($instance);
        $requete->deleteComment($commentId);
    }

    public function updateComment($data)
    {
        $instance = Database::getdatabase();
        $requete = new Comment_manager($instance);
        $requete->updateComment($data);
    }
}