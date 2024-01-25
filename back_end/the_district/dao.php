<?php

    // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
    $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=the_district', 'admin', 'bramsouare');

    // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
    $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $requet = $db -> prepare (
        
        "SELECT 
            *
        FROM
            categorie
        "
        );

    $requet -> execute ();
    $categories = $requet -> fetchALL (PDO::FETCH_OBJ);


    $requete = $db -> prepare (
        
        "SELECT 
            *
        FROM
            plat
        "
        );

    $requete -> execute ();
    $plats = $requete -> fetchALL (PDO::FETCH_OBJ);
    
    
    $tableau = $db -> prepare (

        "SELECT
            *
        FROM
            plat INNER JOIN commande ON
            plat.id = commande.id_plat
        ORDER BY
            commande.quantite DESC
        "
        );
    
    $tableau -> execute ();
    $meilleur = $tableau -> fetchALL (PDO::FETCH_OBJ);

    $nombre = 0;
    $nombres = 0;

?>