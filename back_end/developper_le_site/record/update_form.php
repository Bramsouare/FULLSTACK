<?php

    try
    {

        // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
        $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

        // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
        $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $idlien = $_GET["id"];

        // var_dump ($idlien);

        // sélectionne la table disc et artist
        $requete = $db -> prepare (

            "SELECT 
                *
            FROM 
                disc INNER JOIN artist ON disc.artist_id = artist.artist_id 
            "
            );

        // execute la requête
        $requete -> execute ();

        // affiche les resultat en objet
        $table = $requete -> fetchALL(PDO::FETCH_OBJ);
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
        <h1>Le formulaire de modification</h1>
    </div>

    <h3>Modifier un vinyle</h3><br>

    <?php foreach ($table as $disc ) { 
        
        if ($idlien == $disc -> disc_id) { ?>

            <form action = "update_script.php?id=<?= $disc -> disc_id ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="titree">Title</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_title ?>" name="titree">
                </div>

                <div class="form-group">
                    <label for="artistee">Artist</label>
                    <select class="form-control" name="artistee">

                        <?php foreach ($table as $artist): ?>

                            <option value="<?=$artist -> artist_id; ?>">
                                <?=$artist -> artist_name; ?>
                            </option>
                            
                        <?php endforeach; ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="anneee">Year</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_year ?>" name="anneee">
                </div>
                <div class="form-group">
                    <label for="genree">Genre</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_genre ?>" name="genree">
                </div>
                <div class="form-group">
                    <label for="labell">Label</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_label ?>" name="labell">
                </div>
                <div class="form-group">
                    <label for="prixx">Price</label>
                    <input class="form-control" type="text" value="<?= $disc -> disc_price ?>" name="prixx">
                </div>
                

                <label for="picture"><h5>Picture</h5></label>
                <!-- Champ caché pour stocker le chemin de l'image côté serveur -->
                <input type="hidden" value="<?=$disc->disc_picture?>" name="image">
                <input type="file" name="photo">

                <div class="col-9 mb-4">
                    <img src="img/<?= $disc -> disc_picture ?>" style="width: 250px; height: auto;">
                </div>

    <?php } }; ?>


                <div class="row d-flex justify-content-start my-2 mx-auto">
                    <input type="submit" class="btn btn-primary mr-2" href="update_script.php" name="pushh" value="Modifier">
                    <a type="button" class="btn btn-primary" href="index.php?page=details">Retour</a>
                </div>

            </form>

</div>
