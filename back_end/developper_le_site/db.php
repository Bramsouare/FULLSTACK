
<html>
    <head>
        <meta charset = "UTF-8">
        <title>Test PDO</title>
    </head>
    <body>
        <?php 
            try
            {
                // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
                $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

                // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
                $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // selectionne la table artiste entièrement
                $requete = $db -> query ("SELECT * FROM artist");

                //recupère le resultat et retourne un tableau uniquement d'objet
                $tableau = $requete -> fetchALL (PDO::FETCH_OBJ);

                // libère les resource et la base de données pourra être utiliser pour d'autre requête
                $requete -> closeCursor();

                // message d'alerte
                echo "Connection réussie !";
            }
            catch (Exception $e) // en cas d'exception exécution de catch solution de débogage
            {
                // affichage message d'érreur associé a l'exception
                echo "Erreur : " . $e -> getMessage() . "<br>";

                // affiche le code d'erreur associé a l'exception
                echo "N° : " . $e -> getCode();

                die ("fin du script");
            }
        
        ?>

        <br>

        <?php
            // parcourir le tableau et chaque élémentsera stocké dans la variable artist
            foreach ($tableau as $artist):
        ?>

        <br>

        <div>
            <!-- affiche le nom de l'artiste -->
            <?= $artist -> artist_name?>
        </div>

        <br>
        
        <?php 
            //fin de la boucle
            endforeach; 
        ?>

    </body>
</html>