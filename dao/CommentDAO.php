<?php
require_once('dao/BaseDAO.php');
require_once('model/Comment.php');


class CommentDAO extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ?');
        $comments->execute(array($postId));
        
        return $comments;
    }

}