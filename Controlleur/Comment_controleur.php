<?php

require_once(APP_ROOT . '/Model/Comment.php');
require_once(APP_ROOT . '/Model/Comment_manager.php');
require_once(APP_ROOT . '/Model/Database.php');

/**
 * Comment_controleur
 */
class Comment_controleur
{
    public function getAll()
    {
        $instance = Database::getdatabase();
        $requete = new Comment_manager($instance);
        $comments = $requete->getAllComment();
        require(APP_ROOT . '/Vue/comments.php');
        return $comments;
    }
}