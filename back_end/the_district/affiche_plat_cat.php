
<?php

    // 3 : Voici comment on prépare une requête pour sélectionner tous les plats d'une catégorie spécifique en utilisant PDO :


    // $servername = "localhost";  // LE NOM DU SERVEUR 
    // $username = "admin";  // NOM D'UTILISATEUR 
    // $password = "bramsouare";  // MOTS DE PASSE 
    // $dbname = "the_district";  // NOM DE LA BASE DE DONNÉES 
    

    try 
    {
        // connection a la base de données 
        $conn = new PDO ("mysql:host=localhost;dbname=the_district", 'admin', 'bramsouare');

        // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
        $conn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // alert si la connection et appliquer sinon... 
        echo "Connecté avec succès à la base de données " . "<br><br><br>";
        
        $id_categorie = 4;

        // sélectionne tout les plat et affecter la valeur dans la variable stmt
        $stmt = $conn-> prepare ("SELECT * FROM plat WHERE id_categorie = :id_categorie");

        // bindValue lie une valeur a un paramètre
        $stmt ->bindValue (':id_categorie', $id_categorie);

        // execution du code
        $stmt ->execute ();

        // charque ligne et recupérer sous forme de tableau
        while ($row = $stmt -> fetch())
        {
            // affiche chaque libelle des plat par categorie
            echo $row['libelle'] . "<br>";
        }


    }
    // capture et gestion de l'exception 
    catch (PDOException $e)
    {
        // affichage message d'érreur associé a l'exception 
        echo "Érreur de connection à la base de données: " . $e -> getMessage();
    }

    // connexion à la base de données et renvoie l'objet PDO 
    function connect_database() 
    {
        try
        {
            // connection a la base de données 
            $conn = new PDO ("mysql:host=localhost;dbname=the_district", 'admin', 'bramsouare');

            // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré 
            $conn -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // alert si la connection et appliquer sinon... 
            echo "Connecté avec succès à la base de données";

            // retourne l'objet PDO 
            return $conn;
        }
        // capture et gestion de l'exception 
        catch (PDOException $e)
        {
            // affichage message d'érreur associé a l'exception 
            echo "Érreur de connection à la base de données: " . $e -> getMessage();
        }
    }

?> 