<?php
    require('connexion.php');
    if (isset($_POST['nom'], $_POST['prenom']) && 
        !empty($_POST['nom']) && !empty($_POST['prenom']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = $_POST['prenom'];

        mysqli_query($connexion, "INSERT INTO users(nom, prenom)
        VALUES('$nom', '$prenom')");

        header('location:index.php');
        exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="">
        <div class="input-field">
            <input name="nom" id="nom" type="text" class="validate">
            <label for="nom">Nom</label>
        </div>
        <div class="input-field">
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div class="input_submit my-3">
            <button type="submit" class="btn">envoyer</button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
