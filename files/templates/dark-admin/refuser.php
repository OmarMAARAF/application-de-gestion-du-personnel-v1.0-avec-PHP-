<?php
    include 'ConnectDb.php';
    $query = "update  demande
        set  etat = 'refuse'
        where id=" . $_GET['id'] . " ";
    mysqli_query($data, $query);
    header("location: liste_demande.php");

    

    ?>