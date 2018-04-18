<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css'/>
    <title>gestion des commentaires</title>
</head>
<body>

    <?php include('templates/nav.php'); ?>

    <?php

        foreach ($comment as $comment)
        {
    ?>
        <div class="comments">
            <h3> <?php echo htmlspecialchars($comment->getAuthor()); ?> </h3>
            <p> <?php echo htmlspecialchars($comment->getComment()); ?> </p>
            <p>publié le: <?php echo htmlspecialchars($comment->getDateComment()); ?></p>
            <form action="index.php?action=deleteComment&amp;id=<?php echo $comment->getId();?>" method="post">
                <div>
                    <input type="submit" value="supprimer"/>
                </div>
            </form>
        </div>
    <?php
        }
    ?>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script> 
</body>
</html>