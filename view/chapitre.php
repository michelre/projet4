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

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_comment'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
    ?>

</body>
</html>