<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'/>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css'/>
    <title>Administration</title>
</head>
<body>
    <?php include('templates/nav.php'); ?>
    <h3 class="text-center m-3">Administration</h3>

    <div class="actionAdmin m-5 p-4 border border-dark">
        <a href="index.php?action=newPost">créer un nouveau chapitre</a>
        <a href="index.php?action=updateList" class="d-block">modifier/supprimer un chapitre</a>
        <a href="index.php?action=reportedCommentList">gestion des commentaires</a>
    </div>
    

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.js'></script> 
</body>
</html>