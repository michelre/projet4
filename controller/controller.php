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
    //$posts = $postDAO->getPosts();
    
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

function reportedComment($commentId)
{
    $commentDAO = new CommentDAO();
    $comment = $commentDAO->statusComment($commentId);
    header('location: index.php');
}


function admin()
{
    $postDAO = new PostDAO();
    $posts = $postDAO->getPosts();
    require('view/admin.php');
}

function newPost()
{
    $postDAO = new PostDAO();
    $posts = $postDAO->getPosts();
    require('view/addPost.php');
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

function reportedList()
{
    $commentDAO = new CommentDAO();
    $comment = $commentDAO->commentList();

    require('view/commentaires.php');
}
