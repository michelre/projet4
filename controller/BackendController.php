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
        if ($user->getPassword() == password_verify($password, $user->getPassword())){
            require('view/admin.php');
        }
        else{
            require('view/connexion.php');
        }
    }

    public function newPost()
    {
        $posts = $this->postDAO->getPosts();
        require('view/addPost.php');
    }

    public function addPost($titlePost, $contentPost)
    {

        $post = $this->postDAO->createPost($titlePost, $contentPost);
        if ($post === false){
            throw new Exception('Impossible de créer l\'article !');
        }
        else{
            header('Location: index.php');
        }
    }

    public function updateList()
    {
        $posts = $this->postDAO->getPosts();
        require('view/listPosts.php');
    }

    public function postUpdate()
    {
        $post = $this->postDAO->getPost($_GET['id']);
        $posts = $this->postDAO->getPosts();
        require('view/updatePost.php');
    }

    public function updateConfirmation($titlePost, $contentPost, $postId)
    {
        $post = $this->postDAO->updatePost($titlePost, $contentPost, $postId);
        header('Location: index.php?action=post&id=' . $postId);
    }

    public function deletePost($postId)
    {
        $post = $this->postDAO->deletePost($postId);
        header('Location: index.php');
    }

    public function reportedList()
    {
        $comment = $this->commentDAO->commentList();
        $posts = $this->postDAO->getPosts();
        require('view/commentaires.php');
    }

    public function deleteComments($commentId)
    {
        $comment = $this->commentDAO->deleteComment($commentId);
        header('Location: index.php?action=reportedCommentList');
    }

    public function acceptComments($commentId)
    {
        $comment = $this->commentDAO->acceptComment($commentId);
        header('location: index.php?action=reportedCommentList');
    }
}