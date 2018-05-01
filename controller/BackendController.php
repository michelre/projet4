<?php
require_once('dao/PostDAO.php');
require_once('dao/CommentDAO.php');
require_once('dao/UserDAO.php');

class BackendController
{
    private $postDAO;
    private $commentDAO;
    private $userDAO;

    public function __construct()
    {
        $this->postDAO = new PostDAO;
        $this->commentDAO = new CommentDAO;
        $this->userDAO = new UserDAO;
    }

    public function connexion($pseudo, $password)
    {
        $user = $this->userDAO->connect($pseudo);
        $posts = $this->postDAO->getPosts();
        if (password_verify($password, $user->getPassword())){
            $cookieValue = 'connexion';
            setcookie("session", $cookieValue, time()+1200);
            header('Location: index.php?action=connexionForm');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function disconnect()
    {
        $cookieValue = 'connexion';
        setcookie("session", $cookieValue, time()-1200);
        header('Location: index.php');
    }

    public function newPost()
    {
        if (isset($_COOKIE["session"])){
            $posts = $this->postDAO->getPosts();
            require('view/addPost.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function addPost($titlePost, $contentPost)
    {
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->createPost($titlePost, $contentPost);
            if ($post === false){
                throw new Exception('Impossible de créer l\'article !');
            }
            else{
                header('Location: index.php');
            }
        }
        else{
            require('view/connexion.php');
        }
    }

    public function updateList()
    {
        if (isset($_COOKIE["session"])){
            $posts = $this->postDAO->getPosts();
            require('view/listPosts.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function postUpdate()
    {
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->getPost($_GET['id']);
            $posts = $this->postDAO->getPosts();
            require('view/updatePost.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function updateConfirmation($titlePost, $contentPost, $postId)
    {
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->updatePost($titlePost, $contentPost, $postId);
            header('Location: index.php?action=post&id=' . $postId);
        }
        else{
            require('view/connexion.php');
        }
    }

    public function deletePost($postId)
    {
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->deletePost($postId);
            header('Location: index.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function reportedList()
    {
        if (isset($_COOKIE["session"])){
            $comment = $this->commentDAO->commentList();
            $posts = $this->postDAO->getPosts();
            require('view/commentaires.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function deleteComments($commentId)
    {
        if (isset($_COOKIE["session"])){
            $comment = $this->commentDAO->deleteComment($commentId);
            header('Location: index.php?action=reportedCommentList');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function acceptComments($commentId)
    {
        if (isset($_COOKIE["session"])){
            $comment = $this->commentDAO->acceptComment($commentId);
            header('location: index.php?action=reportedCommentList');
        }
        else{
            require('view/connexion.php');
        }
    }
}