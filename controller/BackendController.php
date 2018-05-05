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

    public function connexion($reqData)
    {
        $pseudo = $reqData["pseudo"] ?? "";
        $password = $reqData["password"] ?? "";
        $user = $this->userDAO->connect($pseudo);
        $posts = $this->postDAO->getPosts();
        if (password_verify($password, $user->getPassword())){
            $cookieValue = 'connexion';
            setcookie("session", $cookieValue, time()+1200);
            header('Location: /connexion');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function disconnect()
    {
        $cookieValue = 'connexion';
        setcookie("session", $cookieValue, time()-1200);
        header('Location: /');
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

    public function addPost($reqData)
    {
        $titlePost = $reqData["titlePost"];
        $contentPost = $reqData["contentPost"];
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->createPost($titlePost, $contentPost);
            if ($post === false){
                throw new Exception('Impossible de créer l\'article !');
            }
            else{
                header('Location: /');
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

    public function postUpdate($postId)
    {
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->getPost($postId);
            $posts = $this->postDAO->getPosts();
            require('view/updatePost.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function updateConfirmation($postId, $reqData)
    {
        $titlePost = $reqData["titlePost"];
        $contentPost = $reqData["contentPost"];

        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->updatePost($titlePost, $contentPost, $postId);
            header('Location: /posts/' . $postId);
        }
        else{
            require('view/connexion.php');
        }
    }

    public function deletePost($postId)
    {
        if (isset($_COOKIE["session"])){
            $post = $this->postDAO->deletePost($postId);
            header('Location: /');
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
            header('Location: /comments/reported');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function acceptComments($commentId)
    {
        if (isset($_COOKIE["session"])){
            $comment = $this->commentDAO->acceptComment($commentId);
            header('Location: /comments/reported');
        }
        else{
            require('view/connexion.php');
        }
    }
}
