<?php

    try
    {
        // HOST:adresse serveur heberge base données, DBNAME:nom base données, CHARSET=UTF-8:caractère utiliser, ROOT:utilisateur base données, (''): mdp
        $db = new PDO ('mysql:host=localhost;charset=utf8;dbname=record', 'admin', 'bramsouare');

        // indiquer à PDO de générer une exception à chaque fois qu'un problème est rencontré
        $db -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $ids = $_GET['id'];
        // var_dump($ids);

        $requet = $db -> prepare (

            "SELECT
                *
            FROM
                disc INNER JOIN artist ON disc.artist_id = artist.artist_id
            WHERE
                disc_id = $ids
            "
            );

        $requet -> execute ();

        $tableau = $requet -> fetchALL (PDO::FETCH_OBJ);
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
        <h1>Suprimer un vinyle </h1>
    </div>

    <form action="delete_script.php" method="POST" enctype="multipart/form-data">

        <?php foreach ($tableau as $disc) { 
            
            if ($ids == $disc -> disc_id ) { ?>

            <div class="form-group">
                <label for="titre">Title</label>
                <input class="form-control" type="text" value="<?= $disc -> disc_title ?>" name="titre">
            </div>

            <div class="form-group">
                <label for="artiste">Artist</label>
                <input class="form-control" type="text" value="<?= $disc -> artist_name?>" name="artiste">
            </div>

            <div class="form-group">
                <label for="annee">Year</label>
                <input class="form-control" type="text" value="<?= $disc -> disc_year ?>" name="annee">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input class="form-control" type="text" value="<?= $disc -> disc_genre ?>" name="genre">
            </div>
            <div class="form-group">
                <label for="label">Label</label>
                <input class="form-control" type="text" value="<?= $disc -> disc_label ?>" name="label">
            </div>
            <div class="form-group">
                <label for="prix">Price</label>
                <input class="form-control" type="text" value="<?= $disc -> disc_price ?>" name="prix">
            </div>

            <label for="picture"><h5>Picture</h5></label>
            <div class="col-9 mb-4">
                <img src="img/<?= $disc -> disc_picture ?>" style="width: 250px; height: auto;">
            </div>

            <div class="row d-flex justify-content-start my-2 mx-auto">
                <a type="submit" class="btn btn-primary mr-2"href="">Retour</a>
                <input type="hidden" name="id" value="<?= $disc->disc_id ?>">
                <button type="submit" class="btn btn-primary mr-2" href="delete_script.php?page=vinyle&id=<?= $disc -> disc_id ?>"
                value="<?= $disc -> disc_id ?>" name="delete">Supprimer</button>
            </div>

        <?php } }; ?>

    </form>

</div>