<?php

    session_start ();
  
    try
    {
        if (isset ($_POST['pushh']))
        {
            
            // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
            $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

            // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
            $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // début de la transaction
            $db -> beginTransaction ();

            $id = $_GET['id'];
        

            // sélectionne la table disc et artist
            $requete = $db -> prepare (

                "SELECT 
                    *
                FROM 
                    disc INNER JOIN artist ON disc.artist_id = artist.artist_id 
                WHERE
                    disc_id = $id
                "
                );

            // execute la requête
            $requete -> execute ();

            // affiche les resultat en objet
            $table = $requete -> fetchALL(PDO::FETCH_OBJ);

            // envoyer les information via la methode post grace au name du formulaire
            $titre = $_POST["titree"];
            $artiste = $_POST["artistee"];
            $annee = $_POST["anneee"];
            $genre = $_POST["genree"];
            $label = $_POST["labell"];
            $prix = $_POST["prixx"];
           

            // afficher les information collecter 
            echo "<br><br> request: <br>br> ";
            var_dump($_REQUEST);

            echo "<br><br> post: <br>br> ";
            var_dump($_POST);

            echo "<br><br> GET: <br>br> ";
            var_dump($_GET);

            echo "<br><br> FILES: <br>br> ";
            var_dump($_FILES);

          
            // paramettre de modificatioin de valeurs
            $query = $db -> prepare (

                "UPDATE 
                    disc INNER JOIN artist ON disc.artist_id = artist.artist_id
                SET 
                    disc.disc_title = :titree, disc.disc_year = :anneee, disc.disc_genre = :genree, 
                    disc.disc_label = :labell, disc.disc_price = :prixx, disc.disc_picture = :photoo,
                    artist.artist_name = :artistee WHERE disc.disc_id = :id 
                "
                );

                $query -> bindParam (':titree', $titre, PDO::PARAM_STR);
                $query -> bindParam (':artistee', $artiste, PDO::PARAM_STR);
                $query -> bindParam (':anneee', $annee, PDO::PARAM_STR);
                $query -> bindParam (':genree', $genre, PDO::PARAM_STR);
                $query -> bindParam (':labell', $label, PDO::PARAM_STR);
                $query -> bindParam (':prixx', $prix, PDO::PARAM_STR);
                $query -> bindParam (':id', $id, PDO::PARAM_STR);
                
                // si il y a une img et si img detecte une erreurs et si une erreur et detecter l'ors du telechargement et si dans img il y a rien
                if (isset($_FILES['photoo']) && isset($_FILES['photoo']['error']) == UPLOAD_ERR_OK && $_FILES['photoo']['size'] > 0) 
                {
                    // mettre img dans la variable
                    $photo = $_FILES['photoo']['name'];

                    // modifier img en chaine de caractère et en object
                    $photo -> bindValue (PDO::PARAM_STR);
                }

                // sinon
                else if (isset($_POST['photoo']) )
                {
                    // aller chercher les info 
                    $photo = $_POST['photoo'];

                    // puis les remplacer en chaine de caractère puis en objet
                    $query -> bindValue (':photoo', $photo, PDO::PARAM_STR);

                }
                
                else
                {
                    // aller chercher les info 
                    $photo = $_POST['img'];

                    // puis les remplacer en chaine de caractère puis en objet
                    $query -> bindValue (':photoo', $photo, PDO::PARAM_STR);

                };
                

            $query -> execute ();
            $db -> commit ();

            echo "Transaction reussie";

            // // redirection sur la page vinyle
            header ("Location: index.php?page=vinyle");
            exit ();
        }

        // sinon
        else
        {
            // alert 
            echo "Erreur de transaction"; 
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