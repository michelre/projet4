<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chapitre</title>
</head>
<body>
    <div class="post">
        <h2> <?php echo htmlspecialchars($post->getTitle()); ?> </h2>
        <p> <?php echo htmlspecialchars($post->getContent()); ?> </p>
    </div>

    <div class="addComment">
        <p>ajouter un commentaire:</p>
        <form action="index.php?action=addComment&amp;id=<?php echo $post->getId(); ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" value="envoyer"/>
            </div>
        </form>
    </div>

    <div class="comment">
        <p>Commentaires:</p>
        <?php

            foreach ($comment as $comment)
            {
            ?>
            <div class="posts">
                <h3> <?php echo htmlspecialchars($comment->getAuthor()); ?> </h3>
                <p> <?php echo htmlspecialchars($comment->getComment()); ?> </p>
                <p>publié le: <?php echo htmlspecialchars($comment->getDateComment()); ?></p>
            </div>
            <?php
            }
        ?>
    </div>

</body>
</html>