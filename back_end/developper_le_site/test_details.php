<html>
    <head>
        <meta charset = "UTF-8">
        <title>Test PDO</title>
    </head>
    <body> 
    <!-- <a href="details_disc.php?disc_id=1">Voir les détails du disque</a> -->

        <?php 
            try 
            {
                // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
                $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

                // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
                $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                echo "Connection reussie !";

                // préparation requeête séléctionne la table disc ou la colonne disc_id et = à un paramètre quand la requête sera executé  
                $requete = $db -> prepare ("select * from disc where disc_id=2");

                // exécution de requête et remplace le (?) par ($_GET["disc_id"])
                $requete -> execute ();
               

                // chaque ligne sera retourné sous forme d'objet
                $disc = $requete -> fetch (PDO:: FETCH_OBJ);
              
              
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
        <br><br>
            Disc N° <?= $disc -> disc_id ?>
        <br><br>
            Disc name <?= $disc -> disc_title ?>
        <br><br>
            Disc year <?= $disc -> disc_year ?>

        <!-- 
            1 : Testez cette page avec différentes valeurs pour vérifier son bon fonctionnement.

            2 : Essayez avec un numéro de disque qui n'existe pas, la variable $disc contient la valeur null.

            3 : Faites en sorte que votre page affiche un message particulier si le disque n'existe pas.

            ATTENTION : lorsque vous construisez une requête avec un ou plusieurs paramètres, vous ne devez jamais concaténer,
            vous devez utiliser les méthodes prepare() et execute()
        -->
        
    </body>

</html>
