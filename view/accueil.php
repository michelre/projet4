<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css'/>
    <title>Accueil</title>
</head>
<body>

    <?php include('templates/nav.php');?>
    <?php include('templates/header.php');?>

    <h1 class="text-center">Billet simple pour l'Alaska</h1>

    <div class="d-md-flex">
        <div class="présentation p-5">
            <p>bienvenue à vous je suis Forteroche Jean écrivain depuis plus de 20 ans. A l'occasion de la sortie de mon nouveau roman,
             je vous propose de le découvrir sur mon site internet sous la forme de chapitre qui sortiront successivement les uns après les autres.</p>
        </div>
        <div class="liste-article p-5 w-100">
            <table class="table table-striped table-bordered ">
                <thead>
                    <tr class="text-center">
                        <th scope="col">titre</th>
                        <th scope="col">date de publication</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($posts as $post)
                        {
                    ?>
                    <tr class="text-center">
                        <td><?php echo htmlspecialchars($post->getTitle()); ?></td>
                        <td><?php echo htmlspecialchars($post->getDateCreated()); ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script> 
</body>
</html>