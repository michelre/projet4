<?php
require_once('dao/BaseDAO.php');
require_once('model/Comment.php');

class CommentDAO extends BaseDAO
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM comments WHERE post_id = ?');
        $req->execute(array($postId));
        $comments = [];
        while($comment = $req->fetch()){
            array_push($comments, new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['comment'], $comment['date_comment']));
        }
        
        return $comments;
    }

}