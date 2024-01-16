<?php

    session_start ();

    try 
    {
        var_dump($_REQUEST);
        if (isset ($_POST['delete']))
        { 

            // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
            $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

            // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
            $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // début de transaction
            $db -> beginTransaction ();

                // l'endroit ou executer
                $requete = $db -> prepare (

                    "SELECT
                        *
                    FROM
                        disc
                    "
                    );

                $requete -> execute ();

                // afficher le resultat en object
                $tablevinyle = $requete -> fetchALL (PDO::FETCH_OBJ);

                // aller chercher le id par la method post
                $idvinyle = $_POST['id'];

                // requete de supression
                $query = $db -> prepare (

                    "DELETE
                        FROM
                            disc
                        WHERE
                            disc_id = :id
                        "
                    );

                    // modification grace à l'id
                    $query -> bindValue (':id', $idvinyle, PDO::PARAM_INT);

                $query -> execute ();

                $db -> commit ();

                // alert
                echo "<br>Ceci est l'Id: <br>";

                echo ("-> " . $idvinyle . "<br>");

                echo "Transaction validé";

                header ("Location: index.php?page=vinyle");

            exit;

        }

        else
        {
            // alert
            echo "Échec de transaction";
        }

    }
    catch (PDOException $e) 
    {
        // En cas d'exception, affiche le message d'erreur associé
        echo "Erreur : " . $e -> getMessage () . "<br>";

        // Termine le script en cas d'erreur
        die ("Fin du script");
    }


?>