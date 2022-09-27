<?php
    require("connexion.php");

    $query = mysqli_query($connexion, "SELECT * FROM users ");
    $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
    <main>
    
    
    <table class="striped centered">
        <thead>
            <tr >
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php  foreach($result as $value) { ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['nom'] ?></td>
                <td><?= $value['prenom'] ?></td>
                <td><?= $value['date_insertion'] ?></td>
                <td>
                    <a href="delete.php?id=<?= $value['id'] ?>" class="waves-effect waves-light btn-large red darken-2">supprimer</a>
                    <a href="update.php?id=<?= $value['id'] ?>" class="waves-effect waves-light btn-large teal darken-2">modifer</a>   
                </td>
                </tr>
        <?php  } ?>
    </table>
    <a href="add.php?id=<?= $value['id'] ?>" class="waves-effect waves-light btn-large cyan darken-1">Ajouter un Champ</a>
    </main>
    
</body>
</html>    