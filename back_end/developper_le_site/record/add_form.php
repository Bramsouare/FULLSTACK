<?php

    try
    {
        // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
        $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

        // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
        $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // selectionne la table artist
        $requete = $db -> prepare(

            "SELECT
                * 
            FROM
                artist
            "
            );

        // execute la requête
        $requete -> execute();
    
        // affiche le resultat en objet
        $artisttable = $requete -> fetchALL(PDO::FETCH_OBJ);
    }

    // en cas d'échec catch capture les erreurs
    catch (Exception $e)
    {
        // alert asocié a l'exception
        echo "Erreur: " . $e -> getMessage () . "<br>";

        // fin du script
        die ("Fin du script");
    }
?>

<div class="container-fluid">

    <div class="d-flex justify-content-center">
        <h1>Le formulaire d'ajout</h1>
    </div>

    <h3>Ajouter un vinyle</h3><br>

    <form action="add_script.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="titre">Title</label>
            <input type="titre" class="form-control" name="titre" placeholder="Entrer un titre">
        </div>

        <div class="form-group">
            <label for="artiste">Artist</label>
            <select class="form-control" name="artiste">

                <?php foreach ($artisttable as $artist): ?>

                    <option value="<?=$artist -> artist_id; ?>">
                        <?=$artist -> artist_name; ?>
                    </option>
                    
                <?php endforeach; ?>

            </select>
        </div>

        <div class="form-group">
            <label for="annee">Year</label>
            <input type="annee" class="form-control" name="annee" placeholder="Entrer une année">
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <input type="genre" class="form-control" name="genre" placeholder="Entrer un genre(Rock, Pop, Prog...)">
        </div>
        <div class="form-group">
            <label for="label">Label</label>
            <input type="label" class="form-control" name="label" placeholder="Entrer un label(EMI, Warner, PolyGram, Univers sale...)">
        </div>
        <div class="form-group">
            <label for="prix">Price</label>
            <input type="prix" class="form-control" name="prix">
        </div>

        <label for="picture"><h5>Picture</h5></label>
        <input type="file" name="photo">
        

        <div class="row d-flex justify-content-start my-2 mx-auto">
            <button type="submit" class="btn btn-primary mr-2" name="push">Ajouter</button>
            <a type="button" class="btn btn-primary" href="index.php">Retour</a>
        </div>

    </form>

</div>
