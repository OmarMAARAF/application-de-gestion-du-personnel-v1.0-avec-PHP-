<?php
    include 'ConnectDb.php';
    $query = "update  demande
        set  etat = 'valide'
        where id=" . $_GET['id'] . " ";
    mysqli_query($data, $query);
    header("location: liste_demande.php");
        
    

    ?>