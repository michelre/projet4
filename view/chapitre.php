<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css'/>
    <title>chapitre</title>
</head>
<body>

    <?php include('templates/nav.php');?>
    <?php include('templates/header.php');?>

    <div class="post  m-5 p-4">
        <h2 class="text-center"> <?php echo htmlspecialchars($post->getTitle()); ?> </h2>
        <p> <?php echo $post->getContent(); ?> </p>
    </div>

    <div class="addComment m-5 ">
        <h3 class="text-center m-5">Ajout commentaires</h3>
        <form class="border border-dark p-4" action="index.php?action=addComment&amp;id=<?php echo $post->getId(); ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="envoyer"/>
            </div>
        </form>
    </div>

    <div class="comment m-5">
        <h3 class="text-center m-5">Commentaires</h3>
        <?php

            foreach ($comment as $comment)
            {
            ?>
            <div class="comments border  border-dark mb-4 p-4">
                <h3> <?php echo htmlspecialchars($comment->getAuthor()); ?> </h3>
                <p> <?php echo htmlspecialchars($comment->getComment()); ?> </p>
                <p>publié le: <?php echo htmlspecialchars($comment->getDateComment()); ?></p>
                <form action="index.php?action=reportComment&amp;id=<?php echo $comment->getId();?>" method="post">
                    <div>
                        <input class="btn btn-primary" type="submit" value="signaler"/>
                    </div>
                </form>
            </div>
            <?php
            }
        ?>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script> 
</body>
</html>