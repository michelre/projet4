<?php 
    $pseudo = 'clement';
    $mdp = password_hash("projet", PASSWORD_DEFAULT);
    $email = 'jeanforteroche@outlook.fr';

    $db = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8', 'root', '');
    $req = $db->prepare('INSERT INTO user (pseudo, mot_de_passe, email) VALUES(:pseudo, :mdp, :email)');
    $req->execute(array(
        'pseudo' => $pseudo,
        'mdp' => $mdp,
        'email' => $email
    ));

