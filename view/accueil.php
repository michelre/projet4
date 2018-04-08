<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Projet 4</title>
</head>
<body>
    <h1>Mon nouveau roman</h1>
    <nav>
        <ul>
            <li><a href="index.php?action=listPosts">accueil</a></li>
            <li> chapitres
                <ul>
                    <li><a href="index.php?action=post&amp;id=1">chapitres 1</a></li>
                    <li><a href="index.php?action=post&amp;id=2">chapitres 2</a></li>
                    <li><a href="index.php?action=post&amp;id=3">chapitres 3</a></li>
                </ul>           
            </li>
            <li><a href="">se connecter</a></li>
        </ul>
    </nav>

    <?php
    foreach ($posts as $post)
    {
    ?>
    <div class="posts">
        <h2> <?php echo htmlspecialchars($post->getTitle()); ?> </h2>

        <p> <?php echo htmlspecialchars($post->getDateCreated()); ?> </p>
    </div>
    <?php
    }
    ?>
    
</body>
</html>