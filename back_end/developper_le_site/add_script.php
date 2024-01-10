<?php

    session_start ();

    try
    {
        if (isset ($_POST['push']))
        {

            // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
            $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

            // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
            $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // début de transaction
            $db -> beginTransaction ();

            // sélectionner la table disc
            $requete = $db -> prepare (

                "SELECT
                    * 
                FROM 
                    disc
                "
                );

            // executer la requête
            $requete -> execute ();

            // afficher les élément en objet
            $tableau = $requete -> fetchALL (PDO::FETCH_OBJ);

            // envoyer les information via la methode post grace au name du formulaire
            $titre = $_POST["titre"];
            $artiste = $_POST["artiste"];
            $annee = $_POST["annee"];
            $genre = $_POST["genre"];
            $label = $_POST["label"];
            $prix = $_POST["prix"];
            // $img = $_FILES['photo']['name'];
          
            // afficher les information collecter 
            echo "<br><br> request: <br>br> ";
            var_dump($_REQUEST);
            echo "<br><br> post: <br>br> ";
            var_dump($_POST);
            echo "<br><br> GET: <br>br> ";
            var_dump($_GET);
            echo "<br><br> FILES: <br>br> ";
            var_dump($_FILES);

            // inserer un new disc 
            $query = $db -> prepare (

                "INSERT INTO 
                    disc (disc_title, artist_id, disc_year, disc_genre, disc_label, disc_price, disc_picture)
                VALUES
                    (:title, :artiste, :annee, :genre, :label, :prix, :photo)
                "
                );

                // parametre de modification de valeurs
                $query -> bindValue (':title', $titre, PDO::PARAM_STR);
                $query -> bindValue (':artiste', $artiste, PDO::PARAM_STR);
                $query -> bindValue (':annee', $annee, PDO::PARAM_INT);
                $query -> bindValue (':genre', $genre, PDO::PARAM_STR);
                $query -> bindValue (':label', $label, PDO::PARAM_STR);
                $query -> bindValue (':prix', $prix, PDO::PARAM_INT);
                // $query -> bindValue (':photo', $img, PDO::PARAM_STR);
                if (isset($_FILES['photo']) && isset($_FILES['photo']['error']) == UPLOAD_ERR_OK && $_FILES['photo']['size'] > 0) 
                {
                    // mettre img dans la variable
                    $photo = $_FILES['photo']['name'];

                    // modifier img en chaine de caractère et en object
                    $query -> bindValue (':photo', $photo, PDO::PARAM_STR);
                }

                // sinon
                else 
                {
                    // aller chercher les info 
                    $photo = $_POST['photo'];

var_dump($photo);                    // puis les remplacer en chaine de caractère puis en objet
                    $query -> bindValue (':photo', $photo, PDO::PARAM_STR);

                }
                $query -> execute ();

            // envoie des valeurs modifier
            $db -> commit ();
            
            // alert
            echo "Transaction accepter";

            // redirection sur la page vinyle
            // header ("Location: index.php");
            // exit ();
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
        echo "Erreur : " . $e->getMessage() . "<br>";

        // Termine le script en cas d'erreur
        die("Fin du script");
    }
    
?>