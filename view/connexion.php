<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css'/>
    <link rel="stylesheet" href="../public/formConnexion.css">
    <title>Connexion</title>
</head>
<body>

    <?php include('../templates/nav.php'); ?>

    <form class="form-signin">
        <h4 class="h3 mb-3 font-weight-normal text-center">Connectez vous :</h4>
        <label for="inputEmail" class="sr-only">nom</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="nom..." required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
    </form>
    

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script> 
</body>
</html>