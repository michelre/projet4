<?php
require_once('dao/PostDAO.php');
require_once('dao/CommentDAO.php');

class FrontendController
{
    private $postDAO;
    private $commentDAO;

    public function __construct()
    {
        $this->postDAO = new PostDAO();
        $this->commentDAO = new CommentDAO();
    }

    public function listPosts()
    {
        $posts = $this->postDAO->getPosts();
        require('view/accueil.php');
    }

    public function post()
    {
        $post = $this->postDAO->getPost($_GET['id']);
        $comment = $this->commentDAO->getComments($_GET['id']);
        $posts = $this->postDAO->getPosts();
        require('view/chapitre.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $affectedLines = $this->commentDAO->postComment($postId, $author, $comment);
        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function reportedComment($commentId)
    {
        $comment = $this->commentDAO->statusComment($commentId);
        header('location: index.php');
    }

    public function connexionForm()
    {
        $posts = $this->postDAO->getPosts();
        if (isset($_COOKIE["session"])){
            require('view/admin.php');
        }
        else{
            require('view/connexion.php');
        } 
    }
}
