1 : La première étape consiste à établir une connexion à la base de données en utilisant PDO.

<?php
    
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
        
        // sélectionne tout les plat et affecter la valeur dans la variable stmt
        $stmt = $conn -> query ("SELECT * FROM plat");

        // retourne tout les plat du tableau en objet
        $tableau = $stmt -> fetchALL (PDO::FETCH_OBJ);

        // parcour tout les ligne du tableau
        foreach ($tableau as $ligne)
        {
            // affiche le libelle des plats
            echo $ligne -> libelle . "<br><br>";
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