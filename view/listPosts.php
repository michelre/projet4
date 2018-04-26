<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="public/images/favicon.ico" type="image/x-icon" /> 
    <link rel="shortcut icon" href="public/images/favicon.ico" type="image/x-icon" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css'/>
    <link rel="stylesheet" href="public/nav.css">
    <link rel="stylesheet" href="public/margin.css">
    <title>Gestion chapitre</title>
</head>
<body>

    <?php include('templates/nav.php'); ?>
    <h3 class="text-center margin-admin">modifier chapitre</h3>
    <div class="border border-dark m-5 p-5">
        <?php
        foreach ($posts as $post)
        {
        ?>
        <div class="posts">
            <a href="index.php?action=updatePost&amp;id=<?php echo $post->getId(); ?>"><?php echo htmlspecialchars($post->getTitle()); ?></a>
        </div>
        <?php
        }
        ?>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script> 
</body>
</html>