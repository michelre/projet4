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

function addPost($titlePost, $contentPost)
{
    $postDAO = new PostDAO();
    $post = $postDAO->createPost($titlePost, $contentPost);

    if ($post === false){
        throw new Exception('Impossible de créer l\'article !');
    }
    else{
        header('Location: index.php');
    }
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


function admin()
{
    require('view/admin.php');
}

function newPost()
{
    require('view/addpost.php');
}

function updateList()
{
    $postDAO = new PostDAO();
    $posts = $postDAO->getPosts();

    require('view/listPosts.php');
}

function postUpdate()
{
    $postDAO = new PostDAO();
    $post = $postDAO->getPost($_GET['id']);

    require('view/updatePost.php');
}

function updateConfirmation($titlePost, $contentPost, $postId)
{
    $postDAO = new PostDAO();
    $post = $postDAO->updatePost($titlePost, $contentPost, $postId);

    header('Location: index.php?action=post&id=' . $postId);
}

function deletePost($postId)
{
   $postDAO = new PostDAO();
   $post = $postDAO->deletePost($postId);

   header('Location: index.php');
}
