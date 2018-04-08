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
    $comment = $commentDAO->getComments($_GET['id']);

    require('view/chapitre.php');
}

function addComment($postId, $author, $comment)
{
    $commentDAO = new CommentDAO();

    $affectedLines = $commentDAO->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}



