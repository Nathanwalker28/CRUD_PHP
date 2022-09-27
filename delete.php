<?php
    require("connexion.php");  

    if (isset($_GET['id'])) {
        $userid = $_GET['id'];
        mysqli_query($connexion, "DELETE FROM users WHERE id=$userid");
    }

    header('location:index.php');

    exit(0);
?>