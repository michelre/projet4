<?php
require_once('dao/PostDAO.php');
require_once('dao/CommentDAO.php');

function listPosts()
{
    $postDAO = new PostDAO();
    $posts = $postDAO->getPosts();

    require('view/accueil.php');
}

function post()
{
    $postDAO = new PostDAO();
    $commentDAO = new CommentDAO();

    $post = $postDAO->getPost($_GET['id']);
    $comments = $commentDAO->getComments($_GET['id']);

    require('view/chapitre.php');
}



