<?php
require_once('dao/BaseDAO.php');
require_once('model/Comment.php');

class CommentDAO extends BaseDAO
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS comment_date FROM comments WHERE post_id = ?');
        $req->execute(array($postId));
        $comments = [];
        while($comment = $req->fetch()){
            array_push($comments, new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['comment'], $comment['comment_date']));
        }
        
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, date_comment) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function statusComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET reported_comment = 1 WHERE id = ?');
        $comment = $req->execute(array($commentId));

        return $comment;
    }

    public function commentList()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *, DATE_FORMAT(date_comment, \'%d/%m/%y\') AS comment_date FROM comments WHERE reported_comment = 1');
        $req->execute(array());
        $comments = [];
        while($comment = $req->fetch()){
            array_push($comments, new Comment($comment['id'], $comment['post_id'], $comment['author'], $comment['comment'], $comment['comment_date']));
        }
        
        return $comments;
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id =?');  
        $comment = $req->execute(array($commentId));
  
        return $comment;
    }

    public function acceptComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET reported_comment = 0 WHERE id = ?');
        $comment = $req->execute(array($commentId));

        return $comment;
    }

}