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
                $image = $_POST["image"];

            

                // afficher les information collecter 
                // echo "<br><br> request: <br>br> ";
                // var_dump($_REQUEST);

                // echo "<br><br> post: <br>br> ";
                // var_dump($_POST);

                // echo "<br><br> GET: <br>br> ";
                // var_dump($_GET);

                // echo "<br><br> FILES: <br>br> ";
                // var_dump($_FILES);

            
                // paramettre de modificatioin de valeurs
                $query = $db -> prepare (

                    "UPDATE 
                        `disc` INNER JOIN `artist` ON `disc`.`artist_id`= `artist`.`artist_id`
                    SET 
                        `disc`.`disc_title` = :titree, `disc`.`disc_year` = :anneee, `disc`.`disc_genre` = :genree, 
                        `disc`.`disc_label` = :labell, `disc`.`disc_price` = :prixx, `disc`.`disc_picture` = :photo,
                        `artist`.`artist_name` = :artistee WHERE `disc`.`disc_id` = :id 
                    "
                    );

                
                    
                    // si il y a une img et si img detecte une erreurs et si une erreur et detecter l'ors du telechargement et si dans img il y a rien
                    if (isset($_FILES["photo"]) && isset($_FILES["photo"]["error"]) == UPLOAD_ERR_OK && $_FILES["photo"]["size"] > 0) 
                    {
                        // mettre img dans la variable
                        $photo = $_FILES["photo"]["name"];

                        // modifier img en chaine de caractère et en object
                        $query -> bindValue (':photo', $photo, PDO::PARAM_STR);
                    }

                    // sinon si il y a quelque choses dans le fichier
                    else if (isset($_FILES['photo']) )
                    {
                        // aller chercher les info 
                        $photo = $_FILES['photo']['name'];

                        // sinon si Aucun nouveau fichier n'a été téléchargé, utiliser la valeur existante
                        $query -> bindValue (':photo', $table[0] -> disc_picture, PDO::PARAM_STR);
                    }
                    
                    else
                    {
                        // sinon aller chercher les info 
                        $img=$_POST['image'];

                        // puis les remplacer en chaine de caractère puis en objet
                        $query -> bindValue (':photo', $img, PDO::PARAM_STR);

                    };
                    
                    $query -> bindValue (':titree', $titre, PDO::PARAM_STR);
                    $query -> bindValue (':artistee', $artiste, PDO::PARAM_STR);
                    $query -> bindValue (':anneee', $annee, PDO::PARAM_STR);
                    $query -> bindValue (':genree', $genre, PDO::PARAM_STR);
                    $query -> bindValue (':labell', $label, PDO::PARAM_STR);
                    $query -> bindValue (':prixx', $prix, PDO::PARAM_STR);
                    $query -> bindValue (':id', $id, PDO::PARAM_STR);
                    $query -> execute ();
                
                $db -> commit ();

            echo "Transaction reussie";

            // redirection sur la page vinyle
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