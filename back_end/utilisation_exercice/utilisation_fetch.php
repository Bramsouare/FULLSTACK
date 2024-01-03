<?php

    UTILISATION DE fetch() ET fetchAll() POUR RÉCUPÉRER LES DONNÉES


    1 : Voici un exemple de code qui utilise fetchAll() pour récupérer tous les plats dans la table plat :

    // Exécutez la requête SQL pour sélectionner toutes les colonnes de la table "plat"
    $stmt = $conn -> query ("SELECT * FROM plat");

    // Récupérez toutes les lignes du résultat
    $results = $stmt -> fetchALL ();

    // Parcourez les résultats avec une boucle
    foreach ($results as $row)
    {
        // Affichez les valeurs des colonnes 'libelle' et 'prix'
        echo $row ['libelle'] . " - " . $row ['prix'] . "<br>";
    }




    PDO propose plusieurs modes de récupération des résultats de requête, qui déterminent la façon dont les données sont retournées par la méthode fetch() ou fetchAll(). Les voici:

    * PDO::FETCH_ASSOC : // Retourne chaque ligne de résultat sous la forme dun tableau associatif, un mode de récupération par défaut
    * PDO::FETCH_NUM : // Retourne chaque ligne de résultat sous la forme d'un tableau indexé numériquement, où les index correspondent aux positions des colonnes dans le jeu de résultats.
    * PDO::FETCH_BOTH : // Retourne chaque ligne de résultat sous la forme d'un tableau qui contient à la fois des clés associatives et des index
    * PDO::FETCH_OBJ : // Retourne chaque ligne de résultat sous la forme d'un objet anonyme, où les propriétés de l'objet correspondent aux noms des colonnes
    * PDO::FETCH_CLASS : // Retourne une nouvelle instance de la classe demandée, liant les colonnes du jeu de résultats aux noms des propriétés de la classe.



    2 : Par exemple, si vous souhaitez récupérer les résultats dune requête sous la forme dun tableau associatif, vous pouvez utiliser le mode PDO::FETCH_ASSOC de la manière suivante :

    // Préparez la requête SQL pour sélectionner toutes les colonnes de la table "plat"
    $stmt = $pdo -> prépare ("SELECT * FROM plat");

    // Exécutez la requête
    $stmt -> execute ();

    // Récupérez toutes les lignes résultantes sous forme de tableau associatif
    $resultats = $stmt -> fetchALL (PDO::FETCH_ASSOC);

?>