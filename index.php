<?php
require('controller/FrontendController.php');
require('controller/BackendController.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            $frontendController = new FrontendController();
            $frontendController->listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $frontendController = new FrontendController();
                $frontendController->post();
            }
            else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $frontendController = new FrontendController();
                    $frontendController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $frontendController = new FrontendController();
                $frontendController->reportedComment($_GET['id']);
            }
        }

        elseif ($_GET['action'] == 'addPost'){
            if (!empty($_POST['titlePost']) && !empty($_POST['contentPost'])){
                $backendController = new BackendController();
                $backendController->addPost($_POST['titlePost'], $_POST['contentPost']);
            }
            else{
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'connexionForm'){
            $frontendController = new FrontendController();
            $frontendController->connexionForm();
        }

        elseif ($_GET['action'] == 'connexion'){
            if (!empty($_POST['pseudo']) && !empty($_POST['password'])){
                $backendController = new BackendController();
                $backendController->connexion($_POST['pseudo'], $_POST['password']);
            }
        }

        elseif ($_GET['action'] == 'newPost'){
            $backendController = new BackendController();
            $backendController->newPost();
        }
        elseif ($_GET['action'] == 'updateList'){
            $backendController = new BackendController();
            $backendController->updateList();
        }
        elseif ($_GET['action'] == 'updatePost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backendController = new BackendController();
                $backendController->postUpdate();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateConfirmation'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['titlePost']) && !empty($_POST['contentPost'])) {
                    $backendController = new BackendController();
                    $backendController->updateConfirmation($_POST['titlePost'], $_POST['contentPost'], $_GET['id']);
                }
                else {
                    throw new Exception('tous les champs ne sont pas remplis !');
                }
            }
        }
        elseif ($_GET['action'] == 'delete'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $backendController = new BackendController();
                $backendController->deletePost($_GET['id']);
            }
        }

        elseif ($_GET['action'] == 'reportedCommentList'){
            $backendController = new BackendController();
            $backendController->reportedList();
        }

        elseif ($_GET['action'] == 'deleteComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendController = new BackendController();
                $backendController->deleteComments($_GET['id']);
            }
        }

        elseif ($_GET['action'] == 'acceptComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                $backendController = new BackendController();
                $backendController->acceptComments($_GET['id']);
            }
        }
    }

    else {
        $frontendController = new FrontendController;
        $frontendController->listPosts();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
