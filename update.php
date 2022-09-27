<?php
    require('connexion.php');

    if (isset($_GET['id'])) {
        $id_users = $_GET['id']; 
    }

    $result = mysqli_query($connexion, "SELECT * FROM users WHERE id=$id_users");
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_POST["nom"], $_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"])) 
    {
        $nom = strip_tags($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        
        $sql = "UPDATE users SET nom=?, prenom=? WHERE id=?";
        $stmt = mysqli_stmt_init($connexion);
 
        if (!mysqli_stmt_prepare($stmt, $sql)) 
        {
            echo "sql statement failed";
        } 
        else 
        {
            mysqli_stmt_bind_param($stmt, "sss", $nom, $prenom, $id_users);
            mysqli_stmt_execute($stmt);
        }

        header('location:index.php');
        exit(0) ;
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
    <?php foreach($result as $value) { ?>
    <form method="POST">
        <div class="input-field">
            <input placeholder=<?= $value['nom']?> name="nom"id="nom" type="text" class="validate">
            <label for="nom">Nom :</label>
        </div>
        <div class="input-field">
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom" name="nom" placeholder=<?= $value['prenom']?>>
        </div>
        <div class="input_submit my-3">
            <button type="submit" class="btn btn-primary">envoyer</button>
        </div>
    </form>
    <?php } ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

